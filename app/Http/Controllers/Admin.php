<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SppModel;


class Admin extends Controller
{
    public function index(){
      return redirect()->route('pembayaran');
    }
}
