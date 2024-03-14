<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Factories;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(10);

        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $factory = Factories::all();
        return view('employee.create')->with('factory', $factory);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable',
            'factory_id' => 'required',
        ]);

        $factory = Factories::all();

        Employee::create($request->except('_token'))->with('factory', $factory);

        return redirect()->route('employee.index')
            ->withSuccess('Employee has been created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $factory = Factories::all();
        return view('employee.edit', compact('employee'))->with('factory', $factory);
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'nullable',
            'factory_id' => 'required',
        ]);

        $employee->update($request->all());

        return redirect()->route('employee.index')
            ->withSuccess('Employee details has been updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')
            ->withSuccess('Employee has been delete successfully.');
    }
}
