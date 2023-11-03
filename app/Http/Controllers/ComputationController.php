<?php

namespace App\Http\Controllers;

use App\Models\Computation;
use Illuminate\Http\Request;

class ComputationController extends Controller
{
    public static $pageTitle = 'Perhitungan';

    public function index()
    {
        $pageTitle = self::$pageTitle;

        return view('computation.index', compact('pageTitle'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = self::$pageTitle;

        return view('computation.computation', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Computation  $computation
     * @return \Illuminate\Http\Response
     */
    public function show(Computation $computation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Computation  $computation
     * @return \Illuminate\Http\Response
     */
    public function edit(Computation $computation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Computation  $computation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Computation $computation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Computation  $computation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Computation $computation)
    {
        //
    }
}
