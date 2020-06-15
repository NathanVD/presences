<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\About;
use App\About_Counter;
use App\About_Images;

Use Alert;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::find(1);
        $about_counter = About_Counter::find(1);
        $about_images = About_Images::find(1);
        return view('admin.about',compact('about','about_counter','about_images'));
    }

    public function update(Request $request)
    {
        $about = About::find(1);

        $request->validate([
            'title'=>'required|string|max:20',
            'subtitle'=>'required|string',
            'desc'=>'required',
        ]);

        if (!$about) {
            $about = new About;
        }
        
        $about->title = request('title');
        $about->subtitle = request('subtitle');
        $about->description = request('desc');

        $about->save();

        alert()->toast('Section modifiée !','success')->width('20rem');

        return redirect()->route('about');
    }

    public function imagesUpdate(Request $request)
    {
        $about_images = About_Images::find(1);

        $request->validate([
            'img_1'=>'required|image',
            'img_2'=>'required|image',
        ]);

        if (!$about_images) {
            $about_images = new About_Images;
        }
        
        if (request('img_1')) {
            Storage::delete($about_images->img_path_1);
            $about_images->img_path_1 = request('img_1')->store('img');
        }

        if (request('img_2')) {
            Storage::delete($about_images->img_path_2);
            $about_images->img_path_2 = request('img_2')->store('img');
        }

        $about_images->save();

        alert()->toast('Images modifiées !','success')->width('20rem');

        return redirect()->route('about');
    }

    public function counterUpdate(Request $request)
    {
        $about_counter = About_Counter::find(1);

        $request->validate([
            'counter_1'=>'required|string',
            'counter_2'=>'required|string',
            'counter_3'=>'required|string',
            'counter_4'=>'required|string',
        ]);

        if (!$about_counter) {
            $about_counter = new About_Counter;
        }
        
        $about_counter->counter_1 = request('counter_1');
        $about_counter->counter_2 = request('counter_2');
        $about_counter->counter_3 = request('counter_3');
        $about_counter->counter_4 = request('counter_4');

        $about_counter->save();

        alert()->toast('Compteurs modifiés !','success')->width('20rem');

        return redirect()->route('about');
    }
}
