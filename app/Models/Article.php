<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'contenu',
        'etudiant_id'
    ];

    public function articleHasEtudiant() {
        return $this->hasOne('App\Models\Etudiant', 'id', 'etudiant_id');
    }
}
