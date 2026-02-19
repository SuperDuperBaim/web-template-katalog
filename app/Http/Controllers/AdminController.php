<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_template' => 'required',
            'kategori' => 'required',
            'foto_preview' => 'required|url', // Sementara pakai link URL gambar dulu
            'deskripsi' => 'required',
        ]);

        // Simpan ke database
        Template::create($request->all());

        return redirect('/')->with('success', 'Template baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $template = Template::findOrFail($id);
        return view('admin.edit', compact('template'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_template' => 'required',
            'kategori' => 'required',
            'foto_preview' => 'required|url',
            'deskripsi' => 'required',
        ]);

        $template = Template::findOrFail($id);
        $template->update($request->all());

        return redirect('/')->with('success', 'Template berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $template = Template::findOrFail($id);
        $template->delete();

        return redirect('/')->with('success', 'Template berhasil dihapus!');
    }
}
