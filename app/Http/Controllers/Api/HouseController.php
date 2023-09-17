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
        // $housesWithClient = DB::table('houses')->join('clients', 'houses.id', '=', 'clients.id')->select('houses.*', 'clients.name', 'clients.active')->get();
        $housesAll = House::withClients()->get();
        //$housesMerged = (object) array_combine($housesWithClient,  $housesAll);        
        //$housesMerged = $housesWithClient->merge($housesAll);
       // $houses = $housesMerged->all();

        return response(
            $housesAll
        );
    }

    public function filter(Request $request): Response
    {
       
        $houses = House::withClients()->where('city', 'LIKE', "%$request->city%")
        ->where('district', 'LIKE', "%$request->district%")
        ->where('street', 'LIKE', "%$request->street%")
        ->get();
        
        return response(
           $houses
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        
        $houses = House::create([
            'cep' => $request->cep,
            'city' => $request->city,
            'district' => $request->district,
            'street' => $request->street,
            'type' => $request->type,
            'number' => $request->number,
            'veicle' => $request->veicle,
            'badget_id' => $request->situation,
            'client_id' => $request->client_id
        ]);

        

        return response([
            'message' => 'Residência cadastrada com sucesso'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $houses = House::withClients()->where('id', $id)->get();
        
        return response(
            $houses
        );
    }

    public function showDistinctDistrict($city): Response
    {
        $district = DB::table('houses')->where('city', '=', $city)->distinct()->get(['district']);

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
        $houses = House::find($id)->update([
            'badget_id' => $request->situation
        ]);

        return response([
            'message' => 'Dado atualizado com sucesso',
            
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        //
    }
}
