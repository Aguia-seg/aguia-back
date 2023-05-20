<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $invoice = Invoice::all();

        return response(
            $invoice
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
        $invoice = Invoice::where('id', $id)->get();

        return response(
            $invoice
        );
    }

    public function pay(string $id): Response
    {
        $invoice = Invoice::where('id', $id)->update([
            'type' => 'payed'
        ]);

        return response([
            'message' => 'Pendência paga com sucesso'
        ]);
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
