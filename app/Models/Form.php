<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Field;
use Illuminate\Support\Collection;
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
     * @param Form $data
     * @param array $formData
     * @param boolean|false $disabled
     * @return array
     * @throws \Throwable
     */
    public static function fieldHTML(Form $data, array $formData = [], bool $disabled = false)
    {
        $fields = [];

        foreach ($data->fields as $field) {

            $value = '';;
            if (isset($formData[$field->name])) {
                $value = $formData[$field->name];
            }

            //dd($formData);

            $fields[$field->name] = view('fields.' . strtolower($field->type->name), [
                'field' => $field,
                'value' => $value,
                'disabled' => $disabled,
                'formData' => $formData
            ])->render();

        }
        return $fields;
    }
}
