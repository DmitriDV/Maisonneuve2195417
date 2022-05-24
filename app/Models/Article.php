<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre_en',
        'titre_fr',
        'contenu_en',
        'contenu_fr',
        'categorie_id',
        'user_id'
    ];

    public function articleHasUser() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function articleHasCategorie() {
        return $this->hasOne('App\Models\Categorie', 'id', 'categorie_id');
    }

    //static public function selectArticle($id = null){
    //    $lg = "_en";
    //    if(session()->has('locale') &&  session()->get('locale') == 'fr'){
    //        $lg = "_fr";
    //    }

    //    $query = Article::Select('id', 'categorie_id', 'user_id', DB::raw('(case when titre'.$lg.' is null then titre_en else titre'.$lg.' end) as titre, (case when contenu'.$lg.' is null then contenu_en else contenu'.$lg.' end) as contenu'))
    //    ->where('id', $id)
    //    ->OrderBy('titre')
    //    ->get();
    //    return $query;
    //}

}
