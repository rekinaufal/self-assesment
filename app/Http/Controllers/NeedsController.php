<?php

namespace App\Http\Controllers;
use App\Models\Computation;
use App\Models\Needs;

use Illuminate\Http\Request;

class NeedsController extends Controller
{
    public static $pageTitle = 'List Kebutuhan';

    public function index()
    {
        $pageTitle = self::$pageTitle;
        $needs = Needs::whereNotNull('computation_id')->get();
        // dd($needs[1]->computation->product_type);
        // if (!$needs) {
        //     return redirect()->route('dashboard')->with("failed", "Error, silahkan klik tambah data kembali");
        // }
        return view('needs.index', compact('pageTitle', 'needs'));
    }

    public function create()
    {   
        if (!request('type-create')) {
            return redirect()->route('needs.index')->with("failed", "Error, silahkan klik tambah data kembali");
        }
        $pageTitle = self::$pageTitle;

        $id = auth()->user()->id;
        $computation = Computation::where('user_id', $id)->get();
        // $needs = Needs::latest('created_at')->first()->json_needs;
        return view('needs.create', compact('pageTitle', 'computation'));
    }

    public function store(Request $request)
    {

        $credentials = $request->validate([
            "json_needs" => ["required", "json"],
            "computation_id" => ["required"],
            "id" => '',
        ]);

        // $needs = Needs::create($credentials);
        $needs = Needs::updateOrInsert(["id" => $credentials["id"]] ,$credentials);


        return response()->json(["success" => "Berhasil simpan list kebutuhan"], 200);
    }

    public function edit($id)
    {
        $pageTitle = self::$pageTitle;

        $need = Needs::find($id);
        $computation = Computation::where('user_id', $id)->get();

        // $need = Needs::where('id', $id)->first()->json_needs;
        if (!$need) {
            return redirect()->route('needs.index')
            ->with('failed', 'Need Id '. $id . ' Not Found');
        }
        return view('needs.edit', compact('pageTitle', 'need', 'computation'));
    }

    // public function update(Request $request, $id)
    // {
    //     $credentials = $request->validate([
    //         "json_needs" => ["required"],
    //         // "computation_id" => ["required"]
    //     ]);

    //     $needs = Needs::find($id);
    //     $needs->update($credentials);
    //     return response()->json(["success" => "Berhasil edit list kebutuhan"], 200);
    // }

    public function show(Needs $need)
    {
        return response()->json(["jsonNeeds" => $need, "message" => "Success to get Json Need"]);
    }
}
