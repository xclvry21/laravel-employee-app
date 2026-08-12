<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf

                        {{-- First Name --}}
                        <div class="mb-4">
                            <label for="first_name"
                                class="block font-medium text-sm text-gray-700">
                                First Name <span class="text-red-600">*</span>
                            </label>

                            <input
                                type="text"
                                name="first_name"
                                id="first_name"
                                value="{{ old('first_name') }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >

                            @error('first_name')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Last Name --}}
                        <div class="mb-4">
                            <label for="last_name"
                                class="block font-medium text-sm text-gray-700">
                                Last Name <span class="text-red-600">*</span>
                            </label>

                            <input
                                type="text"
                                name="last_name"
                                id="last_name"
                                value="{{ old('last_name') }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >

                            @error('last_name')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-4">
                            <label for="email"
                                class="block font-medium text-sm text-gray-700">
                                Email <span class="text-red-600">*</span>
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >

                            @error('email')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Birthday --}}
                        <div class="mb-4">
                            <label for="birthday"
                                class="block font-medium text-sm text-gray-700">
                                Birthday <span class="text-red-600">*</span>
                            </label>

                            <input
                                type="date"
                                name="birthday"
                                id="birthday"
                                value="{{ old('birthday') }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >

                            @error('birthday')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Gender --}}
                        <div class="mb-4">
                            <label for="gender"
                                class="block font-medium text-sm text-gray-700">
                                Gender <span class="text-red-600">*</span>
                            </label>

                            <select
                                name="gender"
                                id="gender"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                                <option value="">Select Gender</option>

                                <option value="Male"
                                    {{ old('gender') === 'Male' ? 'selected' : '' }}>
                                    Male
                                </option>

                                <option value="Female"
                                    {{ old('gender') === 'Female' ? 'selected' : '' }}>
                                    Female
                                </option>
                            </select>

                            @error('gender')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Monthly Salary --}}
                        <div class="mb-6">
                            <label for="monthly_salary"
                                class="block font-medium text-sm text-gray-700">
                                Monthly Salary <span class="text-red-600">*</span>
                            </label>

                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">
                                    ₱
                                </span>

                                <input
                                    type="text"
                                    name="monthly_salary"
                                    id="monthly_salary"
                                    value="{{ old('monthly_salary') }}"
                                    required
                                    inputmode="decimal"
                                    placeholder="0.00"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm pl-8"
                                >
                            </div>

                            @error('monthly_salary')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- SUBMIT BUTTON --}}
                        <div class="flex items-center justify-end gap-3">

                            <a
                                href="{{ route('employees.index') }}"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300"
                            >
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700"
                            >
                                Submit
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

    <script>
        const salaryInput = document.getElementById('monthly_salary');
        const form = document.querySelector('form');

        // Format salary as currency
        salaryInput.addEventListener('input', function () {
            let value = this.value.replace(/[^0-9.]/g, '');

            const parts = value.split('.');

            if (parts.length > 2) {
                value = parts[0] + '.' + parts.slice(1).join('');
            }

            let [integer, decimal] = value.split('.');

            if (integer) {
                integer = integer.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            }

            if (decimal !== undefined) {
                decimal = decimal.substring(0, 2);
                this.value = integer + '.' + decimal;
            } else {
                this.value = integer;
            }
        });

        // Prevent Enter from submitting the form
        form.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();
            }
        });

        // Remove commas before submitting
        form.addEventListener('submit', function () {
            salaryInput.value = salaryInput.value.replace(/,/g, '');
        });
    </script>

</x-app-layout>