<?php

namespace App\Http\Requests\Employee;

use App\Enums\Gender;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],

            'last_name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('employees', 'email')
                    ->ignore($this->employee),
            ],

            'birthday' => [
                'required',
                'date',
            ],

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
