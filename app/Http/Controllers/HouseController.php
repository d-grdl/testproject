<?php


namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->query();

        return House::query()
            ->when(array_key_exists('nameQuery', $filters),
                fn($q) => $q->where('name', 'LIKE', '%'.$filters['nameQuery'].'%'))
            ->when(array_key_exists('bedroomsNumber', $filters),
                fn($q) => $q->where('bedrooms', $filters['bedroomsNumber']))
            ->when(array_key_exists('bathroomsNumber', $filters),
                fn($q) => $q->where('bathrooms', $filters['bathroomsNumber']))
            ->when(array_key_exists('storeysNumber', $filters),
                fn($q) => $q->where('storeys', $filters['storeysNumber']))
            ->when(array_key_exists('garagesNumber', $filters),
                fn($q) => $q->where('garages', $filters['garagesNumber']))
            ->when(array_key_exists('priceFrom', $filters),
                fn($q) => $q->where('price', '>=', $filters['priceFrom']))
            ->when(array_key_exists('priceTo', $filters),
                fn($q) => $q->where('price', '<=', $filters['priceTo']))
            ->get();
    }
}
