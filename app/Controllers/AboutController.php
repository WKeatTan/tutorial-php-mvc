<?php

namespace App\Controllers;

class AboutController extends Controller
{
	public function indexAction()
	{
		$data = [
			'title' => 'About'
		];

		$this->render('about', $data);
	}
}
