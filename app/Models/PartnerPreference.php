<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerPreference extends Model
{
    protected $table='partner_preference';
    protected $fillable=['id', 'user_id', 'age2', 'age1', 'marital_status', 'manglik', 'education', 'occupations', 'other_details'];
}
