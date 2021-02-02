<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::whereIn('status', ['admin','staff'])->get();
        return view('admin.user.index', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama_user' => 'required',
                'no_hp'     => 'required',
                'jenis_kel' => 'required',
                'alamat'    => 'required',
                'status'    => 'required',
                'username'  => 'required|unique:tb_user',
                'email'     => 'required|email|unique:tb_user',
                'password'  => 'required|min:8',
            ]
        );

        $validated['password'] = bcrypt($request->password);
        
        $user = User::create($validated);

        if(!Auth::check()) {
            return redirect()->route('ulasan')->with(['message' => 'Akun berhasil dibuat. Anda dapat login dengan menggunakan username atau email dan password Anda.', 'status' => 'success']);
        }

        return redirect()->route('admin.user.index')->with(['message' => 'Data berhasil ditambahkan.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->has(['username', 'password'])){
            $validatedUsername = $request->validate(
                [
                    'username'  => 'required|unique:tb_user',
                    'password'  => 'required|min:8',
                ]
            );

            $user->username = $request->username;
            $user->password = bcrypt($request->password);

        } else if($request->has('username')){
            $validatedPassword = $request->validate(
                [
                    'username'  => 'required|unique:tb_user',
                ]
            );
            
            $user->username = $request->username;

        } else if($request->has('password')){
            $validatedPassword = $request->validate(
                [
                    'password'  => 'required|min:8',
                ]
            );
            
            $user->password = bcrypt($request->password);
        }

        $validated = $request->validate(
            [
                'nama_user' => 'required',
                'no_hp'     => 'required',
                'jenis_kel' => 'required',
                'alamat'    => 'required',
                'status'    => 'required',
            ]
        );

        $user->update($validated);
        return redirect()->route('admin.user.index')->with(['message' => 'Data berhasil diubah.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periode->delete();
        return redirect()->route('periode.index')->with(['message' => 'Data berhasil dihapus.', 'status' => 'success']);
    }
}
