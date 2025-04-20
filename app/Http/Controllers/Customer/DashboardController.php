<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //TODO: Saat ini hanya menampilkan semewntara dashboard duylu, nantinya bisa masukkin data disini
        return view('customer.dashboard.index');
    }
}
