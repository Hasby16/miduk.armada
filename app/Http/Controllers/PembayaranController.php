<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Sewa;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::with('sewa')->paginate(5);

        return view('pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sewa $sewa)
    {
        $sewa = Sewa::where('id', $sewa->id)->with(['user', 'kapal'])->first();
        return view('pembayaran.create', compact('sewa'));
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
            'image_url' => 'required|image|file|max:10240',
        ]);

        if ($request->file('image_url')) {
            $validateData['image_url'] = $request->file('image_url')->store('bukti-pembayaran');
        }

        $validateData['sewa_id'] = $request->sewa_id;
        $validateData['note'] = $request->note;

        $sewa = Sewa::where('id', $request->sewa_id)->first();
        $sewa->update(['status' => 'Telah dibayar']);

        Pembayaran::create($validateData);

        session()->flash('flash.banner', 'Pengajuan sewa berhasil diperbarui !');
        session()->flash('flash.bannerStyle', 'warning');

        return redirect()->route('sewa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
