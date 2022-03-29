<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use DB;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function getmember(){
        $data = Member::all();
        return view('member', compact('data'));
    }

     //tampilan tambah data
    public function tambah(){
        return view('tambah-member') ;
    }
     //tampilan edit
     public function edit($id){
        $member = DB::table('member')->where('id_member', $id)->first();
        return view('edit-member',['member' => $member]);

    }


    //simpan data
    public function simpan(Request $request){
        $validator = $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'jenis_kelamin'=>'required',
            'telp'=>'required|string|max:15',
            ],
            [
                'nama.required' => 'Nama member tidak boleh kosong!',
                'nama.max' => 'Nama melebihi batas!',
    
                'alamat.required' => 'Alamat member tidak boleh kosong!',

                'jenis_kelamin.required' => 'Jenis kelamin member tidak boleh kosong!',
    
                'tlp.required' => 'Nomor telepon member tidak boleh kosong!',
                'tlp.max' => 'Panjang nomor telepon melebihi batas!',
            ]
        );
        $member = Member::create([
        'nama'=>$request->get('nama'),
        'alamat'=>$request->get('alamat'),
        'jenis_kelamin'=>$request->get('jenis_kelamin'),
        'tlp'=>$request->get('tlp'),
        ]);
        return redirect()->route('tambah-member')->with('message-simpan','Data berhasil disimpan!');;
    }
     //hapus data
     public function hapus($id){
        $data = Member::where('id_member',$id)->delete();

        return redirect()->back()->with('message-hapus','Data berhasil dihapus!');
    }
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tlp' => 'required|numeric'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
        }

        $member = new Member();
        $member -> nama = $request->nama;
        $member -> alamat = $request->alamat;
        $member -> jenis_kelamin = $request->jenis_kelamin;
        $member -> tlp = $request->tlp;
        $member -> save();

        $data = Member::where('id_member', '=', $member->id_member)->first();
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data Member Berhasil Ditambahkan',
        //     'data' => $data
        // ]);
        return redirect('/member');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tlp' => 'required|string'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]); 
        }

        $member = Member::where('id_member', $id)->first();
        $member -> nama = $request-> nama;
        $member -> alamat = $request-> alamat;
        $member -> jenis_kelamin = $request-> jenis_kelamin;
        $member -> tlp = $request-> tlp;
        $member -> save();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data Berhasil Diubah'
        // ]);
        return redirect('/member');
    }

    public function delete($id)
    {
        $delete = Member::where('id_member', $id)->delete();

        if($delete){
            return response()->json([
                'success' => true,
                'message' => 'Data Member Berhasil Dihapus'
            ]); 
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Member Gagal Dihapus'
            ]); 
        }
    }

    public function getAll()
    {
        $data["count"] = Member::count();
        $data["member"] = Member::get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function getById($id)
    {
        $data["member"] = Member::where('id_member',$id)->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
