<?php


use Illuminate\Database\Eloquent\Model;
use App\Task;
use Illuminate\Http\Request;

class Account extends Model
{
	public function __construct()
	{
// 		die(__FUNCTION__);
	}

	
	
	
  	public function index()
	{
		echo 'hello world from controller : )';
	}
	
/* 	public function index(Request $request)
	{
	    
// 	    $tasks = Task::where('user_id', $request->user()->id)->get();
	
// 	    return view('tasks.index', [
// 	            'tasks' => $tasks,
// 	    ]);
	} 	
 */    //
}

?>