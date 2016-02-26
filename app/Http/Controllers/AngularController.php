<?php
namespace App\Http\Controllers;

use App;
use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * 
 * @author msathik
 *
 */
class AngularController extends Controller
{
	
	public function index()
	{
		echo "This is an Angular index page.";
	}
	public function action_index()
	{
		echo "This is the profile page.";
	}
	
	public function action_login()
	{
		echo "This is the login form.";
	}
		
	public function login()
	{
		echo "test login";
		return view('login.login',array('name' => 'HW'));
// 		$tasks = Task::orderBy('created_at', 'asc')->get();
// 		return view('account',array('index','tasks'=>$tasks));
	}
	
			
	public function action_logout()
	{
		echo "This is the logout action.";
	}
				
}