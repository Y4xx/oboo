<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Systeme_de_travail extends Model
{
    use HasFactory;
    protected $table = 'systeme_de_travail';

    protected $fillable = [
        'idAdmin',
        'name',
        'debuMatain',
        'finMatain',
        'debuMedi',
        'finMedi',
        'nbConge',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'idAdmin');
    }
}
