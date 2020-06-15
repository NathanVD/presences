<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Hero;
use App\Hero_Catch;

Use Alert;

class HeroController extends Controller
{

    public function index()
    {
        $catch = Hero_Catch::find(1);
        $slides = Hero::all();
        return view('admin.hero',compact('catch','slides'));
    }

    public function create()
    {
        return view('admin.hero_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string',
            'image'=>'required|image',
        ]);

        $slide = new Hero;
        
        $slide->title = request('title');
        $slide->img_path = request('image')->store('img');

        $slide->save();

        alert()->toast('Slide ajoutée !','success')->width('20rem');

        return redirect()->route('hero.index');
    }

    public function edit($id)
    {
        $slide = Hero::find($id);
        return view('admin.hero_edit',compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|string'
        ]);

        $slide = Hero::find($id);
        
        $slide->title = request('title');

        if (request('image')) {
            $request->validate([
                'image'=>'required|image',
            ]);
            Storage::delete($slide->img_path);
            $slide->img_path = request('image')->store('img');
        }

        $slide->save();

        alert()->toast('Slide modifiée !','success')->width('20rem');

        return redirect()->route('hero.index');
    }

    public function destroy($id)
    {
        $slide = Hero::find($id);

        Storage::delete($slide->img_path);

        $slide->delete();

        alert()->toast('Slide supprimée !','error')->width('20rem');

        return redirect()->route('hero.index');  
    }

    public function catchUpdate(Request $request)
    {
        $request->validate([
            'catch'=>'required|string',
        ]);

        $catch = Hero_Catch::find(1);
        
        if (!$catch) {
            $catch = new Hero_Catch;
        }

        $catch->catchphrase = request('catch');

        $catch->save();

        alert()->toast('Slogan modifié !','success')->width('20rem');

        return redirect()->route('hero.index');
    }
}
