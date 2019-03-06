<?php

namespace App\Http\Controllers\Forum;

use App\Mail\MailClass;
use App\Repositories\ForumCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    private $forumCategoryRepository;

    public function __construct()
    {
        $this->forumCategoryRepository = app (ForumCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Redis::get('ru') || ! Redis::get('eng')){
            Redis::set('ru', Storage::disk('redis')->get('ru.json'));
            Redis::set('eng', Storage::disk('redis')->get('en.json'));
        }

        $categories = $this->forumCategoryRepository->getForComboBox();

        return view('forum.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendMail(Request $request)
    {
        if($request->isMethod('POST')) {

            $mail_admin = env('MAIL_ADMIN');
            $mail_user = env('MAIL_USERNAME');

            !$request['EMAIL'] ? $request['EMAIL'] = $mail_user : $mail_user = $request['EMAIL'];
            if( !$request['COMPANY'] ) $request['COMPANY'] = 'UNKNOWN';

            $this->validate($request, [
                'NAME' => 'required|max:255',
                'COUNTRY' => 'required|max:255',
                'EMAIL' => 'required|email',
                'NEEDS' => 'required',
                'COMPANY' => 'required|max:255|string',
            ]);

            $layout_mail = [
                'name' => $request['NAME'],
                'country' => $request['COUNTRY'],
                'email' => $request['EMAIL'],
                'text' => $request['NEEDS'],
                'company' => $request['COMPANY'],
            ];

            Mail::to($mail_admin)->send(new MailClass($layout_mail));
        }
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function selectedLanguage (Request $request)
    {
        $language = $request->language;
        $locale = App::getLocale();
        dd($language, $locale);

        if (App::getLocale() == $language ) {
            App::setLocale('ru');
            dd(1);
        }
        $word = $request->queryString;

        $country = json_decode(Redis::get($language),true);

        $result = [];
        foreach($country as $key => $value){
            if(mb_stripos($value, $word) !== false){
                $result[] = $value;
            }
        }


        dd($result);


    }
}
