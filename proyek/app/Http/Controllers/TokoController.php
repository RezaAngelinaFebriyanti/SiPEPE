<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\TokoModel;

class TokoController extends Controller
{
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar Toko',
            'list' => ['Home', 'Toko'],
        ];

        $page = (object) [
            'title' => 'Daftar toko yang terdaftar dalam sistem',
        ];

        $activeMenu = 'toko';

        $toko = TokoModel::all(); //mengambil seluruh data dari tabel toko
        return view('toko.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'page' => $page, 'toko' => $toko]);
    }

    public function list(Request $request)
    {
        $toko = TokoModel::select('id_toko', 'nama_toko');

        if ($request->id_toko) {
            $toko->where('id_toko', $request->id_toko);
        }

        return DataTables::of($toko)
            // menambahkan kolom index
            ->addIndexColumn()
            ->addColumn('aksi', function ($toko) {
                $btn = '<a href="' . url('/toko/' . $toko->id_toko) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/toko/' . $toko->id_toko . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $toko->id_toko) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}