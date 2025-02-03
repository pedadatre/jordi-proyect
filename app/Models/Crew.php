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
    public function users()
{
    return $this->belongsToMany(User::class, 'user_crew', 'crew_id', 'user_id');
}
    /**
     *Define la relación entre la peña y las ubicaciones
     */
public function locations()
    {
        return $this->hasMany(Location::class);
    }

}