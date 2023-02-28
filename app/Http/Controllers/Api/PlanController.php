<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $plans = Plan::all();
        return response(
            $plans
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $plan = Plan::create($request->all());

        return response([
            'message'=> 'Plano cadastrado com sucesso'
        ]);
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