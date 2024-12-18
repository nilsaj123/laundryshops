<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    //
    

    use HasFactory;

    protected $fillable = [
        'name', 'date_of_birth', 'birth_place',  'height', 'weight', 'age_year','age_month',
        'parent_age', 'permanent_address', 'parents_name', 'parents_number', 'gender','type_of_vaccine',
    ];

   
   
}
