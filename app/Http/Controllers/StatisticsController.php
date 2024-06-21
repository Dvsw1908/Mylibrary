<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistic;

class StatisticsController extends Controller
{
    public function index()
    {
        $statistics = Statistic::all();

        return view('home', compact('statistics'));
    }
}
