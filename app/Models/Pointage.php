<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pointage extends Model
{
    use HasFactory;
    protected $table = 'pointage';
    protected $fillable = ['idemploye','tempsMatain_1	','tempsMatain_2' , 'tempsMedi_1' , 'tempsMedi_2' , 'dateDePointage'];
}
