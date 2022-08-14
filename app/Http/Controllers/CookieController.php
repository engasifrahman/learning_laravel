<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//To create cookie with response & withCookie(), you have to use 'Resopnse'
use Illuminate\Http\Response;
//To create cookie with Cookie facade to "queue" cookies, you have to use 'Cookie'
use Cookie;

class CookieController extends Controller
{
   public function setCookie(Request $request) {
      $minutes = 1;
      //$response = new Response('Hello World');
      //$response->withCookie(cookie('name', 'Md. Asif Rahman (response)', $minutes));
      //$response->withCookie(cookie()->forever('name', 'Md. Asif Rahman (response-forever)'));
      //Cookie::queue('name', 'Md. Asif Rahman (Cookie-queue)', $minutes);
      Cookie::queue(Cookie::make('name', 'Md. Asif Rahman (Cookie-queue-Cookie-make)', $minutes));
      //return $response;
   }
   public function getCookie(Request $request) {
   	  
   	  //You can use one of them whatever process you use to set cookie
      //$value = $request->cookie('name'); //To retrive cookie data if cookie created by response & withCookie()
      $value = Cookie::get('name'); //To retrive cookie data if cookie created by Cookie facade to "queue" cookies
      echo $value;
   }
}
