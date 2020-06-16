<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Mail\NewsletterSubscriber as Newsletter;

use App\News_Title;
use App\Newsletter_Subscriber;

Use Alert;

class NewsletterController extends Controller
{
    public function edit()
    {
        $titles = News_Title::find(1);

        return view('admin.newsletter',compact('titles'));
    }

    public function update(Request $request)
    {
        $titles = News_Title::find(1);

        $request->validate([
            'title'=>'required|string|max:50',
            'desc'=>'required|string',
        ]);

        if (!$titles) {
            $titles = new News_Title;
        }
        
        $titles->title = request('title');
        $titles->description = request('desc');

        $titles->save();

        alert()->toast('Section modifiée !','success')->width('20rem');

        return redirect()->route('newsletter');
    }

    public function subscribe(Request $request)
    {
        $subscriber = new Newsletter_Subscriber;

        $request->validate([
        'email'=>'required|unique:newsletter__subscribers|email'
        ]);

        $subscriber->email = request('email');

        $subscriber->save();

        Mail::to($subscriber->email)->send(new Newsletter());

        Alert::success('Vous êtes abonnés !')
        ->animation('animate__heartBeat', 'animate__fadeOut')
        ->autoclose(2000)
        ->timerProgressBar();

        return redirect()->to(url()->previous() . '#colorlib-subscribe');
    }
}
