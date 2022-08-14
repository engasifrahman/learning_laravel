<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
	public function accessSessionData() {
		if(session()->has('my_name'))
			echo session()->get('my_name');
		else
			echo 'No data in the session';
	}
	public function storeSessionData() {
		session()->put('my_name','Md. Asif Rahman AA');
		echo "Data has been added to session";
	}
	public function deleteSessionData() {
		//There also have  flush() to delete all session data, pull() to delete but it first get data tahn delete it 
		session()->forget('my_name');
		echo "Data has been removed from session.";
	}
}
