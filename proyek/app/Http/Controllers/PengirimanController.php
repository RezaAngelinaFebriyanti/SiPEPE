<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TokoModel;
use App\Models\InfoPengirimanModel;
use Yajra\DataTables\Facades\DataTables;

class PengirimanController extends Controller
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

        $activeMenu = 'pengiriman';

        $toko = TokoModel::all(); // ambil fk id_toko untuk filtering

        return view('pengiriman.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'toko' => $toko,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $pengiriman = InfoPengirimanModel::with('toko')
            ->select('id_pengiriman', 'id_toko', 'hari', 'jam_mulai', 'jam_selesai');

        // Filter data barang berdasarkan kategori_id
        if ($request->id_toko) {
            $pengiriman->where('id_toko', $request->id_toko);
        }
            
        return DataTables::of($pengiriman)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($pengiriman) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/pengiriman/' . $pengiriman->id_pengiriman) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/pengiriman/' . $pengiriman->id_pengiriman . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .url('/pengiriman/' . $pengiriman->id_pengiriman) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" 
                    onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }
}
