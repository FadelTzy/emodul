<?php

namespace App\Http\Controllers;

use App\Models\historyQuiz;
use App\Models\Materi;
use App\Models\pembelajaran;
use App\Models\Quiz;
use App\Models\RiwayatLogin;
use App\Models\setting;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    public function profiluser()
    {
     
        $user = ModelsUser::where('id', Auth::user()->id)->first();
        return view('user.profil', compact('user'));
    }
    public function getsearch(Request $request)
    {
        $get = Materi::where('id_pembelajaran', $request->pembelajaran)
            ->where('nama_materi', 'LIKE', "%{$request->search}%")
            ->get();
        return $get;
    }
    public function rr()
    {
        $id = Auth::user()->id;
        $his = historyQuiz::where('id_user', $id)
            ->latest()
            ->get();

        return view('user.riwayat', compact('his'));
    }
    public function profilstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = ModelsUser::where('id', $request->id)->first();

        $data->name = $request->nama;
        $data->username = $request->nis;
        $data->kelas = $request->kelas;
        $data->no = $request->no;

        if ($request->password) {
            $data->password = Hash::make($request->password);
        }

        $data->save();
        if ($data) {
            return 'success';
        }
    }
    public function index()
    {
        $pl = pembelajaran::get();
        $jml = materi::count();
        $hq = historyQuiz::where('id_user', Auth::user()->id)
            ->latest()
            ->first();
        return view('user.index', compact('pl', 'jml', 'hq'));
    }
    public function tentang()
    {
        $set = setting::first();

        return view('user.tentang', compact('set'));
    }
    public function mulai()
    {
        $set = setting::first();

        return view('user.mulai', compact('set'));
    }
    public function quiz()
    {
        $set = setting::first();
        $quiz = Quiz::inRandomOrder()
            ->limit($set->soal)
            ->get();

        return view('user.quiz', compact('quiz', 'set'));
    }
    public function postq(Request $request)
    {
        // return $request->all();
        $benar = 0;
        $salah = 0;
        for ($i = 1; $i <= $request->jumlah; $i++) {
            $q = Quiz::where('id', request()->input('soal' . $i))->first();
            // return request()->input('pilihan' . $i);
            if (strtolower($q->jawaban) == request()->input('pilihan' . $i) ?? null) {
                $benar = $benar + 1;
            } else {
                $salah = $salah + 1;
            }
        }
        $nilai = ($benar / $request->jumlah) * 100;
        $rq = historyQuiz::create([
            'id_user' => Auth::user()->id,
            'benar' => $benar,
            'salah' => $salah,
            'nilai' => round($nilai),
            'soal' => $request->jumlah,
        ]);
        RiwayatLogin::create([
            'id_user' => Auth::user()->id,
            'tipe' => 2,
            'nama' => Auth::user()->name,
            'id_kuis' => $rq->id,
        ]);
        return ['status' => 'success', 'data' => $rq];
    }
    public function report($id)
    {
        $report = historyQuiz::where('id', $id)->first();
        return view('user.quizreport', compact('report'));
    }
    public function materi($id)
    {
        $pembel = pembelajaran::where('id', $id)->first();
        $materi = Materi::where('id_pembelajaran', $id)->get();
        return view('user.specmateri', compact('materi', 'pembel'));
    }
    public function detail($id, $materi)
    {
        $materi = Materi::with('oText', 'oFile', 'oVideo', 'oMateri')
            ->where('id', $materi)
            ->first();
        return view('user.detail', compact('materi'));
    }
    public function splash()
    {
        return view('user.splash');
    }
    public function login()
    {
        return view('user.login');
    }
}
