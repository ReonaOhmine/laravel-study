<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        return view('photos.create');
    }

    public function create()
    {
        return view('photos.create');
    }

    public function store(Request $request)
    {
        $savedFilePath = $request->file('image')->store('photo', 'public');
        Log::debug($savedFilePath);
        $filename = pathinfo($savedFilePath, PATHINFO_BASENAME);
        Log::debug($filename);

        return to_route('photos.show', ['photo' => $filename])->with('success', 'アップロードしました');
    }

    public function show(string $filename)
    {
        return view('photos.show', ['filename' => $filename]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $filename)
    {
        Storage::disk('public')->delete('photo/' . $filename);
        return to_route('photos.create')->with('success', '削除しました');
    }

    public function download($filename)
    {
        return Storage::disk('public')->download('photo/' . $filename, 'アップロード画像.png');
    }
}
