<?php
namespace Admin;
use \Controller_AdminBase;
use Fuel\Core\View;
class Controller_Home extends Controller_AdminBase {
	public function before() {
		parent::before();
		if ($this->is_login === false) {
			\Response::redirect('auth');
		}
	}

	public function after($response) {
        return parent::after($response);
	}

	public function action_index() 
	{
		$this->title = 'Welcome dienlanhdaiphu.com';
		$this->theme->get_template()->set('content', View::forge('welcome'));	
	}
}
