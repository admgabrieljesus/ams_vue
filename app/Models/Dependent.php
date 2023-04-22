<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dependent extends Model
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
        'comment',
        'associate_id',
        'role_id',
        'kindship_id'
    ];

    public function kindship()
    {
        return $this->belongsTo(Kindship::class);
    }

}
