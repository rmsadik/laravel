<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use App\Task;
class TaskController extends Controller
{

	public function index()
	{
		return "Index page";
	}
	
	
/*     public function create()
    {
        return view('authentication.create');
    }
    
    public function store(Request $request)
    {
        $user = Sentinel::authenticate([
            'email'    => $request->input('email'),
            'password' => $request->input('password')
        ]);
        
        if ($user)
        {
            return redirect(url('/dashboard'));
        }
        else
        {
            return redirect(url('/sign_in'));
        }
    }
    
    public function destroy()
    {
        Sentinel::logout();
        
        return redirect(url('/'));
    }
 */
	
}