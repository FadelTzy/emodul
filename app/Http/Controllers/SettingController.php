<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function pengaturan()
    {
        $data= setting::first();
        if ($data) {
            $d = $data;
        }else{
           $d = setting::create([
                'nama' => 'LMS FIK',
                'deskripsi' => '-'
            ]);
        }
        return view('admin.pengaturan',compact('d'));
    }
    public function pengaturanupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data = setting::where('id', $request->id)->first();
        if (request()->file('file')) {
            $gmbr = request()->file('file');
            if ($data->panduan) {
                return $request->all();

                $path = '/file/panduan/' . $data->panduan;
                if (file_exists(public_path() . $path)) {
                    unlink(public_path() . $path);
                }
            }
            $nama_file = str_replace(' ', '_', time() . '_' . $gmbr->getClientOriginalName());
            $tujuan_upload = 'file/panduan/';
            $gmbr->move($tujuan_upload, $nama_file);
            $data->panduan = $nama_file;
        }
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->waktu = $request->waktu;
        $data->soal = $request->soal;

        if (request()->file('logo')) {
            $gmbr = request()->file('logo');
            if ($data->logo) {
                $path = '/file/logo/' . $data->logo;
                if (file_exists(public_path() . $path)) {
                    unlink(public_path() . $path);
                }
            }
            $nama_file = str_replace(' ', '_', time() . '_' . $gmbr->getClientOriginalName());
            $tujuan_upload = 'file/logo/';
            $gmbr->move($tujuan_upload, $nama_file);
            $data->logo = $nama_file;
        }

        $data->save();
        return 'success';
    }
}
