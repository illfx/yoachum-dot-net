<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathController extends Controller
{

    public function index()
    {
        return view('math.index');
    }

    public function showTimesTable()
    {
        return view('math.times-table');
    }

    public function showFlashCards()
    {
        return view('math.flash-cards');
    }

    public function showFormulas()
    {
        return view('math.formulas');
    }

}
