<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    //
    protected $table = 'vaccinations'; 
    protected $fillable = ['patient_id', 'type_of_vaccine', 'vaccination_date'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public $timestamps = true;
}
