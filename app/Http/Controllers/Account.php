<?php
namespace App\Http\Controllers;

class Account extends Controller
{
	
	public function index()
	{
		echo "This is an index page.";
	}
	public function action_index()
	{
		echo "This is the profile page.";
	}
		
	public function action_login()
	{
		echo "This is the login form.";
	}
			
	public function action_logout()
	{
		echo "This is the logout action.";
	}
				
}