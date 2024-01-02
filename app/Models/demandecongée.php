<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demandecongée extends Model
{
    use HasFactory;
    protected $table='demandecongée';
    public $timestamps = false; 
    protected $guarded = [];

    public function employe()
    {
        return $this->belongsTo(Employee::class,'id_employer','id');
    }
}
