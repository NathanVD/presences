<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Testimonial;
use App\Testimonials_Title;

Use Alert;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = Testimonials_Title::find(1);
        $testimonials = Testimonial::all();
        $read = Testimonial::OrderBy('created_at','desc')->first();
        return view('admin.testimonials',compact('title','testimonials','read'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonial = new Testimonial;

        $request->validate([
            'img'=>'required|image',
            'name'=>'required|string',
            'review'=>'required|max:220',
        ]);

        $testimonial->img_path = request('img')->store('img');
        $testimonial->name = request('name');
        $testimonial->review = request('review');

        $testimonial->save();

        alert()->toast('Témoignage ajouté !','success')->width('20rem');

        return redirect()->route('testimonials.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = Testimonials_Title::find(1);
        $testimonials = Testimonial::all();
        $read = Testimonial::find($id);
        return view('admin.testimonials',compact('title','testimonials','read'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonials_edit',compact('testimonial'));
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
        $testimonial = Testimonial::find($id);

        if (request('img')) {
            $request->validate([
                'img'=>'required|image',
                ]);
            Storage::delete($testimonial->img_path);
            $testimonial->img_path = request('img')->store('img');
        }

        $request->validate([
            'name'=>'required|string',
            'review'=>'required|max:220',
        ]);

        $testimonial->name = request('name');
        $testimonial->review = request('review');

        $testimonial->save();

        alert()->toast('Témoignage modifié !','warning')->width('20rem');

        return redirect()->route('testimonials.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);

        Storage::delete($testimonial->img_path);

        $testimonial->delete();

        alert()->toast('Témoignage supprimé !','error')->width('20rem');

        return redirect()->route('testimonials.index');  
    }

    public function titleUpdate(Request $request)
    {
        $request->validate([
            'title'=>'required|string',
        ]);

        $title = Testimonials_Title::find(1);
        
        if (!$title) {
            $title = new Testimonials_Title;
        }

        $title->title = request('title');

        $title->save();

        alert()->toast('Titre modifié !','success')->width('20rem');

        return redirect()->back();
    }
}
