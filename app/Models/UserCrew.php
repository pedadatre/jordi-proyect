<?php
// app/Models/UserCrew.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCrew extends Model
{
    use HasFactory;

    protected $table = 'user_crew';

    protected $fillable = [
        'user_id',
        'crew_id',
        'year',
    ];
}