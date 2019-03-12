<?php

namespace App\Http\Controllers\Forum;

use App\Http\Requests\FeedbackRequest;
use App\Mail\MailClass;
use App\Repositories\ForumCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use App\Rules\Captcha;

class HomeController extends Controller
{
    private $forumCategoryRepository;

	/**
	 * Create model for repository
	 *
	 * HomeController constructor.
	 */
    public function __construct()
    {
        $this->forumCategoryRepository = app (ForumCategoryRepository::class);
    }

	/**
	 * Show start page && load country name with Redis
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
	 */
    public function index()
    {
        if ( ! Redis::get('ru') || ! Redis::get('en')) {
            Redis::set('ru', Storage::disk('redis')->get('ru.json'));
            Redis::set('en', Storage::disk('redis')->get('en.json'));
        }

        $categories = $this->forumCategoryRepository->getForComboBox();

        return view('forum.index', compact('categories' ));
    }

	/**
	 * Send feedback email
	 *
	 * @param FeedbackRequest $request
	 */
    public function sendMail( FeedbackRequest $request )
    {
//        if( $request->isMethod('POST' )) {

            $mail_admin = env('MAIL_ADMIN');
            $mail_user = env('MAIL_USERNAME');

            ! $request['EMAIL'] ? $request['EMAIL'] = $mail_user : $mail_user = $request['EMAIL'];
            if ( ! $request['COMPANY'] ) $request['COMPANY'] = 'UNKNOWN';

            dd($request);

//            $this->validate( $request, [
//                'NAME' 		=> 'required|max:255',
//                'COUNTRY' 	=> 'required|max:255',
//                'EMAIL' 	=> 'required|email',
//                'NEEDS' 	=> 'required',
//                'COMPANY' 	=> 'required|max:255|string',
//				'g-recaptcha-response' => 'required', new Captcha(),
//			]);

            $layout_mail = [
                'name' 		=> $request['NAME'],
                'country' 	=> $request['COUNTRY'],
                'email' 	=> $request['EMAIL'],
                'text' 		=> $request['NEEDS'],
                'company' 	=> $request['COMPANY'],
            ];

            Mail::to( $mail_admin )->send( new MailClass( $layout_mail ));
//        }
    }

	/**
	 * Get country name for autocomplite witch Redis
	 *
	 * @param Request $request
	 * @return array
	 */
    public function selectedLanguage ( Request $request )
    {
		$result = [];
		$word = $request->queryString;

		if ( $word ) {
			$country = json_decode( Redis::get ( App::getlocale() ),true );

			foreach ( $country as $key => $value ) {
				if ( mb_stripos( $value, $word ) !== false ) {
					$result[] = $value;
				}
			}
		}

        return $result;
    }
}
