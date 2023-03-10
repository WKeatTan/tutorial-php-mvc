<?php

namespace App\Controllers;

class PageController extends Controller
{

	// Homepage action
	public function indexAction()
	{
		$data = [
			'title' 		 => 'Super Admin System',
			'label_about_us' => 'About Us',
			'label_username' => 'Username',
			'label_password' => 'Password',
			'label_sign_in'	 => 'Sign In',
			'link_about_us'  => '/tutorial-php-mvc/about'
		];

		$this->render('home', $data);
	}
}
