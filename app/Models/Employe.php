<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
     use HasFactory;
    protected $fillable=[
        'registration_number',
        'fullname',
        'departement',
        'hire_date',
        'phone',
        'address',
        'image',
        'city',

    ];
    protected $casts = [
        'hire_date' => 'datetime',
    ];

    public function getHireDateForHumansAttribute()
    {
        return optional($this->hire_date)->diffForHumans();
    }

    public function getFormattedHireDateAttribute()
    {
        return optional($this->hire_date)->format('d/m/Y');
    
    }
    public function conges()
    {
        return $this->hasMany(Conge::class);
    }
}
