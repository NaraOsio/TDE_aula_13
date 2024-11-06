<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

abstract class Controller
{
    public function index()
{
    $products = Pokemon::all();
    return view('pokemon.index', compact('Pokemon'));
}

public function create()
{
    return view('pokemon.create');
}

public function store(Request $request)
{
    Pokemon::create($request->all());
    return redirect('pokemon')->with('success', 'Pokemon created successfully.');
}

public function edit($id)
{
    $product = Pokemon::findOrFail($id);
    return view('pokemon.edit', compact('Pokemon'));
}

public function update(Request $request, $id)
{
    $product = Pokemon::findOrFail($id);
    $product->update($request->all());
    return redirect('pokemon')->with('success', 'Pokemon updated successfully.');
}

public function destroy($id)
{
    $product = Pokemon::findOrFail($id);
    $product->delete();
    return redirect('pokemon')->with('success', 'Pokemon deleted successfully.');
}
}
