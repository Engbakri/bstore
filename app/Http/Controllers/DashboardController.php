<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
         if (Auth::user()->hasRole('admin')) {
            return view('dashboard.index');
        } else {
            return view('dashboard.index');
        }
    }
    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
