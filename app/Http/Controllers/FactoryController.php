<?php

namespace App\Http\Controllers;

use App\Models\Factories;
use Illuminate\Http\Request;

class FactoryController extends Controller
{
    public function index()
    {
        $factories = Factories::orderBy('id', 'desc')->paginate(10);

        return view('factories.index', compact('factories'));
    }

    public function create()
    {
        return view('factories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'factory_name' => 'required',
            'location' => 'required',
            'email' => 'required|email|unique:factories,email,',
            'website' => 'nullable',
        ]);

        Factories::create($request->except('_token'));

        return redirect()->route('factories.index')
            ->withSuccess('Factory has been created successfully.');
    }

    public function show(Factories $factory)
    {
        return view('factories.show', compact('factory'));
    }

    public function edit(Factories $factory)
    {
        return view('factories.edit', compact('factory'));
    }

    public function update(Request $request, Factories $factory)
    {
        $request->validate([
            'factory_name' => 'required',
            'location' => 'required',
            'email' => 'required|email|unique:factories,email,' . $factory->id,
            'website' => 'required'
        ]);

        $factory->update($request->all());

        return redirect()->route('factories.index')
            ->withSuccess('Factory details has been updated successfully.');
    }

    public function destroy(Factories $factory)
    {
        $factory->delete();

        return redirect()->route('factories.index')
            ->withSuccess('Factory has been delete successfully.');
    }
}
