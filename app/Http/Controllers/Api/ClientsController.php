<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientPost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Client;
use App\Models\Contract;
use App\Models\Invoice;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

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
    public function store(StoreClientPost $request): Response
    {
        $validator = $request->validated();

        $client = Client::create($request->all());

        if ($client) {
            $contract = Contract::create([
                'client_id' => $client->id,
                'plan_id' => $request->plano['id'],
                'expiration' => Carbon::create(Carbon::now()->year, Carbon::now()->month, $request->payday)->addYear(1),
                // 'expiration' => Carbon::create(2023,12, $request->payday)->addMonth( 12-Carbon::now()->month),
                'payday' => $request->payday,
                'value' => $request->plano['value']
            ]);

            if($contract){
                // $data_atual = Carbon::create(2023, 12, 01);
                $data_atual = Carbon::now();
                $dayatual = $data_atual->day;
                $payday = $request->payday;
                $diffday = 0;

                if($payday < $dayatual){
                    $diffday = ($dayatual - $payday) - 1;
                    $days = 30-($diffday +1);
                    $first_expiraton = $data_atual->addDays(30-$diffday);
                    $value =  ($request->plano['value'] / 30) * (30-$diffday);
                }elseif($payday > $dayatual){
                    $diffday = ($payday - $dayatual) + 1;
                    $days = 30+($diffday-1);
                    $first_expiraton = $data_atual->addDays(30+$diffday);
                    $value = ($request->plano['value'] / 30) * (30+$diffday);
                }

                $invoices = Invoice::create([
                    'client_id' => $client->id,
                    'contract_id' => $contract->id,
                    'expiration' => $first_expiraton,
                    'days' => $days,
                    'off' =>  (($request->plano['value'] - $value) < 0) ? 0 : $request->plano['value'] - $value ,
                    'addition' =>   (($value - $request->plano['value'])> 0) ? $value - $request->plano['value'] : 0,
                    'value' => $value,
                ]);
                
            
                for ($i = 1; $i < 12; $i++) { 
                    $invoices = Invoice::create([
                        'client_id' => $client->id,
                        'contract_id' => $contract->id,
                        // 'expiration' => Carbon::create($first_expiraton->year, $i, $request->payday),
                        'expiration' => $first_expiraton->addMonth(1),
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
        $client = Client::where('name', 'LIKE', "%{$request->search}%")
            ->orWhere('cpf_cnpj', '=', $request->search)
            ->get();
        return response(
            $client,
            // 'contracts' => $client->contracts
        );
    }
}
