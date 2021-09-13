<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
use App\services;
use App\Protfolio;
use App\About;
use App\Team;


class PageController extends Controller
{
    public function index()
    {
        $main=Main::first();
        $service=services::all();
        $protfolios=Protfolio::all();
        $abouts=About::all();
        $teams=Team::all();
        return view('pages.index', compact('main','service','protfolios','abouts','teams'));
    }


}
