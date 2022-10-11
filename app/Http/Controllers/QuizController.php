<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\pembelajaran;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Text;
use App\Models\Quiz;
class QuizController extends Controller
{
    public function quiztext()
    {
        if (request()->ajax()) {
            return Datatables::of(Quiz::get())
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

                ->addColumn('soalnya', function ($data) {
                    $btn = $data->soal;
                        
                    return $btn;
                })

                ->rawColumns(['aksi','soalnya'])
                ->make(true);
        }
        return view('admin.materi.quiz');
    }

    public function quiztextstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pila' => ['required', 'string', 'max:255'],
            'pilb' => ['required', 'string', 'max:255'],
            'pilc' => ['required', 'string', 'max:255'],
            'pild' => ['required', 'string', 'max:255'],
            'jawabanbenar' => ['required', 'string', 'max:255'],
         
            'soal' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = Quiz::create([
            'soal' => $request->soal,
            'pilihan_a' => $request->pila,
            'pilihan_b' => $request->pilb,
            'pilihan_c' => $request->pilc,
            'pilihan_d' => $request->pild,
            'jawaban' => $request->jawabanbenar,
            'penjelasan' => $request->penjelasan,
            'nilaibenar' => $request->nilaibenar,
            'nilaisalah' => $request->nilaisalah,
        ]);

        if ($data) {
            return 'success';
        }
    }
    public function quiztextupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pila' => ['required', 'string', 'max:255'],
            'pilb' => ['required', 'string', 'max:255'],
            'pilc' => ['required', 'string', 'max:255'],
            'pild' => ['required', 'string', 'max:255'],
            'jawabanbenar' => ['required', 'string', 'max:255'],
         
            'soal' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = Quiz::where('id', $request->id)->first();

        $data->soal = $request->soal;
        $data->pilihan_a = $request->pila;
        $data->pilihan_b = $request->pilb;
        $data->pilihan_c = $request->pilc;
        $data->pilihan_d = $request->pild;
        $data->jawaban = $request->jawabanbenar;
        $data->penjelasan = $request->penjelasan;
        $data->nilaibenar = $request->nilaibenar;
        $data->nilaisalah = $request->nilaisalah;

        $data->save();

        return 'success';
    }
    public function quiztexthapus($id)
    {
        $data = Quiz::where('id', $id)->delete();
        if ($data) {
            return 'success';
        }
    }
}
