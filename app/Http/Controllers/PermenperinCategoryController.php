<?php

namespace App\Http\Controllers;

use App\Models\PermenperinCategory;
use Illuminate\Http\Request;

class PermenperinCategoryController extends Controller
{
    public static $pageTitle = 'Permenperin Categories';
    function __construct()
    {
        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('permission:user-show', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "permenperin" => PermenperinCategory::get(),
            "pageTitle" => self::$pageTitle,
            "options" => PermenperinCategory::getOptions(),
        ];

        return view('permenperincategory.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (!$this->validateInput($request)) {
        //     return redirect()->back()->with('failed', 'Permenperin gagal dibuat');
        // }
        $credentials = $request->validate([
            "name" => ["required"],
            "color" => ["required"],
        ]);

        $permenperinCategory = PermenperinCategory::create($credentials);

        if ($permenperinCategory) {
            return redirect()->back()->with('success', 'Permenperin berhasil dibuat');
        } else {
            return redirect()->back()->with('failed', 'Permenperin gagal dibuat');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermenperinCategory  $permenperinCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PermenperinCategory $permenperinCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermenperinCategory  $permenperinCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PermenperinCategory::find($id);
        if (!$data) {
            return redirect()->back()->with('failed', 'Data not found');
        }
        $pageTitle = self::$pageTitle;
        return view('permenperincategory.edit', compact('data', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PermenperinCategory  $permenperinCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $credentials = $request->validate([
            "name" => ["required"],
            "color" => ["required"],
        ]);

        // dd($permenperinCategory);
        $permenperinCategory = PermenperinCategory::find($request->id);
        $permenperinCategory->update($credentials);
        if ($permenperinCategory) {
            return redirect()->back()
                ->with('success', 'Data updated successfully');
        }
        return redirect()->back()->with('failed', 'Permenperin gagal diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermenperinCategory  $permenperinCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDeleted = PermenperinCategory::find($id)->delete();
        if ($isDeleted) {
            return redirect()->back()->with('success', 'Permenperin berhasil dihapus');
        }
        return redirect()->back()->with('failed', 'Permenperin gagal dihapus');
    }

    private function validateInput(Request $request)
    {
        $isvalid = $request->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'color' => ['required'],
        ]);

        return $isvalid;
    }
}
