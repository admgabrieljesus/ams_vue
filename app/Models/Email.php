<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

      protected $fillable = [
        "email", 
        "emailable_id",
        "emailable_type" 
    ];

    public function emailable()
    {
        return $this->morphTo();
    }

    public function kindship()
    {
        return $this->hasOne(Kindship::class);
    }

}
