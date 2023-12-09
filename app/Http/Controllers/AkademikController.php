<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use Illuminate\Http\Request;

class AkademikController extends Controller
{
    public function index()
    {
        $akademik = Akademik::all();
        return view('admin.akademik.index', compact('akademik'));
    }

    public function create()
    {
        return view('admin.akademik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 'start' => 'required', 'end'  => 'required'
        ]);

        $input = $request->all();

        Akademik::create($input);

        return redirect('/admin/akademik')->with('message', 'data berhasil di tambah');
    }

    public function edit(Akademik $akademik)
    {
        return view('admin.akademik.edit', compact('akademik'));
    }

    public function update(Request $request, Akademik $akademik)
    {
        $request->validate([
            'title' => 'required', 'start' => 'required', 'end'  => 'required'
        ]);

        $input = $request->all();

        $akademik->update($input);

        return redirect('admin/akademik')->with('message', 'data berhasil di edit');
    }

    public function destroy(Akademik $akademik)
    {
        $akademik->delete();

        return redirect('admin/akademik')->with('message', 'data berhasil di edit');
    }

    public function list_akademik(Akademik $akademik)
    {
        $akademik = Akademik::all();
        return view('public_view.akademik', compact('akademik'));
    }
}