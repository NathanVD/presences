<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team_Title;
use App\User;
use App\Role;
use App\Starred;

use Illuminate\Support\Facades\Auth;
use Gate;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index
     */
    public function index() {

        $team_title = Team_Title::find(1);
        $team = Role::where('name','Professeur')->first()->users()->get();
        $starred = Starred::find(1);

        return view('admin.team', compact('team_title','team','starred'));
    }
    
    /**
     * Partie Titre
     */
    public function titleUpdate(Request $request) {
        $title = Team_Title::find(1);

        $request->validate([
            'titre'=>'required|string',
        ]);

        if (!$title) {
            $title = new Team_Title;
        }

        $title->title = request('titre');

        $title->save();

        alert()->toast('Titre modifié !','success')->width('20rem');

        return redirect()->route('team');
    }

    /**
     * Partie Star
     * Add
     */
    public function starredUpdate($id) {

        $teacher = User::find($id);
        $starred = Starred::find(1);

        if (!$starred) {
            $starred = new Starred;
            $starred->id = 1;
        }

        $starred->user_id = $teacher->id;

        $starred->save();

        alert()->toast('Principal modifié !','success')->width('20rem');

        return redirect()->route('team');
    }

    /**
     * Partie star
     * Remove
     */
    public function starredRemove() {

        $starred = Starred::find(1);

        $starred->delete();

        alert()->toast('Principal retiré !','warning')->width('20rem');

        return redirect()->route('team');
    }

}
