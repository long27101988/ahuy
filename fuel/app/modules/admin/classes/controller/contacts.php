<?php
namespace Admin;
use \Controller_AdminBase;
use Fuel\Core\View;
use Model\Base\Core;
use \Fuel\Core\Uri;
use \Fuel\Core\Security;

class Controller_Contacts extends Controller_AdminBase {
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

		$total = \Model_Base_Core::getRowNum('contacts');

		$pagination = \Controller_AdminBase::getPagination([
			'url' => Uri::create('/public/admin/contacts'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		$listContacts = \Model_Base_Core::getAll('contacts', [
			'order_by' => [
				'id' => 'desc'
			],
			'limit' => $pagination->per_page,
			'ofset' => $pagination->offset
		]);

		$returnData['pagination'] = $pagination;
		$returnData['listContacts'] = $listContacts;
		$this->theme->get_template()->set('content', \View::forge('contacts/index', $returnData));
	}
}
