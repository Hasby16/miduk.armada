<?php

namespace App\Http\Controllers;

use App\Models\Kapal;
use App\Models\Pembayaran;
use App\Models\Sewa;
use Illuminate\Http\Request;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role_id != 3) {
            $sewa = Sewa::with(['user', 'kapal'])->latest()->paginate(5);
        } else {
            $sewa = Sewa::where('user_id', auth()->user()->id)
                ->with(['user', 'kapal'])->latest()->paginate(5);
        }

        return view('sewa.index', compact('sewa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kapal, $pages)
    {
        $kapal = Kapal::find($kapal);
        return view('sewa.create', compact(['kapal', 'pages']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        switch ($request->jenis_sewa) {
            case ('sekali_jalan'):
                $validateData = $request->validate([
                    'tanggal_sewa' => 'required|date',
                    'jam_sewa' => 'required|date_format:H:i',
                    'uang_muka' => 'required'
                ]);
                break;
            case ('jam'):
                $validateData = $request->validate([
                    'tanggal_sewa' => 'required|date',
                    'jam_sewa' => 'required|date_format:H:i',
                    'jam_selesai' => 'required|date_format:H:i',
                ]);
                break;
            case ('harian'):
                $validateData = $request->validate([
                    'tanggal_sewa' => 'required|date',
                    'tanggal_selesai' => 'required|date',
                ]);
                break;
            default:
                $validateData = $request->validate([]);
        }

        $validateData['jenis_sewa'] = $request->jenis_sewa;
        $validateData['user_id'] = auth()->user()->id;
        $validateData['kapal_id'] = $request->kapal_id;
        $validateData['status'] = "Pending";

        Sewa::create($validateData);

        session()->flash('flash.banner', 'Pengajuan sewa berhasil ditambahkan !');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('sewa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function show(Sewa $sewa)
    {
        $sewa = Sewa::where('id', $sewa->id)->with(['user', 'kapal'])->first();
        $pembayaran = Pembayaran::where('sewa_id', $sewa->id)->first();
        return view('sewa.detail', compact(['sewa', 'pembayaran']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function edit(Sewa $sewa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sewa $sewa)
    {
        if ($sewa->status == 'Pending') {
            $sewa->update([
                'status' => 'Menunggu pembayaran',
            ]);
        } else if ($sewa->status == 'Menunguu pembayaran') {
            $sewa->update([
                'status' => 'Telah dibayar',
            ]);
        } else if ($sewa->status == 'Telah dibayar') {
            $sewa->update([
                'status' => 'Diterima',
            ]);
        } else {
            $sewa->update([
                'status' => 'Pending',
            ]);
        }

        session()->flash('flash.banner', 'Pengajuan sewa berhasil diperbarui !');
        session()->flash('flash.bannerStyle', 'warning');

        return redirect()->route('sewa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sewa $sewa)
    {
        //
    }


    public function tolakPengajuan(Sewa $sewa)
    {
        $sewa->update([
            'status' => 'Ditolak',
        ]);

        session()->flash('flash.banner', 'Pengajuan sewa berhasil diperbarui !');
        session()->flash('flash.bannerStyle', 'warning');

        return redirect()->route('sewa.index');
    }
}
