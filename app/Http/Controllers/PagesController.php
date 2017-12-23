<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function indexPage()
    {
        return view('site.pages.index');
    }
}
