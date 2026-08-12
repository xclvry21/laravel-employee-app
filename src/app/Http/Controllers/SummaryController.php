<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
use App\Models\Employee;
use Illuminate\View\View;

class SummaryController extends Controller
{
    /**
     * Display the employee summary dashboard.
     */
    public function index(): View
    {
        $totalEmployees = Employee::count();

        $maleEmployees = Employee::where('gender', Gender::Male)->count();

        $femaleEmployees = Employee::where('gender', Gender::Female)->count();

        $averageAge = Employee::query()
            ->selectRaw(
                'AVG(TIMESTAMPDIFF(YEAR, birthday, CURDATE())) as average_age'
            )
            ->value('average_age');

        $totalMonthlySalary = Employee::sum('monthly_salary');

        return view('summary.index', compact(
            'totalEmployees',
            'maleEmployees',
            'femaleEmployees',
            'averageAge',
            'totalMonthlySalary'
        ));
    }
}
