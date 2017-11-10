<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Flashy;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::all(); 
       return view('users.liste', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        User:: create([
            'name'=>$request->name,
            'admin'=> $request->admin,
            'email'=> $request->email,

            'password'=>bcrypt($request->password),
            'password_confirmation'=>$request->password_confirmation,
                    
            ]);
         Flashy::message('L\'utilisateur bien Ajouter');
         return redirect()->route('users.liste');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('users.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){        
        
        $users = User::findOrFail($id);
        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $users = array(
             'name' => $request->name,            
             'admin' => $request->admin,
             'email'=>$request->email
            );       
        User::where('id', $id)->update($users);
        Flashy::info('L\'utilisateur bien Modifier');
        return redirect()->route('users.liste');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        Flashy::error('Oops!!  L\'utilisateur à été supprimer');
        return redirect()->route('users.liste');
    }
}
