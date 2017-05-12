<?php
namespace Admin;
use \Controller_AdminBase;
use Fuel\Core\View;
use Model\Base\Core;
use \Fuel\Core\Uri;
use \Fuel\Core\Security;

class Controller_Show extends Controller_AdminBase {
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
		$this->title = 'Welcome admin page';

		$listNews = \Model_Base_Core::getAll('news_show', [
			'where' => [
				'id' => 1
			]
		]);

		$returnData['listNews'] = $listNews;
		$this->theme->get_template()->set('content', \View::forge('show/index', $returnData));
	}

	public function action_edit($id = null)
	{
		if ($id != null && \Input::method() == "POST") {
			$params = \Input::post();

			if($this->validate($params)) {
				$data = [];

				$data = [
					"title" => $params['title'],
					"text1" => $params['text1'],
					"text2" => $params['text2'],
					"text3" => $params['text3'],
					"text4" => $params['text4'],
					"text5" => $params['text5'],
					"text6" => $params['text6'],
					"text7" => $params['text7'],
					"text8" => $params['text8'],
					"codeanalytics" => $params['codeanalytics'],
					"title_page" => $params['title_page'],
					"meta_key" => $params['meta_key'],
					"meta_desc" => $params['meta_desc'],
				];

				$arrWhere = [
					"id" => $id
				];
				try {
					\DB::start_transaction();
						$result = \Model_Base_Core::updateByWhere('news_show', $arrWhere, $data);
					\DB::commit_transaction();
					if($result) {
						return \Response::redirect('/admin/show');
					}
				} catch (Exception $e) {
					\DB::rollback_transaction();
					\Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
				}
			}
		}

		if ($id != null) {
			$result = \Model_Base_Core::getOne('news_show', [
				'where' => [
					'id' => $id
				]
			]);
			$data['newsinfo'] = $result;
			$this->theme->get_template()->set('content', \View::forge('show/edit', $data));
		}else{
			$this->theme->get_template()->set('content', \View::forge('show/index'));
		}
	}

	public function validate($params)
	{
		$val = \Validation::forge();
		$val->add_field('title', 'Title', 'required|trim');
		$val->add_field('title_page', 'Title Page', 'required|trim');

		if($val->run($params)){
			return true;
		}else{
			return false;
		}
	}
}
