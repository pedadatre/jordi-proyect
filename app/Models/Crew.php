<?php
// app/Models/Crew.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = ['name',
        'year',
        'slogan',
        'color',
        'capacity',
        'fondation_date',
        'description',
        'location',
        'main_activities',
        'leader',
        'events_count',
        'contact_email',
    ];
    protected $dates = ['fondation_date'];

    
    protected $casts = [
        'fondation_date' => 'date',];
        
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}