<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id )
    {
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);

        return view('pages/manual_view', [
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }

    public function link($manual_id){
        // manual ophalen die bij de manual_id hoort
        // views ophogen van de opgehaalde manual, door sturen manual
        $manual = Manual::findOrFail($manual_id);
        $manual->increment('views');
        $originUrl = $manual->originUrl;
        if ($originUrl) {
            // Redirect naar de gevonden originUrl
            header('Location: ' . $originUrl);
            exit(); // Stop verdere uitvoer na de redirect
        }
        header('Location: ' . $manual->originUrl); // $originUrl opzoeken in de manual
        // return view('manuals.show', compact('manual'));
    }

    // public function show($id)
    //     {
    //         $manual = Manual::findOrFail($id);
    //         $manual->increment('views');
    //         return view('manuals.show', compact('manual'));
    //     }

        public function topManuals()
        {
            $topManuals = Manual::orderBy('views', 'desc')->take(10)->get();
            return view('homepage', compact('topManuals'));
        }

        public function showByBrand($brand)
        {
            $topManualsByBrand = Manual::where('brand', $brand)
                ->orderBy('views', 'desc')
                ->take(5)
                ->get();

            return view('manuals.by_brand', compact('topManualsByBrand', 'brand'));
        }
}
