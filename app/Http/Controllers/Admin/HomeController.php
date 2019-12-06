<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Carbon\Carbon;

class HomeController extends Controller
  {
  public function __construct()

  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }

  public function index(){

    $date = Carbon::now();

    return view('admin.home')->with([
      'date' => $date

    ]);
    }

  }
