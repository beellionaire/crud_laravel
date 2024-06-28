<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProgramStudiController extends Controller
{
    public function index()
    {
        $prodi = ProgramStudi::latest()->paginate(5);

        return view("program_studi/index", compact('prodi'));
    }

    public function create(): View
    {
        return view('program_studi/create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_prodi'     => 'required|min:1',
            'kode_prodi'     => 'required|min:1',
            'kode_fakultas'   => 'required|min:1'
        ]);

        //create post
        ProgramStudi::create([
            'nama_prodi'     => $request->nama_prodi,
            'kode_prodi'     => $request->kode_prodi,
            'kode_fakultas'   => $request->kode_fakultas
        ]);

        //redirect to index
        return redirect()->route('program-studi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        //get post by ID
        $prodi = ProgramStudi::findOrFail($id);

        //render view with post
        return view('program_studi.detail', compact('prodi'));
    }


    public function edit(string $id): View
    {
        //get post by ID
        $prodi = ProgramStudi::findOrFail($id);

        //render view with post
        return view('program_studi.edit', compact('prodi'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_prodi'     => 'required|min:1',
            'kode_prodi'     => 'required|min:1',
            'kode_fakultas'   => 'required|min:1'
        ]);

    
        $prodi = ProgramStudi::findOrFail($id);

        $prodi->update([
            'nama_prodi'     => $request->nama_prodi,
            'kode_prodi'     => $request->kode_prodi,
            'kode_fakultas'   => $request->kode_fakultas
        ]);

        return redirect()->route('program-studi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $prodi = ProgramStudi::findOrFail($id);

        $prodi->delete();

        return redirect()->route('program-studi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}
