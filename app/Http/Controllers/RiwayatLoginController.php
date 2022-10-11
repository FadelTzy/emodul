<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatLogin;
use Yajra\DataTables\Facades\DataTables;

class RiwayatLoginController extends Controller
{
    public function loghapus($id)
    {
        $data = RiwayatLogin::where('id',$id)->first();
        $data->delete();
        return 'success';
    }
    public function log()
    {
        if (request()->ajax()) {
            return Datatables::of(RiwayatLogin::get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);
                    $btn =
                        "<ul class='list-inline mb-0'>
            
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
                     
                </ul>";
                    return $btn;
                })
                ->addColumn('aktinya', function ($data) {
                    if ($data->tipe == 1) {
                        $btn = 'Login';
                    }else{
                        $btn = 'Mengerjakan Soal';
                    }
                    return $btn;
                })
                ->addColumn('tanggalnya', function ($data) {
                    $btn = $data->created_at->format('Y/m/d H:i:s');
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('admin.log');
    }
}
