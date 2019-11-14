<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class ShowImageController extends Controller
{
    public function show($id)
    {
        $file = File::where('id', $id)->first();
        if (!$file){
            abort(404);
        }
        event('FileHasViewed', $file);
        return view('public.show', compact('file'));
    }
}
