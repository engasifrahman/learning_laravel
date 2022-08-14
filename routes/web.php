<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
########################### Auth Route ################################
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

########################### Routing ################################
	/////////////////////// Basic Routing ///////////////////////
	Route::get('/', function () {
	    return view('welcome');
	});

	Route::match(['get', 'post'], '/GnP', function () {
    	return 'This support both get & post method';
	});

	Route::any('/any', function () {
    	return 'This support any method';
	});

	Route::view('/there', 'welcome', ['name' => 'Asif']);
	Route::redirect('/','/there', 301); //301 is ststus code its optional
	Route::permanentRedirect('/here', '/there');

	Route::middleware(['First', 'Second'])->group(function () {
	    Route::get('/First', function () {
	        // Uses first & second Middleware
	    });
	    Route::get('/Second', function () {
	        // Uses first & second Middleware
	    });
	});

	////////////////////// Route Parameters //////////////////////
		//--------------- Required Parameters ---------------//
		Route::get('ID/{id}',function($id) {
		   echo 'ID: '.$id;
		});
		//--------------- Optional Parameters ---------------//
		Route::get('user/{name?}', function ($name = 'TutorialsPoint') { 
			return $name;
		});

		Route::get('my/{name}', function ($name) {
			return $name;
		})->where('name', '[A-Za-z]+');

		Route::get('my/{id}', function ($id) {
			return $id;
		})->where('id', '[0-9]+');

		Route::get('my/{id}/{name}', function ($id, $name) {
			return $id.' - '.$name;
		})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

	////////////////////////// Named Routes //////////////////////////
	Route::get('/named_route',function() {
		return view('redirections');
	})->name('profile');
	Route::get('/profile',function() {
		return redirect()->route('profile');
	});

	Route::get('/get_url',function() {
		return route('profile', ['id' => 1]);
	});

	Route::prefix('admin')->group(function () {
		Route::get('/users', function () {
        	// Matches The "/admin/users" URL
			return 'This is group with prefix';
		});
	});

	Route::prefix('admin')->middleware(['First', 'Second'])->group(function () {
		Route::get('/users', function () {
        	// Matches The "/admin/users" URL
			return 'This is group with prefix';
		});
	});


############################ Middleware ##############################
	/*Registering Middleware:
	  1. Global Middleware
	  2. Route Middleware
	*/
	///////////////////// Middleware Parameters //////////////////
	//-------------- This is Route Middleware -----------------//
  	Route::get('role',[
  		'middleware' => 'Role:editor',
  		'uses' => 'TestController@index',
  	]);
  	///////////////////// Terminable Middleware //////////////////
	//-------------- This is Route Middleware -----------------//
  	Route::get('terminate',[
  		'middleware' => 'Terminate',
  		'uses' => 'TerminateController@index',
  	]);

############################ Controller ###############################
	//////////////////// Controller Middleware ////////////////////
	Route::get('/usercontroller/path',[
	   'middleware' => 'First',
	   'uses' => 'UserController@showPath'
	]);
	///////////////// Restful Resource Controllers /////////////////
	Route::resource('resource','ResourceController');

	//--------------- Partial Resource Routes --------------------//
	Route::resource('partialResource1', 'ResourceController')->only([
		'index', 'show'
	]);

	Route::resource('partialResource1', 'ResourceController')->except([
		'create', 'store', 'update', 'destroy'
	]);

############################ Request  ###############################
	////////////////// Retrieving the Request URI //////////////////
	Route::get('/foo/bar','UriController@index');

	/////////////////////// Retrieving Input ///////////////////////
	Route::get('/signup',function() {
	   return view('register');
	});
	Route::post('/user/signup',array('uses'=>'UserRegistration@postRegister'));

############################ Response  ###############################
	/////////////////////// Basic Response ///////////////////////
	Route::get('/basic_response', function () {
	   return 'This is basic response';
	});
	///////////////////////Attaching Headers //////////////////////
	Route::get('/header',function() {
		return response("Headers Response", 200)->header('Content-Type', 'text/html');
	});
	////////////////////// Attaching Cookies ///////////////////////
	Route::get('/cookie',function() {
		return response("Cookie is set", 200)->header('Content-Type', 'text/html')
		->withcookie('name','Md. Asif Rahman (Route Cookie)');
	});
	//////////////////////// JSON Response /////////////////////////
	Route::get('/json',function() {
		return response()->json(['name' => 'Md. Asif Rahman', 'district' => 'joypurhat']);
	});

############################ Cookie ###############################
Route::get('/cookie/set','CookieController@setCookie');
Route::get('/cookie/get','CookieController@getCookie');

############################ Views ###############################
	//////////////////////// Basic View //////////////////////
	Route::get('/basic_view', function() {
		return view('basic_view');
	});
	/////////////////// Passing Data to Views ////////////////
	Route::get('/data_passing_view', function() {
		return view('data_passing_view',['name'=>'Md. Asif Rahman']);
	});
	/////////////////// Sharing Data with all Views ////////////////
	Route::get('/share', function() {
		return view('share');
	});
	Route::get('/share2', function() {
		return view('share2');
	});

########################## Redirections #############################
	///////////////// Redirecting to Named Routes ///////////////
	Route::get('/redirecting', ['as'=>'redirect',function() {
		return view('redirections');
	}]);
	/*OR
	Route::get('/redirecting',function() {
		return view('redirections');
	})->name('redirect');
	*/
	Route::get('/redirect',function() {
		return redirect()->route('redirect');
	});

	/////////////// Redirecting to Controller Actions /////////////
	Route::get('/rr','RedirectController@index');
	Route::get('/redirectcontroller',function() {
		return redirect()->action('RedirectController@index');
	});
########################## From #############################
///////// Here we are using laravel collective form /////////
Route::get('/form',function() {
   return view('laravelCollective');
});
Route::post('/user/submit',function(Request $r) {
   return dd($r->all());
});

########################## Session #############################
Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');

########################## Validation #############################
Route::get('/validation','ValidationController@showform');
Route::post('/validation','ValidationController@validateform');

######################## File Uploading ###########################
Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

######################## Sending Email ###########################
Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

############################ Ajax ###############################
Route::get('ajax',function() {
   return view('message');
});
Route::post('/getmsg','AjaxController@index');

############################ Ajax ###############################
Route::get('/facadeex', function() {
   return TestFacades::testingFacades(); //Its not working for me
});