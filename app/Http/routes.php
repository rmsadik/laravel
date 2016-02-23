<?php
use App\Task;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Route::get('/account','account@index');
Route::get('/account',function(){
	$tasks = Task::orderBy('created_at', 'asc')->get();
	return view('account',array('index','tasks'=>$tasks));
});

Route::delete('/account/{task}', function (Task $task) {
	$task->delete();

	return redirect('/account');
});

Route::post('/account/add', function (Request $request) {
	$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
	]);
	if ($validator->fails()) {
		return redirect('/account')
		->withInput()
		->withErrors($validator);
	}
	$task = new Task;
	$task->name = $request->name;
	$task->save();
	return redirect('/account');
});
	
	


/* Route::get('/', function () {
    return view('welcome');
});
 */

//   Route::get('/', function () {
//      return view('tasks');
//  });


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/* Route::get('/hello',function(){
	return 'Hello World!';
});
 */

/* // first test
Route::get('hello', 'Hello@index');
Route::get('/hello/{name}', 'Hello@show');

Route::get('blade', function () { return view('page'); });

Route::get('blade', function () {
	return view('page',array('name' => 'Mohamed','day' => 'Friday'));
});
 */

// Route::group(['middleware' => ['web']], function () {

 		/**
 		 * Show Task Dashboard
 		 */
 			Route::get('/', function () {
 				$tasks = Task::orderBy('created_at', 'asc')->get();
 			
 				return view('tasks', [
 						'tasks' => $tasks
 				]);
 			}); 	
 			
  			/**
 			 * Add New Task
 			 */
  			Route::post('/task', function (Request $request) {
 				$validator = Validator::make($request->all(), [
 						'name' => 'required|max:255',
 				]);
 				if ($validator->fails()) {
 					return redirect('/')
 					->withInput()
 					->withErrors($validator);
 				}
 				$task = new Task;
 				$task->name = $request->name;
 				$task->save();
 				return redirect('/');
 			});
  			
 				/**
 				 * Delete Task
 				 */
  				Route::delete('/task/{task}', function (Task $task) {
  					$task->delete();
  				
  					return redirect('/');
  				}); 

//   	});
