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
}
