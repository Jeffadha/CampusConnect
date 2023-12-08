<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required', 'deskripsi' => 'required', 'gambar' => 'required|image'
        ]);

        $input = $request->all();
        if ($request->file('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'image_pengumuman';
            $imagename = $image->getClientOriginalName();
            $imagerandomname =  time() . rand(100, 999) . $imagename;
            $image->move($destinationPath, $imagerandomname);
            $input['gambar'] = $imagerandomname;
        }

        Pengumuman::create($input);

        return redirect('admin/pengumuman')->with('message', 'data berhasil di tambah');
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required', 'deskripsi' => 'required', 'gambar' => 'image'
        ]);

        $input = $request->all();

        if ($request->file('gambar')) {
            $image = $request->file('gambar');
            $destinationPath = 'image_pengumuman';

            $imagename = $image->getClientOriginalName();
            $imagerandomname =  time() . rand(100, 999) . $imagename;
            $image->move($destinationPath, $imagerandomname);
            $input['gambar'] = $imagerandomname;

            // delete old image
            $image_path = public_path('image_pengumuman/' . $pengumuman->gambar);
            File::delete($image_path);
        }

        $pengumuman->update($input);

        return redirect('admin/pengumuman')->with('message', 'data berhasil di edit');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        // delete image
        $image_path = public_path('image_pengumuman/' . $pengumuman->gambar);
        File::delete($image_path);

        $pengumuman->delete();

        return redirect('admin/pengumuman')->with('message', 'data berhasil di edit');
    }

    public function list_pengumuman(Pengumuman $pengumuman)
    {
        $pengumuman = Pengumuman::all();
        return view('public_view.pengumuman', compact('pengumuman'));
    }

    public function detail_pengumuman($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('public_view.detail_pengumuman', compact('pengumuman'));
    }
}