<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Umroh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use PDF;


class UmrohController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search')) {
            // pencarian
            $keyword = $request->search;
            $umroh = Umroh::where('nik', 'like', "%" . $keyword . "%")->paginate(1); 
        } else {
            $umroh = Umroh::select('nama', 'nik', 'calon_jamaah', 'pembimbing', 'keberangkatan', 'foto', 'id')
                ->latest()->paginate(5);
        }

        return view('admin.index', compact('umroh'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            // Sesuaikan aturan validasi sesuai kebutuhan Anda
            'nik' => 'required|numeric|digits:16|unique:umrohs,nik',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'calon_jamaah' => 'required',
            'pembimbing' => 'required',
            'keberangkatan' => 'required|date',
            'pekerjaan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $umroh = new Umroh();
        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $fotoFile = $request->file('foto');
            $fotoExt = $fotoFile->getClientOriginalExtension();
            $fotoFilename = time() . '.' . $fotoExt;
            $fotoFile->move('assets/uploads/foto/', $fotoFilename);
            $umroh->foto = $fotoFilename;
        }

        // Simpan data ke database
        $umroh->nik = $request->nik;
        $umroh->nama = $request->nama;
        $umroh->tempat_lahir = $request->tempat_lahir;
        $umroh->tanggal_lahir = $request->tanggal_lahir;
        $umroh->jenis_kelamin = $request->jenis_kelamin;
        $umroh->alamat = $request->alamat;
        $umroh->calon_jamaah = $request->calon_jamaah;
        $umroh->pembimbing = $request->pembimbing;
        $umroh->keberangkatan = $request->keberangkatan;
        $umroh->pekerjaan = $request->pekerjaan;

        $umroh->save();

        session()->flash('success', 'Data umroh berhasil ditambah.');
        return redirect()->route('umroh.index');
    }

    public function edit($id)
    {
        $umroh = Umroh::find($id);
        return view('admin.edit', compact('umroh'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // Sesuaikan aturan validasi sesuai kebutuhan Anda
            'nik' => 'required|numeric|digits:16',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'calon_jamaah' => 'required',
            'pembimbing' => 'required',
            'keberangkatan' => 'required|date',
            'pekerjaan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $umroh = Umroh::find($id);

        // Check and Delete File Image
        if ($request->hasFile('foto')) {
            $path = 'assets/uploads/foto/'.$umroh->foto;
            if (File::exists($path)) {

                File::delete($path);
            }
            if ($request->hasFile('foto')) {
                $fotoFile = $request->file('foto');
                $fotoExt = $fotoFile->getClientOriginalExtension();
                $fotoFilename = time() . '.' . $fotoExt;
                $fotoFile->move('assets/uploads/foto/', $fotoFilename);
                $umroh->foto = $fotoFilename;
            }
        }
        // Simpan data ke database
        $umroh->nik = $request->nik;
        $umroh->nama = $request->nama;
        $umroh->tempat_lahir = $request->tempat_lahir;
        $umroh->tanggal_lahir = $request->tanggal_lahir;
        $umroh->jenis_kelamin = $request->jenis_kelamin;
        $umroh->alamat = $request->alamat;
        $umroh->calon_jamaah = $request->calon_jamaah;
        $umroh->pembimbing = $request->pembimbing;
        $umroh->keberangkatan = $request->keberangkatan;
        $umroh->pekerjaan = $request->pekerjaan;

        $umroh->save();

        return redirect()->route('umroh.index')->with('success', 'Data umroh berhasil diupdate.');
        
    }

    public function delete(Request $request, string $id)
    {
        $umroh = Umroh::find($id);

        if (!$umroh) {
            return response()->json(['error' => 'Umroh not found'], 404);
        }

        if ($umroh->foto) { 
            $path = 'assets/uploads/foto/'.$umroh->foto;
            if (File::exists($path)) {
                if (!File::delete($path)) {
                    return response()->json(['error' => 'Failed to delete photo file'], 500);
                }
            }
        }

        if (!$umroh->delete()) {
            return response()->json(['error' => 'Failed to delete umroh record'], 500);
        }

        return response()->json(['success' => 'Umroh successfully deleted'], 200);
    }


    public function math()
    {
        $totalUmroh = Umroh::count();
        $totalUser = User::count();

        return view('admin.admin', compact('totalUmroh', 'totalUser'));
    }

    public function view($id)
    {
        $umroh = Umroh::find($id);
        return view('admin.view', compact('umroh'));
    }

    function cetak()
    {
        $umroh = Umroh::all();

        view()->share('umroh', $umroh);
        $pdf = PDF::loadview('admin.pdf');
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('data.pdf');
    }
}