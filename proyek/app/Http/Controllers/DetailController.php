<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\TokoModel;
use App\Models\PengirimanModel;
use App\Models\DetailPengirimanModel;

class DetailController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Pengiriman',
            'list' => ['Home', 'Pengiriman Barang']
        ];

        $page = (object) [
            'title' => 'Daftar pengiriman barang yang terdaftar dalam sistem'
        ];

        $activeMenu = 'DetailPengiriman';

        $toko = TokoModel::all(); // ambil fk nama_toko untuk filtering
        $pengiriman2 = PengirimanModel::all(); // ambil fk tgl_kirim untuk filtering

        return view(
            'detailpengiriman.index',
            [
                'breadcrumb' => $breadcrumb,
                'page' => $page,
                'toko' => $toko,
                'pengiriman2' => $pengiriman2,
                'activeMenu' => $activeMenu
            ]
        );
    }
    public function list(Request $request)
    {
        $DetailPengiriman = DetailPengirimanModel::select(
            'detail_pengiriman.id_detail_pengiriman',
            'toko.nama_toko',
            'pengiriman.tgl_kirim',
            'detail_pengiriman.jumlah_kirim'
        )
        ->join('pengiriman', 'detail_pengiriman.id_pengiriman', '=', 'pengiriman.id_pengiriman')
        ->join('toko', 'pengiriman.id_toko', '=', 'toko.id_toko');
    
        /*
        $DetailPengiriman = DetailPengirimanModel::select('id_detail_pengiriman', 'nama_toko', 'tgl_kirim', 'jumlah_kirim')
            ->with('toko')
            ->with('pengiriman2');
        */

        // Filter data barang berdasarkan id_toko
        if ($request->id_toko) {
            $DetailPengiriman->where('toko.id_toko', $request->id_toko);
        }
        
            
        return DataTables::of($DetailPengiriman)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($DetailPengiriman) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/DetailPengiriman/' . $DetailPengiriman->id_detail_pengiriman) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/DetailPengiriman/' . $DetailPengiriman->id_detail_pengiriman . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .url('/DetailPengiriman/' . $DetailPengiriman->id_detail_pengiriman) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" 
                    onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }
}
