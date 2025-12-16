<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medias = Media::orderBy('sort_order', 'asc')->paginate(15);
        return view('admin.media.index', ['medias' => $medias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:5120',
            'caption' => 'nullable|string|max:255',
            'ref_table' => 'nullable|string|max:50',
            'ref_id' => 'nullable|numeric',
            'sort_order' => 'nullable|numeric|min:0',
        ], [
            'file.required' => 'File harus diunggah',
            'file.mimes' => 'Tipe file tidak didukung. Gunakan: jpeg, png, jpg, gif, svg, pdf, doc, docx',
            'file.max' => 'Ukuran file maksimal 5MB',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('media', 'public');
            
            Media::create([
                'file_url' => $path,
                'caption' => $request->caption,
                'ref_table' => $request->ref_table,
                'ref_id' => $request->ref_id,
                'mime_type' => $file->getMimeType(),
                'sort_order' => $request->sort_order ?? 0,
            ]);

            return redirect('/admin/media')->with('success', 'Media berhasil diunggah!');
        }

        return back()->with('error', 'Gagal mengunggah media.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        return view('admin.media.edit', ['media' => $media]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'ref_table' => 'nullable|string|max:50',
            'ref_id' => 'nullable|numeric',
            'sort_order' => 'nullable|numeric|min:0',
        ]);

        $media->update([
            'caption' => $request->caption,
            'ref_table' => $request->ref_table,
            'ref_id' => $request->ref_id,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect('/admin/media')->with('success', 'Media berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        if (Storage::disk('public')->exists($media->file_url)) {
            Storage::disk('public')->delete($media->file_url);
        }
        
        $media->delete();
        
        return redirect('/admin/media')->with('success', 'Media berhasil dihapus!');
    }

    /**
     * Get media by reference table and ID
     */
    public function getByReference($refTable, $refId)
    {
        $medias = Media::where('ref_table', $refTable)
                        ->where('ref_id', $refId)
                        ->orderBy('sort_order', 'asc')
                        ->get();
        
        return response()->json($medias);
    }
}
