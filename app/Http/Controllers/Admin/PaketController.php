<?php

namespace App\Http\Controllers\Admin;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::select('id', 'title', 'image', 'tanggal_keberangkatan', 'harga', 'jumlah','deskripsi')->get();

        return view('admin.paket.index', compact('pakets'));
    }

    public function create()
    {
       return view('admin.paket.create');
    }

   public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_keberangkatan' => 'required|date',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
            'deskripsi' => 'required',
        ]);

        $paket = new Paket();

        if ($request->hasFile('image')) {
            $fotoFile = $request->file('image');
            $fotoExt = $fotoFile->getClientOriginalExtension();
            $fotoFilename = time() . '.' . $fotoExt;
            $fotoFile->move('assets/uploads/paket/', $fotoFilename);
            $paket->image = $fotoFilename;
        }

        $paket->title = $request->title;
        $paket->tanggal_keberangkatan = $request->tanggal_keberangkatan;
        $paket->harga = $request->harga;
        $paket->jumlah = $request->jumlah;
        $paket->deskripsi = $request->deskripsi;

        $paket->save();

        session()->flash('success', 'Paket Umroh berhasil ditambah.');
        return redirect()->route('paket.index');
    }

    public function edit($id)
    {
        $paket = Paket::find($id);
        return view('admin.paket.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_keberangkatan' => 'required|date',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
            'deskripsi' => 'required',
        ]);

        $paket = Paket::find($id);
        
        
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/paket/'.$paket->image;
            if (File::exists($path)) {

                File::delete($path);
            }
            if ($request->hasFile('image')) {
                $fotoFile = $request->file('image');
                $fotoExt = $fotoFile->getClientOriginalExtension();
                $fotoFilename = time() . '.' . $fotoExt;
                $fotoFile->move('assets/uploads/paket/', $fotoFilename);
                $paket->image = $fotoFilename;
            }
        }
        $paket->title = $request->title;
        $paket->tanggal_keberangkatan = $request->tanggal_keberangkatan;
        $paket->harga = $request->harga;
        $paket->jumlah = $request->jumlah;
        $paket->deskripsi = $request->deskripsi;

        $paket->save();

        session()->flash('success', 'Paket Umroh berhasil diedit.');
        return redirect()->route('paket.index');
    }

    public function delete(string $id)
    {
        $paketId = Paket::find($id);

        if (!$paketId) {
            return response()->json(['error' => 'Galeri not found'], 404);
        }

        if ($paketId->image) { 
            $path = 'assets/uploads/paket/'.$paketId->image;
            if (File::exists($path)) {
                if (!File::delete($path)) {
                    return response()->json(['error' => 'Failed to delete image file'], 500);
                }
            }
        }

        if (!$paketId->delete()) {
            return response()->json(['error' => 'Failed to delete galeri record'], 500);
        }

        return response()->json(['success' => 'Galeri successfully deleted'], 200);
    }
    
}
