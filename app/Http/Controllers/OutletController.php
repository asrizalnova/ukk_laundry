<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use DB;
use Illuminate\Support\Facades\Validator;

class OutletController extends Controller
{

    //getoutlet
    public function getoutlet(){
       $data = Outlet::all();
        return view('outlet', compact('data'));
    }
    //edit outlet
    public function edit($id){
        $outlet = DB::table('outlet')->where('id_outlet',$id)->first();
        return view('edit-outlet',['outlet' => $outlet]);
    }
    //tampilan tambah data
    public function tambah(){
        return view('tambah-outlet') ;
    }
     //simpan data
     public function simpan(Request $request){
        $validator = $request->validate([
        'nama_outlet' => 'required|string|max:100',
        ],
        [
            'nama_outlet.required' => 'Nama outlet tidak boleh kosong!',
            'nama_outlet.max' => 'Nama melebihi batas!',
        ]
    );
        $outlet = Outlet::create([
        'nama_outlet'=>$request->get('nama_outlet'),
        ]);
        return redirect()->route('tambah-outlet')->with('message-simpan','Data berhasil disimpan!');
    }

    //hapus data
    public function hapus($id){
        $data = Outlet::where('id_outlet',$id)->delete();

        return redirect()->back()->with('message-hapus','Data berhasil dihapus!');
        // return redirect('/outlet');
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_outlet' => 'required|string'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
        }


        $outlet = new Outlet();
		$outlet->nama_outlet = $request->nama_outlet;
		$outlet->save();

        $data = Outlet::where('id_outlet','=', $outlet->id_outlet)->first();
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data outlet berhasil ditambahkan!.',
        //     'data' => $data

        // ]);
        return redirect('/outlet');


    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_outlet' => 'required|string'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
        }

        $outlet = Outlet::where('id_outlet', $id)->first();
        $outlet->nama_outlet = $request->nama_outlet;
        $outlet->save();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data Berhasil Diubah'
        // ]);

        return redirect('/outlet');
    }

    public function delete($id)
    {
        $delete = Outlet::where('id_outlet', $id)->delete();

        if($delete){
            return response()->json([
                'success' => true,
                'message' => 'Data outlet berhasil dihapus!.'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data outlet gagal dihapus!.'
            ]);
        }
    }

    public function getAll()
    {
        $data["count"] = Outlet::count();
        $data["outlet"] = Outlet::get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function getById($id)
    {   
        $data["outlet"] = Outlet::where('id_outlet', $id)->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
