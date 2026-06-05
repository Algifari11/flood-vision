<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('user.dashboard', compact('beritas'));
    }
}
