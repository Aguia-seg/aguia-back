<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Client;
use App\Models\Contract;
use App\Models\Invoice;
use Illuminate\Support\Carbon;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $clients = Client::all();
        return response(
            $clients,
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $client = Client::create($request->all());

        if ($client) {
            $contract = Contract::create([
                'client_id' => $client->id,
                'plan_id' => $request->plano['id'],
                'expiration' => Carbon::create(null, 12, $request->payday),
                'payday' => $request->payday,
                'value' => $request->plano['value']
            ]);

            if($contract){
                $data_atual = Carbon::now();
                $mes_atual = $data_atual->month;
                for ($i = $mes_atual; $i <= 12; $i++) { 
                    $invoices = Invoice::create([
                        'client_id' => $client->id,
                        'contract_id' => $contract->id,
                        'expiration' => Carbon::create(null, $i, $request->payday),
                        'value' => $request->plano['value']
                    ]);
                }              

            }

            return response([
                'message' => 'Cliente cadastrado com sucesso'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $client = Client::getContract()->where('id', $id)->first();
        return response(
            $client,
            // 'contracts' => $client->contracts
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

      public function search(Request $request): Response
    {
        $client = Client::where('name', 'LIKE',"%{$request->search}%" )
        ->orWhere('cpf_cnpj','=',$request->search)
        ->get();
        return response(
           $client,
            // 'contracts' => $client->contracts
        );
    }
}
