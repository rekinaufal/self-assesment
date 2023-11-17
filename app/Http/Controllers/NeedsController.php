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

        return view('needs.index', compact('pageTitle'));
    }

    public function create()
    {   
        if (!request('type-create')) {
            return redirect()->route('needs.index')->with("failed", "Error, silahkan klik tambah data kembali");
        }
        $pageTitle = self::$pageTitle;

        $id = auth()->user()->id;
        $computation = Computation::where('user_id', $id)->get();
        $needs = Needs::latest('created_at')->first()->json_needs;
        return view('needs.create', compact('pageTitle', 'computation', 'needs'));
    }
}
