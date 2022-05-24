<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $articles = Article::all();
        $user_name ='';
        $user_id ='';

        if(Auth::check()){
        $user_name = Auth::user()->name;
        $user_id = Auth::user()->id;
        }        
        return view('forum.index', ['articles'=>$articles, 'user'=>$user, 'user_id'=>$user_id, 'user_name'=>$user_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $user_name ='';
        $user_id ='';

        if(Auth::check()){
            $user_name = Auth::user()->name;
            $user_id = Auth::user()->id;
        }
        $categories = Categorie::selectCategorie();
        $etudiants = Etudiant::all();
        return view('forum.create', ['etudiants'=>$etudiants, 'user'=>$user, 'user_id'=>$user_id, 'user_name'=>$user_name, 'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre_en' => 'required|min:3',
            'titre_fr' => 'required|min:3',
            'contenu_en' => 'required|min:6',
            'contenu_fr' => 'required|min:6',
            'categorie_id' => 'exists:App\Models\Categorie,id'
        ]);

        $newArticle = new Article;
        $newArticle->fill($request->all());
        $newArticle->user_id = Auth::user()->id;
        $newArticle->save();
        return redirect('forum');
        //return redirect('forum/'.$newArticle->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, Etudiant $etudiants)
    {

        //$article = Article::selectForumArticle($article);
        $user = Auth::user();

        $user_name ='';
        $user_id ='';
        $user_email ='';

        if(Auth::check()){
            $user_name = Auth::user()->name;
            $user_email = Auth::user()->email;
            $user_id = Auth::user()->id;
        }
        return  view ('forum.show', ['article'=>$article, 'user'=>$user, 'user_id'=>$user_id, 'user_name'=>$user_name, 'user_email'=>$user_email]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $user = Auth::user();

        $user_name ='';
        $user_id ='';
        
        if(Auth::check()){
            $user_name = Auth::user()->name;
            $user_id = Auth::user()->id;
        }
        $categories = Categorie::selectCategorie();
        return view('forum.edit', ['article' => $article, 'user'=>$user, 'user_id'=>$user_id, 'user_name'=>$user_name, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'titre_en' => 'required|min:3',
            'titre_fr' => 'required|min:3',
            'contenu_en' => 'required|min:6',
            'contenu_fr' => 'required|min:6',
            'categorie_id' => 'exists:App\Models\Categorie,id'
        ]);
        
        $article->update([
            'titre_en' => $request->titre_en,
            'titre_fr' => $request->titre_fr,
            'contenu_en' => $request->contenu_en,
            'contenu_fr' => $request->contenu_fr,
            'categorie_id' => $request->categorie_id,
        ]);
        return redirect(route('forum.show', $article->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('forum'));
    }

    public function showPdf(Article $article){
        
        $pdf = PDF::loadView('forum.pdf-file', ['article' => $article]);
        return $pdf->download('article.pdf');
        //return $pdf->stream('article.pdf');
    }
}
