<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Associate extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'code',
        'name',
        'cpf',
        'rg',
        'birth',
        'level_id',
        'active',
        'comment'
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public static function search($search, $level)
    {
        $search = strtoupper($search);
        return ( empty($search) and empty($level) )
            ? static::query()->where('id', '>=', '1')
            : static::query()->where('id', '>=', '1')
                ->where(function($q) use ($search, $level) {
                    $q->where('name', 'LIKE', '%'. $search . '%');
                    if ($level>=1) $q->where('level_id',  $level);
                      //->orWhere('address', 'LIKE ', '%' . $query . '%');
                });
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    public function emails()
    {
        return $this->morphMany(Email::class, 'emailable');
    }

    public function dependents()
    {
        return $this->hasMany(Dependent::class);
    }
}
