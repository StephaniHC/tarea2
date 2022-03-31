<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['user'] = User::select('ci','nombre','email')
        ->get();
        return view('user.index', $datos);
   
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();
        $users->ci = $request->ci;
        $users->nombre = $request->nombre;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();

        return redirect('/user')->with('status', 'Usuario Creado Exitosamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(int $ci)
    {
        $user=User::findOrFail($ci);
        return view('user.edit',compact('user', 'user'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $ci)
    {
        $users = User::find($ci);
        $users->nombre = $request->nombre;
        $users->email = $request->email;
        $users->save();
        return redirect('/user')->with('status', 'Usuario Actualizado Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($ci)
    { 
        User::destroy($ci);
        return redirect('user');
    } 
}
