<?php 
use Fuel\Core\View;

class Controller_Page extends Controller_Base
{
	public function before() 
	{
		parent::before();
	}

	public function action_intro() {
		$this->theme->get_template()->set('content', View::forge('intro'));
	}
}