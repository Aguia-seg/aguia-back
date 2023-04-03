<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $houses = DB::table('houses')->join('clients', 'houses.id', '=', 'clients.id')->select('houses.*', 'clients.name')->get();
        return response(
            $houses
        );
    }

    public function filter(Request $request): Response
    {
       
        $houses = House::where('city', 'LIKE', "%$request->city%")
        ->where('district', 'LIKE', "%$request->district%")
        ->where('street', 'LIKE', "%$request->street%")
        ->get();
        
        return response(
           [
            'testes' => $request
           ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        
    }

    public function showDistinctDistrict(): Response
    {
        $district = DB::table('houses')->distinct()->get(['district']);

        return response(
            $district
        );
    }
    public function showDistinctStreet(string $districts): Response
    {
       
        $street = DB::table('houses')->where('district', '=', $districts)->distinct()->get('street');
        
        return response(
            $street
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        //
    }
}
