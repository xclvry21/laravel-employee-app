<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4">
                        <p class="text-sm text-gray-500">ID</p>
                        <p class="text-lg">
                            {{ $employee->id }}
                        </p>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm text-gray-500">First Name</p>
                        <p class="text-lg">
                            {{ $employee->first_name }}
                        </p>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm text-gray-500">Last Name</p>
                        <p class="text-lg">
                            {{ $employee->last_name }}
                        </p>
                    </div>

                    <div class="mb-6">
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="text-lg">
                            {{ $employee->email }}
                        </p>
                    </div>

                    <div class="mb-6">
                        <p class="text-sm text-gray-500">Gender</p>
                        <p class="text-lg">
                            {{ $employee->gender }}
                        </p>
                    </div>

                    <div class="mb-6">
                        <p class="text-sm text-gray-500">Birthday</p>
                        <p class="text-lg">
                            {{ \Carbon\Carbon::parse($employee->birthday)->format('Y-m-d') }}
                        </p>
                    </div>

                    <div class="mb-6">
                        <p class="text-sm text-gray-500">Monthly Salary</p>
                        <p class="text-lg">
                            {{ number_format($employee->monthly_salary, 2) }}
                        </p>
                    </div>

                    <div class="flex gap-2">

                        <a
                            href="{{ route('employees.edit', $employee) }}"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700"
                        >
                            Edit
                        </a>

                        <a
                            href="{{ route('employees.index') }}"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300"
                        >
                            Back
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>