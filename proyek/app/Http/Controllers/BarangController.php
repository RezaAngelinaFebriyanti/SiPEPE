<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\BarangModel;
class BarangController extends Controller
{
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar Barang',
            'list' => ['Home', 'Barang'],
        ];

        $page = (object) [
            'title' => 'Daftar barang yang terdaftar dalam sistem',
        ];

        $activeMenu = 'barang';

        $barang = BarangModel::all(); //mengambil seluruh data dari tabel barang
        return view('barang.index', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'page' => $page,
            'barang' => $barang
        ]);
    }

    public function list(Request $request)
    {
        $barang = BarangModel::select('id_barang', 'nama_barang', 'harga');

        if ($request->id_barang) {
            $barang->where('id_barang', $request->id_barang);
        }

        return DataTables::of($barang)
            // menambahkan kolom index
            ->addIndexColumn()
            ->addColumn('aksi', function ($barang) {
                $btn = '<a href="' . url('/barang/' . $barang->id_barang) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/barang/' . $barang->id_barang . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $barang->id_barang) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}