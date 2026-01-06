<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Media;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::orderBy('tanggal_mulai', 'asc')->get();
        $profil = \DB::table('profil')->first() ?? (object)[];
        
        return view('agenda', ['agendas' => $agendas, 'profil' => $profil]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agenda-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'penyelenggara' => 'nullable|string|max:100',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => 'Judul agenda harus diisi',
            'lokasi.required' => 'Lokasi agenda harus diisi',
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'lokasi', 'tanggal_mulai', 'tanggal_selesai', 'penyelenggara']);

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('agenda/poster', $filename, 'public');
            $data['poster'] = $path;
        }

        Agenda::create($data);

        return redirect('/agenda')->with('success', 'Agenda berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($agenda_id)
    {
        $agenda = Agenda::findOrFail($agenda_id);
        return view('agenda-edit', ['agenda' => $agenda]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $agenda_id)
    {
        $agenda = Agenda::findOrFail($agenda_id);
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'penyelenggara' => 'nullable|string|max:100',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => 'Judul agenda harus diisi',
            'lokasi.required' => 'Lokasi agenda harus diisi',
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'lokasi', 'tanggal_mulai', 'tanggal_selesai', 'penyelenggara']);

        if ($request->hasFile('poster')) {
            // Delete old poster
            if ($agenda->poster && \Storage::disk('public')->exists($agenda->poster)) {
                \Storage::disk('public')->delete($agenda->poster);
            }
            
            $file = $request->file('poster');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('agenda/poster', $filename, 'public');
            $data['poster'] = $path;
        }

        $agenda->update($data);

        return redirect('/agenda')->with('success', 'Agenda berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($agenda_id)
    {
        $agenda = Agenda::findOrFail($agenda_id);
        
        if ($agenda->poster && \Storage::disk('public')->exists($agenda->poster)) {
            \Storage::disk('public')->delete($agenda->poster);
        }
        
        $agenda->delete();

        return redirect('/agenda')->with('success', 'Agenda berhasil dihapus!');
    }
}

