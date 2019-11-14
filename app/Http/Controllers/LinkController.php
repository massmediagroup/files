<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function generate(int $idFile)
    {
        $token = md5(microtime());
        Link::create([
            'token' => $token,
            'url' => route('link.show', $token),
            'file_id' => $idFile
        ]);
        return redirect()->back();
    }

    public function show($token)
    {
        $link = Link::with('file')->where('token', $token)->first();
        if (!$link){
            abort(404);
        }
        $file = $link->file;
        $link->delete();
        return view('public.show', compact('file'));
    }
}
