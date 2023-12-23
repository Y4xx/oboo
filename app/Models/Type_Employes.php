<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type_Employes extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','type_nom	','Heure_de_travaille_par_jour'
    ];
    protected $table = 'type_employes';

    public function Emplyes()
    {
        return $this->hasMany(Employee::class);
    }
}


