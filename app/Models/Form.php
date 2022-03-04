<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Field;
use Illuminate\View\View;

class Form extends Model
{
    use HasFactory;

    /**
     * Get the comments for the blog post.
     */
    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    /**
     * Takes field data and generates HTML for it.
     *
     * @param $data
     *
     * @return array
     */
    public static function fieldHTML($data)
    {
        $fields = [];

        foreach ($data->fields as $field) {

//            $types[$field->id] = $field->type->name . '_' . $field->type->id . '_' . $field->field_type_id;

            $fields[$field->name] = view('fields.' . strtolower($field->type->name), [
                'field' => $field
            ])->render();

        }
        return $fields;
    }
}
