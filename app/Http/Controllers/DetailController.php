<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\TravelPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $id, $slug)
    {
        $item = TravelPackage::with(['galleries'])
                ->where('slug', $slug)
                ->firstOrFail();
        return view('pages.detail', [
            'item' => $item
        ]);
    }
}
