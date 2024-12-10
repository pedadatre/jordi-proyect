<?php
// app/Models/Crew.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'year', 'slogan', 'color', 'capacity', 'fondation_date'];
    protected $dates = ['fondation_date'];

    // Para Laravel 9 o superior, usa $casts en su lugar
    protected $casts = [
        'fondation_date' => 'date',];
        
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}