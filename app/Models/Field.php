<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\FieldType;

class Field extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->hasOne(FieldType::class, 'id', 'field_type_id');
    }
}
