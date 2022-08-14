<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AjaxController extends Controller
{
    public function index() {
      $msg = "This is a simple message.";
      return response()->json(array('msg'=> $msg), 200);
   	}
}
