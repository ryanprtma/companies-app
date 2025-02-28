<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        return view('components.companies.index', compact('companies'));
    }
    public function create()
    {
        return view('components.companies.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
        ]);

        $company = Company::query()->create($validated);

        $fileName = 'company-' . $company->id . '.jpg';

        if ($request->file('logo')->isValid()) {
            $path = $request->logo->storeAs('images', $fileName, 'public');
            $company->logo_directory = $path;
            $company->save();
        }

        return redirect()->route('index-company');
    }

    public function edit(Request $request, Company $company): View|Application
    {

        return view('components.companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company): RedirectResponse
    {
        $company->update($request->only('name', 'email'));
        return redirect()->route('index-company');
    }

    public function delete(Request $request, Company $company): RedirectResponse
    {
        $company->delete();
        return redirect()->route('index-company');
    }
}
