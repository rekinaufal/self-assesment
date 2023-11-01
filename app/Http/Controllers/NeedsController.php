<?php

namespace App\Http\Controllers;

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
        $pageTitle = self::$pageTitle;

        return view('needs.create', compact('pageTitle'));
    }
}
