<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug)
    {

        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::all()->where('brand_id', $brand_id);

        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals
        ]);
    }

    public function update(Request $request, $brand_id)
{
    // Validatie van de inkomende data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    // Ophalen van de bestaande brand
    $brand = Brand::findOrFail($brand_id);

    // Updaten van de database
    $brand->update($validatedData);

    // Terugsturen naar een pagina of view
    return redirect()->route('brands.edit', ['brand_id' => $brand_id, 'brand_slug' => $brand->slug])
                     ->with('success', 'Brand updated successfully!');
}
}
