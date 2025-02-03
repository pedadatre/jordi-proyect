<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'x',
        'y',
        'crew_id',
        'year',
    ];

    public function crew()
    {
         /**
     * Define la relación entre la ubicación y la peña
     */
        return $this->belongsTo(Crew::class);
    }
}
