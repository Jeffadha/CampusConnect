<?php

namespace App\Http\Controllers;

use App\Models\JawabanTugas;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TugasController extends Controller
{
    public function index()
    {
        $id_user = auth()->user()->id;
        $user = User::with('tugas')->find($id_user);
        $tugas = $user->tugas;

        return view('dosen.tugas.index', compact('tugas'));
    }
    public function create()
    {
        return view('dosen.tugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required', 'deskripsi' => 'required',  'user_id' => 'required',
        ]);

        $input = $request->all();
        Tugas::create($input);

        return redirect('/dosen/tugas')->with('message', 'data berhasil di tambah');
    }
    public function edit($id)
    {
        $tugas = Tugas::find($id);
        return view('dosen.tugas.edit', compact('tugas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required', 'deskripsi' => 'required'
        ]);

        $tugas = Tugas::find($id);

        $tugas->update($request->all());

        return redirect('/dosen/tugas')->with('message', 'data berhasil di edit');
    }

    public function destroy($id)
    {
        $tugas = Tugas::find($id);
        $tugas->delete();

        return redirect('dosen/tugas')->with('message', 'data berhasil di hapus');
    }

    public function tugas_mahasiswa()
    {
        $dosen = User::latest()->get();
        return view('mahasiswa.tugas.list', compact('dosen'));
    }

    public function detail_tugas($id)
    {
        $tugas = Tugas::find($id);

        $user_id = auth()->user()->id;
        $tugas_id = $id;
        $jawaban = JawabanTugas::where('user_id', $user_id)->where('tugas_id', $tugas_id)->get();

        return view('mahasiswa.tugas.detail', compact('tugas', 'jawaban'));
    }

    public function simpan_jawaban(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required_without:file', 'file' => 'required_without:deskripsi', 'user_id' => 'required', 'tugas_id' => 'required'
        ]);

        $input = $request->all();
        if ($request->file('file')) {
            $dokumen = $request->file('file');
            $destinationPath = 'dokumen_jawaban';
            $dokumenName = $dokumen->getClientOriginalName();
            $dokumenrandomname =  time() . rand(100, 999) . $dokumenName;
            $dokumen->move($destinationPath, $dokumenrandomname);
            $input['file'] = $dokumenrandomname;
        }
        JawabanTugas::create($input);

        return redirect(route('tugas.detail', $request->tugas_id))->with('message', 'data berhasil di tambah');
    }

    public function delete_jawaban($id)
    {
        $jawaban = JawabanTugas::find($id);

        $file_path = public_path('dokumen_jawaban/' . $jawaban->file);
        if (File::exists($file_path)) {
            File::delete($file_path);
        }
        $jawaban->delete();

        return redirect(route('tugas.detail', $jawaban->tugas_id))->with('message', 'data dihapus');
    }

    public function edit_jawaban($id)
    {
        $jawaban = JawabanTugas::find($id);
        $tugas = Tugas::find($jawaban->tugas_id);

        return view('mahasiswa.tugas.edit', compact('tugas', 'jawaban'));
    }

    public function update_jawaban(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required_without:file', 'file' => 'required_without:deskripsi'
        ]);

        $jawaban = JawabanTugas::find($id);

        $input = $request->all();

        if ($request->file('file')) {
            $dokumen = $request->file('file');
            $destinationPath = 'dokumen_jawaban';
            $dokumenName = $dokumen->getClientOriginalName();
            $dokumenrandomname =  time() . rand(100, 999) . $dokumenName;
            $dokumen->move($destinationPath, $dokumenrandomname);
            $input['file'] = $dokumenrandomname;

            $file_path = public_path('dokumen_jawaban/' . $jawaban->file);
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
        }

        $jawaban->update($input);

        return redirect(route('tugas.detail', $jawaban->tugas_id))->with('message', 'data berhasil di edit');
    }

    public function list_jawaban($id)
    {
        $tugas = JawabanTugas::leftJoin('users', 'jawaban_tugas.user_id', '=', 'users.id')
            ->where('tugas_id', $id)
            ->select('jawaban_tugas.*', 'users.name as name')
            ->get();
        return view('dosen.tugas.jawaban', compact('tugas'));
    }

    public function nilai(Request $request)
    {
        foreach ($request->nilai as $nilai => $key) {
            if ($key != null) {
                $jawaban = JawabanTugas::find($nilai);
                $jawaban->nilai = $key;
                $jawaban->update();
            }
        }

        return redirect()->back()->with('message', 'nilai berhasil disimpan');
    }
}