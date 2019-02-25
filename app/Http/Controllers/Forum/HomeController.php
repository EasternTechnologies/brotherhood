<?php

namespace App\Http\Controllers\Forum;

use App\Mail\MailClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forum.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
