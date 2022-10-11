<?php

namespace App\Http\Controllers;

use App\Models\historyQuiz;
use App\Models\pembelajaran;
use App\Models\Quiz;
use App\Models\RiwayatQuiz;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Socket;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function profil()
    {
        return view('admin.profil');
    }
    public function storeprofil(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users,email,' . $request->id],
        ]);

        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return redirect()
                ->back()
                ->with($data);
        }
        $user = User::findorfail($request->id);
        if ($user) {
            $user->name = $request->nama;
            $user->no = $request->no;
            $user->username = $request->username;

            $user->email = $request->email;
            if ($request->pass != '' || $request->pass != null) {
                $user->password = Hash::make($request->pass);
            }
            $user->save();
            return redirect()
                ->back()
                ->with('message', 'success');
        }
    }
    public function deleteuser($id)
    {
        $data = User::where('id', $id)->delete();
        if ($data) {
            return 'success';
        }
    }
    public function index()
    {
        $user = User::where('role', 3)->count();
        $mahasiswa = User::where('role', 2)->count();
        $pembelajaran = pembelajaran::count();
        $soal = Quiz::count();

        return view('admin.dashboard', compact('user', 'mahasiswa', 'pembelajaran','soal'));
    }
    public function mahasiswastore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'nomor' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = User::create([
            'name' => $request->nama,
            'role' => 3,
            'alamat' => $request->alamat,
            'no' => $request->nomor,
            'kode' => $request->nim,
            'status' => 1,
            'email' => $request->email,
            'password' => Hash::make('password'),
        ]);

        if ($data) {
            return 'success';
        }
    }
    public function dosenstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'kelas' => ['required', 'string', 'max:255'],
            'nomor' => ['required', 'string', 'max:255'],
            'nis' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = User::create([
            'name' => $request->nama,
            'username' => $request->nis,

            'role' => 3,
            'kelas' => $request->kelas,
            'no' => $request->nomor,
            'kode' => $request->nis,
            'status' => 1,
            'password' => Hash::make('12345'),
        ]);

        if ($data) {
            return 'success';
        }
    }
    public function gurustore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'nomor' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = User::create([
            'name' => $request->nama,
            'role' => 3,
            'alamat' => $request->alamat,
            'no' => $request->nomor,
            'status' => 1,
            'email' => $request->email,
            'username' => $request->username,

            'password' => Hash::make('password'),
        ]);

        if ($data) {
            return 'success';
        }
    }
    public function adminstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'nomor' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = User::create([
            'name' => $request->nama,
            'role' => 1,
            'alamat' => $request->alamat,
            'no' => $request->nomor,
            'status' => 1,
            'email' => $request->email,
            'username' => $request->username,

            'password' => Hash::make('password'),
        ]);

        if ($data) {
            return 'success';
        }
    }
    public function mahasiswaupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'nomor' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = User::where('id', $request->id)->first();
        if ($request->password) {
            $data->password = Hash::make($request->password);
        }
        $data->name = $request->nama;
        $data->alamat = $request->alamat;
        $data->no = $request->nomor;
        $data->kode = $request->nim;
        $data->email = $request->email;

        $data->save();

        return 'success';
    }
    public function mahasiswa()
    {
        if (request()->ajax()) {
            return Datatables::of(User::where('role', 3)->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);
                    $btn =
                        "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
                     
                </ul>";
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('admin.mahasiswa');
    }
    public function dosen()
    {
        if (request()->ajax()) {
            return Datatables::of(User::where('role', 2)->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);
                    $btn =
                        "<ul class='list-inline mb-0'>
                        <li class='list-inline-item'>
                        <button type='button' data-toggle='modal' onclick='liharriwayat(" .
                        $data->id .
                        ")'   class='btn btn-success btn-xs mb-1'>Riwayat Quiz</button>
                        </li>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
                     
                </ul>";
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('admin.dosen');
    }
    public function riwayat($id)
    {
        if (request()->ajax()) {
            return Datatables::of(historyQuiz::with('user')->where('id_user', $id)->get())
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
                ->addColumn('nama', function ($data) {
                    $btn = $data->user->name;
                    return $btn;
                })
                ->addColumn('bs', function ($data) {
                    $btn = $data->benar . ' / ' . $data->salah;
                    return $btn;
                })
                ->rawColumns(['aksi','bs','nama'])
                ->make(true);
        }
    }
    public function guru()
    {
        if (request()->ajax()) {
            return Datatables::of(User::where('role', 3)->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);
                    $btn =
                        "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
                     
                </ul>";
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('admin.guru');
    }
    public function admin()
    {
        if (request()->ajax()) {
            return Datatables::of(User::where('role', 1)->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);
                    $btn =
                        "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
                     
                </ul>";
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('admin.admin');
    }
}
