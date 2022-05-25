<?php

namespace App\Http\Controllers;

use App\Models\Kapal;
use Illuminate\Http\Request;

class KapalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kapal = Kapal::all();
        return view('kapal.index', compact('kapal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kapal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required|unique:kapals|string|max:255',
            'jenis' => 'required|string|max:255',
            'kapasitas' => 'required',
            'panjang' => 'required',
            'sewa_sekali_jalan' => 'nullable|numeric|min:1000',
            'sewa_hari' => 'nullable|numeric|min:1000',
            'sewa_jam' => 'nullable|numeric|min:1000',
            'description' => 'required',
            'image_url' => 'required|image|file|max:10240',
        ]);

        if ($request->file('image_url')) {
            $validateData['image_url'] = $request->file('image_url')->store('kapal-image');
        }

        Kapal::create($validateData);

        session()->flash('flash.banner', 'Data kapal berhasil ditambahkan !');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('kapal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kapal  $kapal
     * @return \Illuminate\Http\Response
     */
    public function show(Kapal $kapal)
    {
        return view('kapal.detail', compact('kapal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kapal  $kapal
     * @return \Illuminate\Http\Response
     */
    public function edit(Kapal $kapal)
    {
        return view('kapal.edit', compact('kapal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kapal  $kapal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kapal $kapal)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:kapals' . ',id,' . $kapal->id,
            'jenis' => 'required|string|max:255',
            'kapasitas' => 'required',
            'panjang' => 'required',
            'sewa_sekali_jalan' => 'nullable|numeric|min:1000',
            'sewa_hari' => 'nullable|numeric|min:1000',
            'sewa_jam' => 'nullable|numeric|min:1000',
            'description' => 'required',
            'image_url' => 'image|file|max:10240',
        ]);

        if ($request->file('image_url')) {
            $validateData['image_url'] = $request->file('image_url')->store('kapal-image');
        } else {
            $validateData['image_url'] = $kapal->image_url;
        }

        $kapal->update($validateData);

        session()->flash('flash.banner', 'Data kapal berhasil diperbarui !');
        session()->flash('flash.bannerStyle', 'warning');

        return redirect()->route('kapal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kapal  $kapal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kapal $kapal)
    {
        //
    }

    public function listKapal()
    {
        $kapal = Kapal::all();
        return view('kapal.list-kapal', compact('kapal'));
    }
}
