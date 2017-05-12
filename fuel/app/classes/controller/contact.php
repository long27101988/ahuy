<?php 
use Fuel\Core\View;

class Controller_Contact extends Controller_Base
{
	public function before() 
	{
		parent::before();
	}

	public function action_index() 
	{
		$this->theme->get_template()->set('content', View::forge('contact/index'));
	}
}