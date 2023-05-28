<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Multimedia;
use Illuminate\Http\Request;

class MultimediaController extends Controller
{
    public function index()
    {
        $multimedias = Multimedia::get();
        return response()->json($multimedias);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
