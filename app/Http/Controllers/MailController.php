<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
	public function basic_email() {
		$data = array('name'=>'Md. Asif Rahman');

		Mail::send(['text'=>'mail'], $data, function($message) {
			$message->to('eng.asifrahman@gmail.com', 'Mr. You')->subject('Laravel Basic Testing Mail');
			$message->from('e.asifrahman@gmail.com','Md. Asif Rahman');
		});
		echo "Basic Email Sent. Check your inbox.";
	}
	public function html_email() {
		$data = array('name'=>'Md. Asif Rahman');
		Mail::send('mail', $data, function($message) {
			$message->to('eng.asifrahman@gmail.com', 'Mr. You')->subject('Laravel HTML Testing Mail');
			$message->from('e.asifrahman@gmail.com','Md. Asif Rahman');
		});
		echo "HTML Email Sent. Check your inbox.";
	}
	public function attachment_email() {
		$data = array('name'=>'Md. Asif Rahman');
		Mail::send('mail', $data, function($message) {
			$message->to('eng.asifrahman@gmail.com', 'Mr. You')->subject('Laravel Testing Mail with Attachment');
			//$message->attach('F:\Download\IMG_1461.jpg');
			$message->attach('F:\File\Laravel\laravel basic instruction.txt');
			$message->from('e.asifrahman@gmail.com','Md. Asif Rahman');
		});
		echo "Email Sent with attachment. Check your inbox.";
	}
}
