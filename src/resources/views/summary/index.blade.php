<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Summary') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Top Summary Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- Total Employees --}}
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6">

                        <div class="text-sm font-medium text-gray-500">
                            Total Employees
                        </div>

                        <div class="mt-4 text-4xl font-bold text-gray-900">
                            {{ $totalEmployees }}
                        </div>

                    </div>
                </div>


                {{-- Male Employees --}}
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6">

                        <div class="text-sm font-medium text-gray-500">
                            Male Employees
                        </div>

                        <div class="mt-4 text-4xl font-bold text-gray-900">
                            {{ $maleEmployees }}
                        </div>

                    </div>
                </div>


                {{-- Female Employees --}}
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6">

                        <div class="text-sm font-medium text-gray-500">
                            Female Employees
                        </div>

                        <div class="mt-4 text-4xl font-bold text-gray-900">
                            {{ $femaleEmployees }}
                        </div>

                    </div>
                </div>


                {{-- Average Age --}}
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6">

                        <div class="text-sm font-medium text-gray-500">
                            Average Age
                        </div>

                        <div class="mt-4 text-4xl font-bold text-gray-900">
                            {{ number_format($averageAge ?? 0, 1) }}
                        </div>

                    </div>
                </div>

            </div>


            {{-- Total Monthly Salary --}}
            <div class="mt-6">

                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6">

                        <div class="text-sm font-medium text-gray-500">
                            Total Monthly Salary
                        </div>

                        <div class="mt-4 text-4xl font-bold text-gray-900">
                            ₱{{ number_format($totalMonthlySalary, 2) }}
                        </div>

                        <div class="mt-2 text-sm text-gray-500">
                            Combined monthly salary of all employees
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>