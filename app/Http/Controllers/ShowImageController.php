<?php

namespace App\Http\Controllers;

use App\Events\FileView;
use App\File;
use Illuminate\Http\Request;
use App\Events\PostViewe;

class ShowImageController extends Controller
{
    public function show($id)
    {
        $file = File::where('id', $id)->first();
        if (!$file){
            abort(404);
        }
        event( new FileView($file));
        return view('public.show', compact('file'));
    }
}
