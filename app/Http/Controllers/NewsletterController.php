<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Mail\NewsletterSubscriber as Newsletter;
use App\Newsletter_Subscriber_Model as Model;

use App\News_Title;
use App\Newsletter_Subscriber;

Use Alert;

class NewsletterController extends Controller
{

    public function index()
    {
        $titles = News_Title::find(1);
        $subscribers = Newsletter_Subscriber::all();
        $mail_model = Model::find(1);

        return view('admin.newsletter',compact('titles','subscribers','mail_model'));
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

    public function unsubscribe($id)
    {
        Newsletter_Subscriber::find($id)->delete();

        alert()->toast('Adresse désabonnée !','error')->width('20rem');

        return redirect()->back();
    }

    public function mailUpdate(Request $request)
    {
        $model = Model::find(1);

        $request->validate([
            'intro'=>'required|string',
            'body'=>'required|string',
            'farewell'=>'required|string',
        ]);

        if (!$model) {
            $model = new Model;
        }
        
        $model->intro = request('intro');
        $model->body = request('body');
        $model->farewell = request('farewell');

        $model->save();

        alert()->toast('Mail modifiée !','success')->width('20rem');

        return redirect()->route('newsletter');
    }
}
