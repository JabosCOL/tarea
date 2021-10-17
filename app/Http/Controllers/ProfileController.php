<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datos['profiles'] = Profile::paginate(5);
        
        return view('profile.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = auth()->user()->id;
        
        return view('profile.create',['profile'=> new Profile(),
        'id' => $id
        ] ); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->except('_token');
        Profile::insert($datos);
        return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $id = auth()->user()->id;        
        $user_id = User::where('id','=',$profile->users_id)->first()->id;
        
        if ($id == $user_id){
            return view('profile.edit', ['profile'=>$profile,
            'id'=>$id]);
        }
        else {
            return redirect()->route('profile.index')->with('mensaje','Este perfil fue creado por otro usuario');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except(['_token','_method']);
        Profile::where('id','=',$id)->update($datos);
        $profile = Profile::findOrfail($id);
        return redirect()->route('profile.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile = Profile::findOrfail($profile->id);
        $id = auth()->user()->id;
        $us_id = User::where('id','=',$profile->users_id)->first()->id;
        if($id == $us_id) {
            Profile::destroy($id);
            return redirect()->route('profile.index');
        }
        else {
            return redirect()->route('profile.index')->with('mensaje','Este perfil fue creado por otro usuario');
        }
    }
}
