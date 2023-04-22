<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        "comment", 
        "date",
        "incidentable_id",
        "incidentable_type", 
        "user_id"
    ];

     
}
