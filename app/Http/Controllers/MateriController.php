<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\pembelajaran;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Text;
use App\Models\File;
use App\Models\Video;

class MateriController extends Controller
{
    public function materitext($id,$bel)
    {
        // $user = pembelajaran::with('oMateri')->where('id', $bel)->first();
       $user = Materi::with('oMateri')->where('id',$id)->first();
        // return $user;
        // return Text::where('id_materi',$id)->get();
        if (request()->ajax()) {
            return Datatables::of(Text::where('id_materi',$id)->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);
                    $btn =
                        "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-sm btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-sm btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='lihat(" .
                        $dataj .
                        ")'   class='btn btn-sm btn-primary btn-xs mb-1'>Lihat</button>
                    </li>
                </ul>";
                    return $btn;
                })
                
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('admin.materi.text', compact( 'user','id'));
    }
    public function materifile($id,$bel)
    {
        $user = pembelajaran::with('oMateri')->where('id', $bel)->first();
        if (request()->ajax()) {
            return Datatables::of(File::with('oMateri')->where('id_materi',$id)->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);
                    $btn =
                        "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-sm btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-sm btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
                </ul>";
                    return $btn;
                })
                
                ->addColumn('filenya', function ($data) {
                    $dataj = json_encode($data);
                    $btn =
                        "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <a type='button' target='_blank' href='".asset('file/materi') . '/' . $data->isi."'  class='btn btn-sm btn-info btn-xs mb-1'>Lihat File</a>
                </li>
                 
                </ul>";
                    return $btn;
                })
                
                ->rawColumns(['aksi','filenya'])
                ->make(true);
        }
        return view('admin.materi.file', compact( 'user','id'));
    }
    public function materivideo($id,$bel)
    {
        $user = pembelajaran::with('oMateri')->where('id', $bel)->first();
        if (request()->ajax()) {
            return Datatables::of(Video::with('oMateri')->where('id_materi',$id)->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);
                    $btn =
                        "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-sm btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-sm btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
                </ul>";
                    return $btn;
                })
                
                ->addColumn('linknya', function ($data) {
                    $dataj = json_encode($data);
                    $btn =
                        "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <a type='button' target='_blank' href='".url($data->link) ."'  class='btn btn-sm btn-info btn-xs mb-1'>Lihat File</a>
                </li>
                 
                </ul>";
                    return $btn;
                })
                
                ->rawColumns(['aksi','linknya'])
                ->make(true);
        }
        return view('admin.materi.video', compact( 'user','id'));    }
    public function materihapus($id)
    {
        $data = Materi::where('id', $id)->delete();
        if ($data) {
            return 'success';
        }
    }
    public function materiupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = Materi::where('id', $request->id)->first();
        if (request()->file('file')) {
            $gmbr = request()->file('file');
            if ($data->gambar) {
                $path = '/file/gambarmateri/' . $data->gambar;
                if (file_exists(public_path() . $path)) {
                    unlink(public_path() . $path);
                }
            }
            $nama_file = str_replace(' ', '_', time() . '_' . $gmbr->getClientOriginalName());
            $tujuan_upload = 'file/gambarmateri/';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->gambar = $nama_file;
        }
        $data->nama_materi = $request->judul;
        $data->deskripsi = $request->keterangan;

        $data->save();

        return 'success';
    }
    public function materi($id)
    {
        $user = pembelajaran::where('id', $id)->first();
        if (request()->ajax()) {
            return Datatables::of(Materi::where('id_pembelajaran',$id)->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);
                    $btn =
                        "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-sm btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-sm btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
                    <li class='list-inline-item dropdown'>
                    <button class='btn btn-sm btn-primary dropdown-toggle' type='button'  data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                      Materi
                    </button>
                    <div class='dropdown-menu'>
                      <a class='dropdown-item' target='_blank' href='". url('admin/data-materi/') .'/' . $data->id . '/' . $data->id_pembelajaran . '/text' ."'>Text</a>
                      <a class='dropdown-item' target='_blank' href='". url('admin/data-materi/') .'/' . $data->id . '/' . $data->id_pembelajaran . '/file' ."'>File</a>
                      <a class='dropdown-item' target='_blank' href='". url('admin/data-materi/') .'/' . $data->id . '/' . $data->id_pembelajaran . '/video' ."'>Video</a>
                    </div>
                 
                    </li>
                </ul>";
                    return $btn;
                })
                
                ->addColumn('gambarnya', function ($data) {
                    $dataj = json_encode($data);
                    if ($data->gambar) {
                        $btn =
                        "<ul class='list-inline mb-0'>
          
                    <li class='list-inline-item'>
                    <a type='button' target='_blank' href='" . asset('file/gambarmateri') . '/' . $data->gambar ."'   class='btn btn-sm btn-warning btn-xs mb-1'>Gambar</a>
                    </li>
              
                </ul>";
                    }else{
                        $btn = 'Tidak ada gambar';
                    }
               
                    return $btn;
                })
                
                ->rawColumns(['aksi','gambarnya'])
                ->make(true);
        }
        return view('admin.materi', compact( 'user'));
    }
    public function materistore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pembelajaran' => ['required', 'string', 'max:255'],
            'judul' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        if (request()->file('file')) {
            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . '_' . $gmbr->getClientOriginalName());
            $tujuan_upload = 'file/gambarmateri/';
            $gmbr->move($tujuan_upload, $nama_file);
        }
        $data = Materi::create([
            'nama_materi' => $request->judul,
            'id_pembelajaran' => $request->id_pembelajaran,
            'gambar' => $nama_file ?? null
        ]);

        if ($data) {
            return 'success';
        }
    }
    public function materitextstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pembelajaran' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
            'judul' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = Text::create([
            'nama_text' => $request->judul,
            'isi' => $request->isi,
            'id_materi' => $request->id_pembelajaran,
            'tgl_text' => Date("d - m - Y"),
        ]);

        if ($data) {
            return 'success';
        }
    }
    public function materitextupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255'],
            'judul' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = Text::where('id', $request->id)->first();

        $data->nama_text = $request->judul;
        $data->isi = $request->isi;

        $data->save();

        return 'success';
    }
    public function materitexthapus($id)
    {
        $data = Text::where('id', $id)->delete();
        if ($data) {
            return 'success';
        }
    }
    public function materifilestore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pembelajaran' => ['required', 'string', 'max:255'],
            'file' => 'max:2000',
            'judul' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        if (request()->file('file')) {
            $gmbr = request()->file('file');

            $nama_file = str_replace(' ', '_', time() . '_' . $gmbr->getClientOriginalName());
            $tujuan_upload = 'file/materi/';
            $gmbr->move($tujuan_upload, $nama_file);
        }
        $data = File::create([
            'nama_file' => $request->judul,
            'isi' => $nama_file ?? null,
            'id_materi' => $request->id_pembelajaran,
            'tgl_file' => Date("d - m - Y"),
        ]);

        if ($data) {
            return 'success';
        }
    }
    public function materifileupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255'],
            'judul' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = File::where('id', $request->id)->first();
        if (request()->file('file')) {
            $gmbr = request()->file('file');
            if ($data->isi) {
                $path = '/file/materi/' . $data->isi;
                if (file_exists(public_path() . $path)) {
                    unlink(public_path() . $path);
                }
            }
            $nama_file = str_replace(' ', '_', time() . '_' . $gmbr->getClientOriginalName());
            $tujuan_upload = 'file/materi/';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->isi = $nama_file;
        }
        $data->nama_file = $request->judul;

        $data->save();

        return 'success';
    }
    public function materifilehapus($id)
    {
        $data = File::where('id', $id)->first();
        if ($data->isi) {
            $path = '/file/materi/' . $data->isi;
            if (file_exists(public_path() . $path)) {
                unlink(public_path() . $path);
            }
        }
        $data->delete();
        if ($data) {
            return 'success';
        }
    }
    public function materivideostore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pembelajaran' => ['required', 'string', 'max:255'],
            'judul' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
     
        $data = Video::create([
            'judul' => $request->judul,
            'link' => $request->link,
            'id_materi' => $request->id_pembelajaran,
            'tgl_video' => Date("d - m - Y"),
        ]);

        if ($data) {
            return 'success';
        }
    }
    public function materivideoupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255'],
            'judul' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = Video::where('id', $request->id)->first();
     
        $data->judul = $request->judul;
        $data->link = $request->link;

        $data->save();

        return 'success';
    }
    public function materivideohapus($id)
    {
        $data = Video::where('id', $id)->first();
       
        $data->delete();
        if ($data) {
            return 'success';
        }
    }
}
