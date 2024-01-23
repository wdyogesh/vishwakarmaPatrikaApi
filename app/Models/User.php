<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'user_id',
        'gotra',
        'gender',
        'dob',
        'birthTime',
        'manglik',
        'height_f',
        'height_i',
        'marital_status',
        'profileBy',
        'fileToUpload',
        'education',
        'education_details',
        'occupation',
        'occupation_details',
        'hobbies',
        'fatherName',
        'father_Occupation',
        'MotherName',
        'mother_Occupation',
        'b_married',
        'b_unmarried',
        's_married',
        's_unmarried',
        'mobile',
        'mobile_2',
        'email',
        'address',
        'state',
        'location',
        'city',
        'pass1',
        'id_conform',
        'date_time',
        'about_us',
        'payment',
        'txn_id',
        'payment_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function role_info(){
        return $this->hasOne('App\Models\Roles','id','role_id')->select('manage_roles.id','manage_roles.name as role_name');
    }
}
