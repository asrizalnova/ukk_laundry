<?php

namespace App\Http\Controllers;
use App\Models\Paket;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PaketController extends Controller
{

    public function getpaket(){
        $data = Paket::all();
         return view('paket', compact('data'));
     }

     //tampilan edit
     public function edit($id){
        $paket = DB::table('paket')->where('id_paket', $id)->first();
        return view('edit-paket',['paket' => $paket]);

    }
    //tampilan tambah data
    public function tambah(){
        return view('tambah-paket');
    }

  //simpan data
    public function simpan(Request $request){
    $validator = $request->validate([
        'jenis' => 'required|string',
        'harga'=>'required|string',
        ],
        [

            'jenis.required' => 'Jenis paket tidak boleh kosong!',

            'harga.required' => 'Harga paket tidak boleh kosong!',
            
        ]
    );
    $paket = Paket::create([
    'jenis'=>$request->get('jenis'),
    'harga'=>$request->get('harga'),
    ]);
    
    return redirect()->route('tambah-paket')->with('message-simpan','Data berhasil disimpan!');
}


    //hapus data
    public function hapus($id){
        $data = Paket::where('id_paket',$id)->delete();

        return redirect()->back()->with('message-hapus','Data berhasil dihapus!');
        // return redirect('/outlet');
    }
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'jenis' => 'required',
            'harga' => 'required|integer'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
        }

        $paket = new Paket();
        $paket -> jenis = $request->jenis;
        $paket -> harga = $request->harga;
        $paket -> save();

        $data = Paket::where('id_paket', '=', $paket->id_paket)->first();
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data Paket Berhasil Ditambahkan',
        //     'data' => $data
        // ]);
        return redirect('/paket');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'jenis' => 'required|string',
            'harga' => 'required|string'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]); 
        }

        $member = Paket::where('id_paket', $id)->first();
        $member -> jenis = $request-> jenis;
        $member -> harga = $request-> harga;
        $member -> save();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data Berhasil Diubah'
        // ]);
        return redirect('/paket');
    }

    public function delete($id)
    {
        $delete = Paket::where('id_paket', $id)->delete();

        if($delete){
            return response()->json([
                'success' => true,
                'message' => 'Data Paket Berhasil Dihapus'
            ]); 
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Paket Gagal Dihapus'
            ]); 
        }
    }

    public function getAll()
    {
        $data["count"] = Paket::count();
        $data["paket"] = Paket::get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function getById($id)
    {
        $data["paket"] = Paket::where('id_paket',$id)->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
