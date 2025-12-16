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
        $agendas = Agenda::orderBy('tanggal', 'asc')->get();
        $profil = \DB::table('profil')->first() ?? (object)[];
        
        // Load media untuk setiap agenda
        foreach ($agendas as $agenda) {
            $agenda->medias = Media::where('ref_table', 'agenda')
                                     ->where('ref_id', $agenda->id)
                                     ->orderBy('sort_order', 'asc')
                                     ->get();
        }
        
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
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'nullable|date_format:H:i',
            'penyelenggara' => 'nullable|string|max:255',
        ], [
            'judul.required' => 'Judul agenda harus diisi',
            'lokasi.required' => 'Lokasi agenda harus diisi',
            'tanggal.required' => 'Tanggal agenda harus diisi',
            'waktu_mulai.required' => 'Waktu mulai harus diisi',
        ]);

        Agenda::create($request->all());

        return redirect('/agenda')->with('success', 'Agenda berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        return view('agenda-edit', ['agenda' => $agenda]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'nullable|date_format:H:i',
            'penyelenggara' => 'nullable|string|max:255',
        ], [
            'judul.required' => 'Judul agenda harus diisi',
            'lokasi.required' => 'Lokasi agenda harus diisi',
            'tanggal.required' => 'Tanggal agenda harus diisi',
            'waktu_mulai.required' => 'Waktu mulai harus diisi',
        ]);

        $agenda->update($request->all());

        return redirect('/agenda')->with('success', 'Agenda berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect('/agenda')->with('success', 'Agenda berhasil dihapus!');
    }
}

