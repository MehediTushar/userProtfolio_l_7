<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Team;

class TeampageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $teams= Team::all();
        return view('pages.teams.view',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'required|string',
            'designation' => 'required|string', 
            'user_img' => 'required|image', 
        ]);

        $teams= new Team;
        $teams->user_name=$request->user_name;
        $teams->designation=$request->designation;

        $img_file=$request->file('user_img');
        Storage::putFile('public/img/', $img_file);
        $teams->user_img ="storage/img/".$img_file->hashName();

        $teams->save();
        return redirect()->route('admin.teams.create')->with('success', "New Info Create successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams= Team::find($id);
        return view('pages.teams.edit', compact('teams'));
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
        $this->validate($request, [
            'user_name' => 'required|string',
            'designation' => 'required|string', 
            'user_img' => 'required|image', 
        ]);

        $teams=Team::find($id);
        $teams->user_name=$request->user_name;
        $teams->designation=$request->designation;

        if($request->file('user_img'))
        {
            $img_file=$request->file('user_img');
            Storage::putFile('public/img/', $img_file);
            $teams->user_img ="storage/img/".$img_file->hashName();
        }
        

        $teams->save();
        return redirect()->route('admin.teams.view')->with('success', "New Info Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teams=Team::find($id);
        @unlink(public_path($teams->user_img));
        $teams->delete();
        return redirect()->route('admin.teams.view')->with('success', "Data Delete successfully");
    }
}
