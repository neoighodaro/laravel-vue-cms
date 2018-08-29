<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        {
            if (request()->user()->hasRole('admin')) {
                return view('admin.dashboard');
            }
            if (request()->user()->hasRole('user')) {
                return redirect('/home');
            }
        }
    }
}