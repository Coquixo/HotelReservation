<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class User extends Model
{

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        "age",
        "phone"
    ];



    protected $hidden = [
        'password',

    ];

    public $timestamps = false;

    protected $primaryKey = 'id';
    use HasFactory;
}
