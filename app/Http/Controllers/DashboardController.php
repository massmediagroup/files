<?php

namespace App\Http\Controllers;

use App\File;
use App\Link;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countView = File::all()->sum('view_count');
        $countFiles = File::all()->count();
        $countDelete = File::onlyTrashed()->count();
        $countOneTimeLinks = Link::all()->count();
        return view('dashboard', compact('countFiles', 'countDelete', 'countView', 'countOneTimeLinks'));
    }
}
