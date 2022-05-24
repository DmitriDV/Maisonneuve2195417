<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $user_name ='';
        $user_id ='';
        
        if(Auth::check()){
            $user_name = Auth::user()->name;
            $user_id = Auth::user()->id;
        }
        //return $users;
        return view('etudiant.index', ['users'=>$users, 'user_id'=>$user_id, 'user_name'=>$user_name,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$villes = Ville::all();
        //return view('etudiant.create', ['villes'=>$villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$nouvelEtudiant = Etudiant::create([
        //    'nom' => $request->nom,
        //    'adresse' => $request->adresse,
        //    'phone' => $request->phone,
        //    'email' => $request->email,
        //    'date_de_naissance' => $request->date_de_naissance,
        //    'ville_id' => $request->ville_id
        //]);
        //return redirect('liste/'.$nouvelEtudiant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Ville $villes)
    {
        $user_name ='';
        $user_id ='';
        $user_email ='';

        if(Auth::check()){
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            $user_name = Auth::user()->name;
        }
        return view('etudiant.show', ['user'=>$user, 'villes'=>$villes, 'user_name'=>$user_name, 'user_email'=>$user_email,  'user_id'=>$user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ville  $villes
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant, Ville $villes)
    {
        $user = Auth::user();
        $villes = Ville::all();
        
        $user_name ='';
        $user_id ='';
        
        if(Auth::check()){
            $user_name = Auth::user()->name;
            $user_id = Auth::user()->id;
        }
        
        return view('etudiant.edit', ['etudiant'=>$etudiant, 'user'=>$user, 'user_id'=>$user_id, 'user_name'=>$user_name, 'villes'=>$villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Etudiant $etudiant)
    {
        //return $user;
        
        $user_name ='';
        $user_id ='';
        
        if(Auth::check()){
            $user_name = Auth::user()->name;
            $user_id = Auth::user()->id;
        }
        $request->validate([
            'date_de_naissance' => 'required|date:Y-m-d',
            'ville_id' => 'exists:App\Models\Ville,id',
            'adresse' => 'required|min:6',
            'phone' => 'required|numeric|digits:10',
            'name' => 'required|min:2|max:191',
            'password' => 'required|confirmed|min:6|max:20'
        ]);
            //return $etudiant;
            
        Etudiant::where('id', $user->id)->update([
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
        ]);
        
        $user->update([
            'name' => $request->name,
            'password' => $request->password
        ]);
        return redirect(route('liste.edit', ['user'=>$user, 'user_id'=>$user_id, 'user_name'=>$user_name,]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
        $oUser = User::all();
        $oEtudiant = Etudiant::all();
        //return $user;
       // $this->$oUser::delete()
       // ->where('id', '=', $user->id);
       // $this->$oEtudiant::delete()
       // ->where('id', '=', $user->etudiant_id);
       // ->join('users', 'users.etudiant_id', '=', 'etudiants.id')

        $query = User::select()
        ->where('id', '=', $user->id);
        //$query = Etudiant::delete($this->user->etudiant_id) ;
        return $query;

        return redirect(route('liste'));
    }
    
}
