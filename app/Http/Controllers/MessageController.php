<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //
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
            'email'=>'required|email',
            'subject'=>'required|string',
            'message'=>'required'
        ]);

        $message = new Message;

        $message->firstname = request('firstname');
        $message->lastname = request('lastname');
        $message->email = request('email');
        $message->object = request('subject');
        $message->message = request('message');

        $message->save();

        // Mail::to($message->email)->send(new Contact($message));

        Alert::success('Message envoyé !')
        ->position('top-end')
        ->autoClose(2000)
        ->animation('animate__heartBeat', 'animate__fadeOut')
        ->timerProgressBar();          

        return redirect()->back();
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
