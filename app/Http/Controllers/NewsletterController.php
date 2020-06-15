<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News_Title;

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
}
