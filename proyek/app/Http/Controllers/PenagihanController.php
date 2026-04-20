<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TokoModel;
use App\Models\InfoPenagihanModel;
use Yajra\DataTables\Facades\DataTables;

class PenagihanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Info Pengiriman',
            'list' => ['Home', 'Pengiriman']
        ];

        $page = (object) [
            'title' => 'Info pengiriman yang terdaftar dalam sistem'
        ];

        $activeMenu = 'penagihan';

        $toko = TokoModel::all(); // ambil fk id_toko untuk filtering

        return view('penagihan.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'toko' => $toko,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $penagihan = InfoPenagihanModel::with('toko')
            ->select('id_penagihan', 'id_toko', 'hari', 'jam_mulai', 'jam_selesai');

        // Filter data barang berdasarkan kategori_id
        if ($request->id_toko) {
            $penagihan->where('id_toko', $request->id_toko);
        }
            
        return DataTables::of($penagihan)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($penagihan) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/penagihan/' . $penagihan->id_penagihan) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/penagihan/' . $penagihan->id_penagihan . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .url('/penagihan/' . $penagihan->id_penagihan) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" 
                    onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }
}
