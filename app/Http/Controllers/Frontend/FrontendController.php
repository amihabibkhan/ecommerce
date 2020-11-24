<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return '<h1 style="text-align: center">Welcome to Bikiron Shop</h1>';
    }
}
