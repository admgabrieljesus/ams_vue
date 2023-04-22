<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsible extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'partner_id', 'cpf', 'type_document', 'number_document'
    ];

    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

}
