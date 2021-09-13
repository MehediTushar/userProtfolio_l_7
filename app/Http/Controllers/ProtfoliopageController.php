<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Protfolio;

class ProtfoliopageController extends Controller
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
        $protfolios=Protfolio::all();
        return view('pages.protfolios.view',compact('protfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.protfolios.create');
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
            'big_img' => 'required|image', 
            'sm_img' => 'required|image', 
            'client' => 'required|string', 
            'category' => 'required|string' 
        ]);

        $protfolios= new Protfolio;
        $protfolios->title=$request->title;
        $protfolios->sub_title=$request->sub_title;
        $protfolios->description=$request->description;
        $protfolios->client=$request->client;
        $protfolios->category=$request->category;

        $big_file = $request->file('big_img');
        Storage::putFile('public/img/', $big_file);
        $protfolios->big_img ="storage/img/".$big_file->hashName();

        $sm_file = $request->file('sm_img');
        Storage::putFile('public/img/', $sm_file);
        $protfolios->sm_img ="storage/img/".$sm_file->hashName();

        $protfolios->save();
        return redirect()->route('admin.protfolios.create')->with('success', "New Protfolio Create successfully");



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
        $protfolios=Protfolio::find($id);
        return view('pages.protfolios.edit', compact('protfolios'));
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
            'big_img' => 'required|image', 
            'sm_img' => 'required|image', 
            'client' => 'required|string', 
            'category' => 'required|string' 
        ]);

        $protfolios= Protfolio::find($id);
        $protfolios->title=$request->title;
        $protfolios->sub_title=$request->sub_title;
        $protfolios->description=$request->description;
        $protfolios->client=$request->client;
        $protfolios->category=$request->category;

        
        if($request->file('big_img'))
        {
            $big_file = $request->file('big_img');
            Storage::putFile('public/img/', $big_file);
            $protfolios->big_img ="storage/img/".$big_file->hashName();
        }

        if($request->file('sm_img'))
        {
            $sm_file = $request->file('sm_img');
            Storage::putFile('public/img/', $sm_file);
            $protfolios->sm_img ="storage/img/".$sm_file->hashName();
        }
        
        $protfolios->save();
        return redirect()->route('admin.protfolios.view')->with('success', "New Protfolio Updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $protfolios = Protfolio::find($id);
        @unlink(public_path($protfolios->big_img));
        @unlink(public_path($protfolios->sm_img));
        $protfolios->delete();
        return redirect()->route('admin.protfolios.view')->with('success', "Data Delete successfully");
    }
}
