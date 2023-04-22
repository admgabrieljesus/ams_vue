<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'partner_id',
        'name',
        "cpf",
        "type_document",
        "name_document",
        "active",
    ];

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }


}