<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $data = Buku::all();
        return view('buku.form', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
        ]);

        Buku::create($request->all());
        return redirect()->back();
    }

    public function edit($id)
    {
        $edit = Buku::findOrFail($id);
        $data = Buku::all();
        return view('buku.form', compact('edit', 'data'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return redirect()->route('buku.index');
    }

    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect()->back();
    }
}
