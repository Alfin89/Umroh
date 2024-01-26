<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftar = Pendaftaran::select('id','nama','nik','tempat_lahir','tanggal_lahir','jenis_kelamin','alamat','nomor_telepon','pekerjaan','foto')->latest()->paginate(5);

        return view('admin.pendaftar.index', compact('pendaftar'));
    }

    function cetak()
    {
        $pendaftar = Pendaftaran::all();

        view()->share('pendaftar', $pendaftar);
        $pdf = PDF::loadview('admin.pendaftar.pdf');
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Pendaftar.pdf');
    }

    public function view($id)
    {
        $pendaftar = Pendaftaran::find($id);
        return view('admin.pendaftar.view', compact('pendaftar'));
    }

    public function delete(Request $request,$id)
    {
        $pendaftar = Pendaftaran::find($id);

        if (!$pendaftar) {
            return response()->json(['error' => 'pendaftar not found'], 404);
        }

        if ($pendaftar->foto) { 
            $path = 'assets/uploads/pendaftar/'.$pendaftar->foto;
            if (File::exists($path)) {
                if (!File::delete($path)) {
                    return response()->json(['error' => 'Failed to delete photo file'], 500);
                }
            }
        }

        if (!$pendaftar->delete()) {
            return response()->json(['error' => 'Failed to delete pendaftar record'], 500);
        }

        return response()->json(['success' => 'pendaftar successfully deleted'], 200);
    }

}
