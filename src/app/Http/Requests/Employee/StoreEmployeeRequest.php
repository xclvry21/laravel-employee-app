<?php

namespace App\Http\Requests\Employee;

use App\Enums\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'monthly_salary' => str_replace(
                ',',
                '',
                $this->monthly_salary
            ),
        ]);
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:employees,email',
            ],
            'birthday' => ['required', 'date'],
            'gender' => [
                'required',
                Rule::enum(Gender::class),
            ],
            'monthly_salary' => [
                'required',
                'numeric',
                'decimal:2',
                'min:0',
            ],
        ];
    }
}
