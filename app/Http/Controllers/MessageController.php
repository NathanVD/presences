<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Mail\MessageConfirm as Confirm;
use App\Mail\MessageTransfer as Transfer;

use App\Message_Confirmation_Model;
use App\Message;

Use Alert;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        $confirm = Message_Confirmation_Model::find(1);
        return view('admin.inbox',compact('messages','confirm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'e-mail'=>'required|email',
            'subject'=>'required|string|max:45',
            'message'=>'required'
        ]);

        $message = new Message;

        $message->firstname = request('firstname');
        $message->lastname = request('lastname');
        $message->email = request('e-mail');
        $message->object = request('subject');
        $message->message = request('message');

        $message->save();

        Mail::to($message->email)->send(new Confirm($message));
        Mail::to('services@school.com')->send(new Transfer($message));

        Alert::success('Message envoyé !')
        ->animation('animate__heartBeat', 'animate__fadeOut')
        ->autoclose(2000)
        ->timerProgressBar();        

        return redirect()->to(url()->previous() . '#contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $message = Message::find($id);

      $previous = Message::where('id', '<', $id)->max('id');
      $next = Message::where('id', '>', $id)->min('id');

      return view('admin.inbox_show', compact('message', 'previous', 'next'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modelUpdate(Request $request)
    {
        $model = Message_Confirmation_Model::find(1);

        $request->validate([
            'title'=>'required|string',
            'greeting'=>'required|string',
            'intro'=>'required|string',
            'outro'=>'required|string',
            'farewell'=>'required|string'
        ]);

        if (!$model) {
            $model = new Message_Confirmation_Model;
        }

        $model->title = request('title');
        $model->greeting = request('greeting');
        $model->intro = request('intro');
        $model->outro = request('outro');
        $model->farewell = request('farewell');

        $model->save();

        alert()->toast('Modèle mis à jour !','success')->width('20rem');

        return redirect()->route('inbox.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Message::find($id)->delete();

        alert()->toast('Message supprimé !','error')->width('20rem');

        return redirect()->back(); 
    }
}
