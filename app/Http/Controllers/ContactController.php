<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use App\Contact_Title;
use App\Contact_Map;

Use Alert;

class ContactController extends Controller
{
    public function edit()
    {
        $contact = contact::find(1);
        $titles = Contact_Title::find(1);
        $map = Contact_Map::find(1);
        return view('admin.contact',compact('contact','titles','map'));
    }

    public function update(Request $request)
    {
        $contact = contact::find(1);

        $request->validate([
            'adress_1'=>'required|string',
            'adress_1'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string',
        ]);

        if (!$contact) {
            $contact = new contact;
        }
        
        $contact->adress_1 = request('adress_1');
        $contact->adress_2 = request('adress_2');
        $contact->phone = request('phone');
        $contact->email = request('email');

        $contact->save();

        alert()->toast('Infos modifiées !','success')->width('20rem');

        return redirect()->route('contact');
    }

    public function titlesUpdate(Request $request)
    {
        $titles = Contact_Title::find(1);

        $request->validate([
            'title_1'=>'required|string|max:30',
            'title_2'=>'required|string|max:30',
        ]);

        if (!$titles) {
            $titles = new Contact_Title;
        }

        $titles->title_1 = request('title_1');
        $titles->title_2 = request('title_2');

        $titles->save();

        alert()->toast('Titres modifiés !','success')->width('20rem');

        return redirect()->route('contact');
    }

    public function mapUpdate(Request $request)
    {
        $map = Contact_Map::find(1);

        $request->validate([
            'map'=>'required|url',
        ]);

        if (!$map) {
            $map = new Contact_Map;
        }
        
        $map->url = request('map');

        $map->save();

        alert()->toast('Carte modifiée !','success')->width('20rem');

        return redirect()->route('contact');
    }
}
