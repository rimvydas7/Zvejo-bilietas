<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lake;
use Illuminate\Http\Request;

class LakeController extends Controller
{
    public function index()
    {
        return Lake::all();
    }
}
