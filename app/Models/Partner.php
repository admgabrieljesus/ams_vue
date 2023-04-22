<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name', 'cpf', 'type_document', 'number_document', 'website', 'comment', 'fantasy', 'cnpj', 'type'
   
    ];

    public function emails()
    {
        return $this->morphMany(Email::class, 'emailable');
    }

    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }
    
    public function responsible()
    {
        return $this->hasOne(Responsible::class);
    }
    
    public function user()
    {
        return $this->morphMany(User::class, 'userable');
    }

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class);
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
