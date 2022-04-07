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

        $datos['user'] = User::select('ci','nombre','email', 'telefono','genero')
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
        $users = new User();
        return view('user.create', compact('users'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);
        $users = User::create($request->all());

       /* $users->ci = $request->ci;
        $users->nombre = $request->nombre;
        $users->email = $request->email;
        $users->telefono = $request->telefono;
        $users->genero = $request->genero;
        $users->password = Hash::make($request->password);
        $users->save();*/

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
        $user = User::find($ci);

        return view('user.edit', compact('user'));

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
        request()->validate(User::$rules);
        
        $users = User::find($ci);
        $users->nombre = $request->nombre;
        $users->email = $request->email;
        $users->telefono = $request->telefono;
        $users->genero = $request->email;
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
