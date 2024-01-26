<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    const SEARCH = 'search';

    public function rules(): array
    {
        return [
//            self::SEARCH => [
//                'nullable',
//                'string'
//            ],
        ];
    }

    public function getSearch(): ?string
    {
        return $this->get(self::SEARCH);
    }
}
