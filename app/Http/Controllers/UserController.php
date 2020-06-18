<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use App\Background;
use App\Contact;
use App\Teach;use App\Study;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
     * Show the form for registering a new teacher.
     */
    public function registerTeacherForm()
    {
        $background = Background::find(1);
        $contact = Contact::find(1);
        $teaches = Teach::all();
        $type = 'Professeur';

        return view('templates.register.teacher_form',compact('background','contact','teaches','type'));
    }

    /**
     * Register a newly created teacher.
     */
    public function registerTeacher(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:20|unique:users',
            'adress_road' => 'required|string|max:255',
            'adress_commune' => 'required|string|max:255',
            'domain' => 'required',
        ]);
        
        $roles = Role::all();
        $user = new User;

        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $user->phone = request('phone');
        $user->password = bcrypt(request('password'));
        if (request('photo')) {
            $request->validate(['img_path' => 'image',]);
            $user->img_path = request('photo')->store('img');
        }
        $user->adress_road = request('adress_road');
        $user->adress_commune = request('adress_commune');
        $user->domain_id = request('domain');
        $user->domain_type = 'App\Teach';

        $user->save();

        $user->roles()->attach($roles->where('name','Membre')->first());
        $user->roles()->attach($roles->where('name','Professeur')->first());

        Auth::login($user);

        return redirect()->route('home');
    }

    /**
     * Show the form for registering a new student.
     */
    public function registerStudentForm()
    {
        $background = Background::find(1);
        $contact = Contact::find(1);
        $studies = Study::all();
        $type = 'Étudiant';

        return view('templates.register.student_form',compact('background','contact','studies','type'));
    }

    /**
     * Register a newly created student.
     */
    public function registerStudent(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:20|unique:users',
            'adress_road' => 'required|string|max:255',
            'adress_commune' => 'required|string|max:255',
            'domain' => 'required|int',
        ]);
        
        $roles = Role::all();
        $user = new User;

        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $user->phone = request('phone');
        $user->password = bcrypt(request('password'));
        if (request('photo')) {
            $request->validate(['img_path' => 'image',]);
            $user->img_path = request('photo')->store('img');
        }
        $user->adress_road = request('adress_road');
        $user->adress_commune = request('adress_commune');
        $user->domain_id = request('domain');
        $user->domain_type = 'App\Study';

        $user->save();

        $user->roles()->attach($roles->where('name','Membre')->first());
        $user->roles()->attach($roles->where('name','Étudiant')->first());

        Auth::login($user);

        return redirect()->route('home');
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
        $user = User::find($id);

        $background = Background::find(1);
        $contact = Contact::find(1);

        return view('templates.profile.edit',compact('user','background','contact'));
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
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'adress_road' => 'required|string|max:255',
            'adress_commune' => 'required|string|max:255',
        ]);
        
        $user = User::find($id);

        if (request('photo')) {
            $request->validate(['img_path' => 'image',]);
            $user->img_path = request('photo')->store('img');
        }

        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $user->phone = request('phone');
        $user->adress_road = request('adress_road');
        $user->adress_commune = request('adress_commune');

        $user->save();

        alert()->toast('Données modifiées !','success')->width('20rem');

        return redirect()->route('profile');
    }

    public function passwordUpdate(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = User::find($id);

        $user->password = bcrypt(request('password'));

        $user->save();

        alert()->toast('Mot de passe modifié !','success')->width('20rem');

        return redirect()->route('profile');
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
