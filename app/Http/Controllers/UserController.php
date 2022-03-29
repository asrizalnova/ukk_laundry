<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use DB;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function getuser(){
        // $detail = Outlet::get();
        // return view('');
        $data = User::all();
        return view('user', compact('data'));
    }

      //tampilan tambah data
    public function tambah(){
        $user = DB::table('users')->get();
        return view('tambah-user', compact('user')) ;
    }

     //tampilan edit
     public function edit($id){
        $user = User::find($id);
        $outlet = Outlet::all();
        return view('edit-user', compact('user', 'outlet')) ;
        


    }
    //simpan data user
    public function simpan(Request $request){
        $validator = $request->validate([
            'nama' => 'required|string|max:100',
            'role' => 'required',
            'username'=>'required',
            ],
            [
                'nama.required' => 'Nama user tidak boleh kosong!',
                'nama.max' => 'Nama user melebihi batas!',
    
                'role.required' => 'Role harus diisi!',
    
                'username.required' => 'username tidak boleh kosong!',

              
            ]
        );

        $user = User::create([
            'nama'=>$request->get('nama'),
            'role'=>$request->get('role'),
            'username'=>$request->get('username'),
          
            ]);
            return redirect()->route('tambah-user')->with('message-simpan','Data berhasil disimpan!');

    }

     //hapus data user
     public function hapus($id){
        $user = User::where('id',$id)->delete();
        return redirect()->back()->with('message-hapus','Data berhasil dihapus!');
    }

    

    public function register(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'id_outlet' => 'required|string|max:20',
			'nama' => 'required|string|max:255',
			'username' => 'required|string|max:50|unique:Users',
			'password' => 'required|string|min:6',
		]);

		if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
		}

		$user = new User();
		$user->id_outlet 	= $request->id_outlet;
		$user->nama 	= $request->nama;
		$user->username = $request->username;
		$user->role 	= 'owner';
		$user->password = Hash::make($request->password);
		$user->save();


        $data = User::where('username','=', $request->username)->first();
        return response()->json([
            'success' => true,
            'message' => 'berhasil menambahkan user baru',
            'data' => $data
           ]);
        
    }

    // public function register(Request $request)
	// {
	// 	$validator = Validator::make($request->all(), [
	// 		'id_outlet' => 'required|string|max:20',
	// 		'nama' => 'required|string|max:255',
	// 		'username' => 'required|string|max:50|unique:Users',
	// 		'password' => 'required|string|min:6',
    //         'role' => 'required|string',

	// 	]);

	// 	if($validator->fails()){
    //         return response()->json([
    //             'success' => false,
    //             'message' => $validator->errors(),
    //         ]);
	// 	}

	// 	$user = new User();
	// 	$user->id_outlet 	= $request->id_outlet;
	// 	$user->nama 	= $request->nama;
	// 	$user->username = $request->username;
	// 	$user->role 	= $request->role;
	// 	$user->password = Hash::make($request->password);
	// 	$user->save();


    //     $data = User::where('username','=', $request->username)->first();
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'berhasil menambahkan user baru',
    //         'data' => $data
    //        ]);
       
	// }

    public function insert(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'id_outlet' => 'required|max:20',
			'nama' => 'required|string|max:255',
			'username' => 'required|string|max:50|unique:Users',
			'password' => 'required|string|min:6',
			'role' => 'required|string',
		]);

		if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
		}

		$user = new User();
		$user->id_outlet= $request->id_outlet;
		$user->nama 	= $request->nama;
		$user->username = $request->username;
		$user->role 	= $request->role;
		$user->password = Hash::make($request->password);
		$user->save();

        $data = User::where('username','=', $request->username)->first();
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Berhasil `menambahkan user baru!.',
        //     'data' => $data
        // ]);
        return redirect('/user');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json([
                    'success' => false,
                    'message' => 'invalid username and password',
                ]);
            }
        } catch(JWTException $e){
            return response()->json([
                'success' => false,
                'message' => 'generated token failed',
            ]);
        }

        $data = [
            'token' => $token,
            'user' => JWTAuth::user()
        ];

        return response()->json([
            'success' => true,
            'message' => 'authentication success',
            'data' => $data
        ]);
    }

    public function loginCheck(){
        try {
            if(!$user = JWTAuth::parseToken()->authenticate()){
                return $this->response->errorResponse('Invalid Token!');
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e){
            return response()->json([
                'success' => false,
                'message' => 'Token Expired',
            ]);
        } catch  (Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
            return response()->json([
                'success' => false,
                'message' => 'Token Invalid',
            ]);
        } catch  (Tymon\JWTAuth\Exceptions\JWTException $e){
            return response()->json([
                'success' => false,
                'message' => 'Authorization token not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Authentication Success',
            'data' => $user,
        ]);
    }

    public function logout(Request $request)
    {
      
           Auth::logout();
           return view('login');
          
        }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_outlet' => 'required|numeric',
            'username' => 'required|string|max:255',
            'nama'      => 'required|string|max:255',
            'role'      => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
        }

        $user = User::where('id', $id)->first();
        $user->id_outlet = $request->id_outlet;
        $user->nama      = $request->nama;
        $user->username  = $request->username;
        $user->role      = $request->role;
        if($request->password != NULL){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data user berhasil diubah!',
        // ]);
        return redirect('/user');
    }

    public function delete($id)
    {
        $delete = User::where('id',$id)->delete();

        if($delete){
            return response()->json([
                'success' => true,
                'message' => 'Data user berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data user gagal dihapus'
            ]);
        }
    }

    public function getAll()
    {
        $data["count"] = User::count();
        $data['user'] = User::with('outlet')->get();
        
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function getById($id)
    {
        $data["users"] = User::where('id', $id)->get();

        return response()->json([
            'success' => true,
            'data'    => $data
        ]);
    }
  
}