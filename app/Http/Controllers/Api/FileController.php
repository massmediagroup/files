<?php

namespace App\Http\Controllers\Api;

use App\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Services\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileRequest $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads','public');
        }
        $item = File::create([
            'name' => $request->file('file')->getClientOriginalName(),
            'comment' => $request->input('comment'),
            'path' => $path,
            'delete_after' => $request->input('delete_after'),
            'user_id' => Auth::user()->id,
        ]);

        if ($item) {
            return response()->json($item->id, 201);
        } else {
            return back()
                ->withErrors(['msg' => 'Помилка пр збереженні.'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::where('id', $id)->first();
        return response()->json($file, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = File::where('id', $id)->first();
        $file->update([
            'url' => route('public.show', $file->id)
        ]);
        return response()->json($file->url, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::where('id', $id)->first();
        \Storage::disk('public')->delete($file->path);
        $file->links()->delete();
        $file->delete();
        return response()->json(['message' => 'Дані видалено'], 204);
    }
}
