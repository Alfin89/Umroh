<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(8);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required',
        ]);
        $galeri = new Galeri();

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageExt = $imageFile->getClientOriginalExtension();
            $imageName = time() . '.' . $imageExt;
            $imageFile->move('assets/uploads/galeri/', $imageName);
            $galeri->image = $imageName;
        }
        $galeri->deskripsi = $request->deskripsi;
        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Gambar berhasil diunggah.');
    }

    public function delete(string $id)
    {
        $galeriId = Galeri::find($id);

        if (!$galeriId) {
            return response()->json(['error' => 'Galeri not found'], 404);
        }

        if ($galeriId->image) { 
            $path = 'assets/uploads/galeri/'.$galeriId->image;
            if (File::exists($path)) {
                if (!File::delete($path)) {
                    return response()->json(['error' => 'Failed to delete image file'], 500);
                }
            }
        }

        if (!$galeriId->delete()) {
            return response()->json(['error' => 'Failed to delete galeri record'], 500);
        }

        return response()->json(['success' => 'Galeri successfully deleted'], 200);
    }


    // public function edit($id)
    // {
    //     $galeri = Galeri::find($id);
    //     return view('galeri.edit', compact('galeri'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $galeri = Galeri::find($id);

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('images'), $imageName);
    //         $galeri->image = $imageName;
    //     }

    //     $galeri->save();

    //     return redirect()->route('galeri.index')->with('success', 'Gambar berhasil diperbarui.');
    // }

    // public function destroy($id)
    // {
    //     $galeri = Galeri::find($id);
    //     $galeri->delete();

    //     return redirect()->route('galeri.index')->with('success', 'Gambar berhasil dihapus.');
    // }
}
