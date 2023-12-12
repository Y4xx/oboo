<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_Employes extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','type_nom	','Heure_de_travaille_par_jour'
    ];
    protected $table = 'type_employes';
}


