<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\About;

class AboutpageController extends Controller
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
        $abouts= About::all();
        return view('pages.about.view',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.about.create');
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
            'title' => 'required|string',
            'sub_title' => 'required|string', 
            'description' => 'required|string', 
            'img' => 'required|image', 
        ]);

        $abouts= new About;
        $abouts->title=$request->title;
        $abouts->sub_title=$request->sub_title;
        $abouts->description=$request->description;

        $img_file = $request->file('img');
        Storage::putFile('public/img/', $img_file);
        $abouts->img ="storage/img/".$img_file->hashName();

        $abouts->save();
        return redirect()->route('admin.about.create')->with('success', "New Info Create successfully");


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
        $abouts= About::find($id);
        return view('pages.about.edit',compact('abouts'));
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
            'title' => 'required|string',
            'sub_title' => 'required|string', 
            'description' => 'required|string', 
            'img' => 'required|image', 
        ]);

        $abouts=About::find($id);
        $abouts->title=$request->title;
        $abouts->sub_title=$request->sub_title;
        $abouts->description=$request->description;

        if($request->file('img'))
        {
            $img_file = $request->file('img');
            Storage::putFile('public/img/', $img_file);
            $abouts->img ="storage/img/".$img_file->hashName();
        }
        
        $abouts->save();
        return redirect()->route('admin.about.view')->with('success', "New Info Update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abouts=About::find($id);
        @unlink(public_path($abouts->img));
        $abouts->delete();
        return redirect()->route('admin.about.view')->with('success', "Data Delete successfully");
    }
}
