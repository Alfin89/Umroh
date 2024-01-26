<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Umroh;
use App\Models\Galeri;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $umroh = [];

        if ($keyword) {
            $umroh = Umroh::where('nik', 'like', "%$keyword%")->get();
        }

        return view('front.front')->with('umroh', $umroh)->with('keyword', $keyword);
    }

    public function beranda()
    {
        return view('front.tamp.beranda');
    }

    public function paket()
    {
        $paket = Paket::select('title', 'image', 'tanggal_keberangkatan', 'harga','jumlah','deskripsi')->get();
        
        return view('front.tamp.paket', compact('paket'));
    }

    public function galeri()
    {
        $galeri = Galeri::select('image', 'deskripsi')->latest()->paginate(8);
        return view('front.tamp.galeri', compact('galeri'));
    }

    public function contact()
    {
        return view('front.tamp.contact');
    }

    public function pendaftaran()
    {
        return view('front.tamp.pendaftran');
    }

    public function store(Request $request)
{
    $this->validate($request, [
        // Sesuaikan aturan validasi sesuai kebutuhan Anda
        'nik' => 'required|numeric|digits:16|unique:pendaftarans,nik',
        'nama' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'nomor_telepon' => 'required|numeric',
        'pekerjaan' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $personalData = new Pendaftaran();
    
    // Upload foto jika ada
    if ($request->hasFile('foto')) {
        $fotoFile = $request->file('foto');
        $fotoExt = $fotoFile->getClientOriginalExtension();
        $fotoFilename = time() . '.' . $fotoExt;
        $fotoFile->move('assets/uploads/pendaftar/', $fotoFilename);
        $personalData->foto = $fotoFilename;
    }

    // Simpan data ke database
    $personalData->nik = $request->nik;
    $personalData->nama = $request->nama;
    $personalData->tempat_lahir = $request->tempat_lahir;
    $personalData->tanggal_lahir = $request->tanggal_lahir;
    $personalData->jenis_kelamin = $request->jenis_kelamin;
    $personalData->alamat = $request->alamat;
    $personalData->nomor_telepon = $request->nomor_telepon;
    $personalData->pekerjaan = $request->pekerjaan;

    $personalData->save();

    session()->flash('success', 'Selamat Kamu Berhasil Mendaftar.');
    return redirect()->back();
}

}
