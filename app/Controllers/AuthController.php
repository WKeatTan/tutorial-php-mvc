<?php

namespace App\Controllers;

class AuthController extends Controller
{
	public function indexAction()
	{
		$data = [
			'title' 		   => 'Super Admin System',
			'label_about_us_1' => 'About Us New Tab',
			'label_about_us_2' => 'About Us Self Refresh',
			'label_username'   => 'Username',
			'label_password'   => 'Password',
			'label_sign_in_1'  => 'Sign In',
			'label_sign_in_2'  => 'Sign In Ajax',
			'link_about_us'    => '/tutorial-php-mvc/about',
			'link_login'	   => '/tutorial-php-mvc/homepage/login',
		];

		$this->render('home', $data);
	}

	public function loginAction()
	{
		// $data = [
		// 	'title' => 'About'
		// ];

		// extract($data);

		// require_once APP_ROOT . "/views/about.php";

		$controller = new AboutController();
		$controller->indexAction();
	}
}
