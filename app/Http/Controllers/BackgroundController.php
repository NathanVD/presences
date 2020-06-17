<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Background;

Use Alert;

class BackgroundController extends Controller
{
    public function edit()
    {
        $background = Background::find(1);
        return view('admin.background',compact('background'));
    }

    public function update(Request $request)
    {
        $background = Background::find(1);

        $request->validate([
            'img'=>'required|image',
        ]);

        if (!$background) {
            $background = new Background;
        }

        Storage::delete($background->img_path);

        $background->img_path = request('img')->store('img');

        $background->save();

        alert()->toast('Image modifiée !','success')->width('20rem');

        return redirect()->route('background');
    }
}
