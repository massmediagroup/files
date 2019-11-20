<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests\FileRequest;
use App\Services\FileUpload;
use Illuminate\Http\Request;
use Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Auth::user()->files->sortByDesc('created_at');
        $count = count($files);
        return view('files.index', compact('count', 'files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileRequest $request, FileUpload $file)
    {
        $path = $file->fileUpload($request);
        $item = File::create([
            'name' => $request->file('file')->getClientOriginalName(),
            'comment' => $request->input('comment'),
            'path' => $path,
            'delete_after' => $request->input('delete_after'),
            'user_id' => Auth::user()->id,
        ]);

        if ($item) {
            return redirect()->route('files.index');
        } else {
            return back()
                ->withErrors(['msg' => 'Помилка пр збереженні.'])
                ->withInput();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view('files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $file->update([
            'url' => route('public.show', $file->id)
        ]);
        return redirect()->route('files.show', $file);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        \Storage::disk('public')->delete($file->path);
        $file->links()->delete();
        $file->delete();
        return redirect()->route('files.index');
    }
}
