<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Ville;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Hash; 
use Auth;
use Session; 

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('auth.registration', ['villes'=>$villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'date_de_naissance' => 'required|date:Y-m-d',
            'ville_id' => 'exists:App\Models\Ville,id',
            'adresse' => 'required|min:6',
            'phone' => 'required|numeric|digits:10',
            'name' => 'required|min:2|max:191',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:20'
        ]);

        $newEtudiant = Etudiant::create([
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
        ]);
        $user = new User;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'etudiant_id' => $newEtudiant->id,
        ]);

        $user->password = Hash::make($request->password);
        $user->save(); 
        
        return redirect(route('login'))->withSuccess('Felicitation !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user_name ='';
        $user_id ='';
        $user_email ='';

        if(Auth::check()){
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            $user_name = Auth::user()->name;
        }
        return view('layouts.app', ['user'=>$user, 'user_name'=>$user_name, 'user_email'=>$user_email, 'user_id'=>$user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function customLogin(Request $request)
    {
        /** Validation */
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);

        /** Verification du login */
        $credentials = $request->only('email', 'password');
        if(!Auth::validate($credentials)):
            return redirect(route('login'))
                ->withErrors(trans('auth.failed'));
        endif; 
 
        /** Session */ 
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user, $request->get('remember'));
        return redirect()->intended('forum')->withSuccess('Sign in');
    }

    public function dashboard(){
        $name = "MyConnexion";
        $user_name ='';
        $user_id ='';
         
        if(Auth::check()){
            $user_name = Auth::user()->name;
            $user_id = Auth::user()->id;
            $name = Auth::user()->name;
        }
        return view('layouts.app', ['name' => $name, 'user_id'=>$user_id, 'user_name'=>$user_name,]);
    }
    
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
