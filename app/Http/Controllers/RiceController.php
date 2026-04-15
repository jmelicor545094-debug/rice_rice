<?php

namespace App\Http\Controllers;

use App\Models\Rice;
use Illuminate\Http\Request;

class RiceController extends Controller
{
    public function index()
    {
        $rices = Rice::orderBy('name')->get();
        return view('rice.index', compact('rices'));
    }

    public function create() {
        return view('rice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',
        ]);

        Rice::create($request->only(['name', 'price', 'stock', 'description']));

        return redirect()->route('rice.index')->with('success', 'Rice item created successfully.');
    }

    public function edit($id)
    {
        $rice = Rice::findOrFail($id);
        return view('rice.edit', compact('rice'));
    }

    public function update(Request $request, $id)
    {
        $rice = Rice::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',
        ]);

        $rice->update($request->only(['name', 'price', 'stock', 'description']));

        return redirect()->route('rice.index')->with('success', 'Rice item updated successfully.');
    }

    public function destroy($id)
    {
        $rice = Rice::findOrFail($id);
        $rice->delete();

        return redirect()->route('rice.index')->with('success', 'Rice item deleted successfully.');
    }
}