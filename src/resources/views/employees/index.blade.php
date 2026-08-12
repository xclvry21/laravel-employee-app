<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Employees') }}
            </h2>

            <a
                href="{{ route('employees.create') }}"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700"
            >
                Add Employee
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left p-3">ID</th>
                                <th class="text-left p-3">Name</th>
                                <th class="text-left p-3">Email</th>
                                <th class="text-left p-3">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($employees as $employee)
                                <tr class="border-b">
                                    <td class="p-3">
                                        {{ $employee->id }}
                                    </td>

                                    <td class="p-3">
                                        {{ $employee->first_name }}
                                        {{ $employee->last_name }}
                                    </td>

                                    <td class="p-3">
                                        {{ $employee->email }}
                                    </td>

                                    <td class="p-3">
                                        <div class="flex gap-2">

                                            <a
                                                href="{{ route('employees.show', $employee) }}"
                                                class="text-blue-600 hover:text-blue-800"
                                            >
                                                View
                                            </a>

                                            <a
                                                href="{{ route('employees.edit', $employee) }}"
                                                class="text-indigo-600 hover:text-indigo-800"
                                            >
                                                Edit
                                            </a>

                                            <form
                                                action="{{ route('employees.destroy', $employee) }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="text-red-600 hover:text-red-800"
                                                    onclick="return confirm('Are you sure you want to delete this employee?')"
                                                >
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td
                                        colspan="4"
                                        class="p-6 text-center text-gray-500"
                                    >
                                        No employees found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $employees->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>