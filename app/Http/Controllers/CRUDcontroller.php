<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pembayarans;
use App\Models\pelanggans;
use App\Models\biayas;
use App\Models\pemakaians;

class CRUDcontroller extends Controller{

    public function showPelanggan(){
        $data = pembayarans::join('biayas','pembayarans.biaya_id','=','biayas.id')
                            ->join('pelanggans','pembayarans.pelanggan_id','=','pelanggans.id')
                            ->join('pemakaians','pemakaians.id','=','biayas.pemakaian_id')
                            ->get(['pelanggans.nama','pelanggans.id','pemakaians.total','pembayarans.total_biaya','pembayarans.tanggal_pembayaran']);
        return view('welcome',compact('data'));
    }
    public function showAdmin(){
        $data = pembayarans::join('biayas','pembayarans.biaya_id','=','biayas.id')
                            ->join('pelanggans','pembayarans.pelanggan_id','=','pelanggans.id')
                            ->join('pemakaians','pemakaians.id','=','biayas.pemakaian_id')
                            ->get(['pembayarans.id','pelanggans.nama','pembayarans.pelanggan_id','pemakaians.total','pembayarans.total_biaya','pembayarans.tanggal_pembayaran']);
        return view('admin',compact('data'));
    }

    public function addView(Request $request){
        $awal = $request->input('meteran_awal');
        $akhir = $request->input('meteran_akhir');
        $total = $akhir-$awal;

        $pelanggan = new pelanggans();
        $pelanggan->id = $request->input('id_pelanggan');
        $pelanggan->nama = $request->input('nama');
        $pelanggan->blok = $request->input('blok');
        $pelanggan->save();

        $biaya = new biayas();
        $biaya->id = $request->input('id_pembayaran');
        $biaya->pemakaian_id = $request->input('id_pembayaran');
        $biaya->nominal = $request->input('total_bayar');
        $biaya->admin = 2000;
        $biaya->save();

        $pemakaian = new pemakaians();
        $pemakaian->id = $request->input('id_pembayaran');
        $pemakaian->meteran_awal = $awal;
        $pemakaian->meteran_akhir = $akhir;
        $pemakaian->total = $total;
        $pemakaian->tanggal = $request->input('tanggal');
        $pemakaian->save();

        $pembayaran = new pembayarans();
        $pembayaran->id= $request->input('id_pembayaran');
        $pembayaran->pelanggan_id = $request->input('id_pelanggan');
        $pembayaran->biaya_id = $request->input('id_pembayaran');
        $pembayaran->total_pemakaian = $total;
        $pembayaran->total_biaya = $request->input('total_bayar')+2000;
        $pembayaran->tanggal_pembayaran = $request->input('tanggal');
        $pembayaran->save();

        return redirect('admin');
    }

    public function editView($id){
        $data = pembayarans::join('biayas','pembayarans.biaya_id','=','biayas.id')
                            ->join('pelanggans','pembayarans.pelanggan_id','=','pelanggans.id')
                            ->join('pemakaians','pemakaians.id','=','biayas.pemakaian_id')
                            ->get(['pembayarans.id','pelanggans.nama','pembayarans.pelanggan_id','pembayarans.total_biaya','pembayarans.tanggal_pembayaran','pemakaians.meteran_awal','pemakaians.meteran_akhir','pelanggans.blok'])
                            ->where('id','=',$id)->first();
        return view('editData',compact('data'));
    }

    public function editPush(Request $request,$id){
        $p_id = DB::table('pembayarans')->where('id','=', $id)->first();
        $awal = $request->meteran_awal;
        $akhir = $request->meteran_akhir;
        $total = $akhir-$awal;
        DB::table('pelanggans')->where('id','=',$p_id->pelanggan_id)->update([
            'id' => $request->id_pelanggan,
            'nama' => $request->nama,
            'blok' => $request->blok,
        ]);
        DB::table('pemakaians')->where('id','=',$id)->update([
            'id' => $request->id_pembayaran,
            'meteran_awal' => $awal,
            'meteran_akhir' => $akhir,
            'total' => $total,
            'tanggal' => $request->tanggal,
        ]);
        DB::table('biayas')->where('id','=',$id)->update([
            'id' => $request->id_pembayaran,
            'pemakaian_id' => $request->id_pembayaran,
            'nominal' => $request->total_bayar,
            'admin' => 2000,
        ]);
        DB::table('pembayarans')->where('id','=',$id)->update([
            'id' => $request->id_pembayaran,
            'pelanggan_id' => $request->id_pelanggan,
            'biaya_id' => $request->id_pembayaran,
            'total_pemakaian' => $total,
            'total_biaya' => $request->total_bayar+2000,
            'tanggal_pembayaran' => $request->tanggal,
        ]);
        return redirect('admin');
    }
    public function deleteView($id){
        $p_id = DB::table('pembayarans')->where('id','=', $id)->first();
        DB::table('pembayarans')->where('id', '=', $id)->delete();
        DB::table('biayas')->where('id', '=', $id)->delete();
        DB::table('pemakaians')->where('id', '=', $id)->delete();
        DB::table('pelanggans')->where('id', '=', $p_id->pelanggan_id)->delete();
        return redirect('admin');
    }

}
