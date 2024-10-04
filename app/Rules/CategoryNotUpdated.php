<?php

namespace App\Rules;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CategoryNotUpdated implements ValidationRule
{
    private $id, $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Category::where('id', $this->id)->where('name', $this->name)) {
            $fail('Nome não alterado, caso queira atualizar categoria, altere o nome.');
        }
    }
}
