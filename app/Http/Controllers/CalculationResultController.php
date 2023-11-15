<?php

namespace App\Http\Controllers;

use App\Models\CalculationResult;
use App\Models\Computation;
use Illuminate\Http\Request;

class CalculationResultController extends Controller
{
    private static $pageTitle = "Calculation Result";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            "results" => ["required", "json"],
            "computation_id" => ["required"]
        ]);

        $calculationResult = CalculationResult::updateOrInsert(["computation_id" => $credentials["computation_id"]] ,$credentials);

        return response()->json(['calculationResult' => $calculationResult, "success" => "Success to save draft the calculation"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalculationResult  $calculationResult
     * @return \Illuminate\Http\Response
     */
    public function show(CalculationResult $calculationResult)
    {
        return response()->json(["calculationResult" => $calculationResult, "message" => "Success to get calculationResult"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalculationResult  $calculationResult
     * @return \Illuminate\Http\Response
     */
    public function edit(CalculationResult $calculationResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CalculationResult  $calculationResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalculationResult $calculationResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalculationResult  $calculationResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalculationResult $calculationResult)
    {
        //
    }
}
