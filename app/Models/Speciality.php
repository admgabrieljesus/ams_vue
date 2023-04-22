<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
    ];
 
    public function partners()
    {
        return $this->belongsToMany(Partner::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

}