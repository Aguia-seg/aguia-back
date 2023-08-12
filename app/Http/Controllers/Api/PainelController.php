<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PainelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $clients_active = Client::where('active', 1)->count();

        $clients_today = Client::where('active', 1)
        ->whereDate('created_at', Carbon::now())
        ->count();

        $clients_deactive = Client::onlyTrashed()->where('active', 0)->count();

        $clients_deactive_today = Client::onlyTrashed()->where('active', 0)
        ->whereDate('created_at', Carbon::now())
        ->count();

        $debit = Invoice::where('type', 'pending')
        ->select(DB::raw('SUM(value) as total_invoices'))
        ->whereYear('expiration', Carbon::now()->year)
        ->whereMonth('expiration', Carbon::now()->month)
        ->first();

        return response([
            'client_active' => $clients_active,
            'client_today' =>  $clients_today,
            'client_deactive' => $clients_deactive,
            'client_deactive_today' =>  $clients_deactive_today,
            'invoice_month' => $debit,
        ]);
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
        //
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
