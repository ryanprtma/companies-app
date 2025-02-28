<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('components.employees.index', compact('employees'));
    }
    public function create(): View|Application|Factory
    {
        $companies = Company::all();
        return view('components.employees.create', compact('companies'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'company_id' => 'required',
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'],
            'phone' => ['required', 'string', 'max:255'],
        ]);

        Employee::query()->create($validated);

        return redirect()->route('index-employee');
    }

    public function edit(Request $request, Employee $employee): View|Application
    {
        return view('components.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee): RedirectResponse
    {
        $employee->update($request->only('first_name', 'last_name', 'email', 'phone'));
        return redirect()->route('index-employee');
    }

    public function delete(Request $request, Employee $employee): RedirectResponse
    {
        $employee->delete();
        return redirect()->route('index-employee');
    }
}
