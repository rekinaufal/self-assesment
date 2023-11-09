<?php

namespace App\Http\Controllers;

use App\Models\Computation;
use App\Models\PermenperinCategory;
use Illuminate\Http\Request;

class ComputationController extends Controller
{
    public static $pageTitle = 'Perhitungan';

    public function index()
    {
        $data = [
            "pageTitle" => self::$pageTitle,
            "computations" => Computation::latest()->get(),
            "permenperinCategories" => PermenperinCategory::all(),
        ];
        // $pageTitle = self::$pageTitle;

        return view('computation.index', $data);
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
        $credentials = $request->validate(Computation::$rules);

        $computation = Computation::updateOrInsert(["id" => $request->id], $credentials);

        if (!$computation) return redirect()->route("computation.index")->with("failed", "Failed to create new computation!");

        if ($request->id != null) {
            return redirect()->route("computation.index")->with("success", "Success to edit the computation!");
        }
        return redirect()->route("computation.index")->with("success", "Success to create new computation!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Computation  $computation
     * @return \Illuminate\Http\Response
     */
    public function show(Computation $computation)
    {
        $data = [
            "pageTitle" => self::$pageTitle,
            "computation" => $computation,
        ];

        return view('calculation-result.index', $data);
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
        $computation = $computation->delete();

        if (!$computation) {
            return redirect()->route("computation.index")->with("failed", "Failed to delete the computation");
        }

        return redirect()->route("computation.index")->with("success", "Success to delete the computation!");
    }
}
