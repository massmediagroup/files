<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function generate(int $idFile)
    {
        $token = md5(microtime());
        $url = Link::create([
            'token' => $token,
            'url' => route('link.show', $token),
            'file_id' => $idFile
        ]);
        return response()->json($url->url, 201);
    }
}
