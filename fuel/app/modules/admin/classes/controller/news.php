<?php
namespace Admin;
use \Controller_AdminBase;
use Fuel\Core\View;
use Model\Base\Core;
use \Fuel\Core\Uri;
use \Fuel\Core\Security;

class Controller_News extends Controller_AdminBase {
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

		$total = \Model_Base_Core::getRowNum('news');

		$pagination = \Controller_AdminBase::getPagination([
			'url' => Uri::create('/public/admin/news'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		$listNews = \Model_Base_Core::getAll('news', [
			'select' => [
				'id', 'title', 'alias','status' ,'short_content', 'avartar', 'cateid'
			],
			'order_by' => [
				'created' => 'desc'
			],
			'limit' => $pagination->per_page,
			'ofset' => $pagination->offset
		]);

		$returnData['pagination'] = $pagination;
		$returnData['listNews'] = $listNews;
		$this->theme->get_template()->set('content', \View::forge('news/index', $returnData));
	}

	public function action_add()
	{
		if(\Input::method() == "POST") {
			$params = \Input::post();

			if(empty($params['alias'])) {
				$params['alias'] = \Controller_AdminBase::convertVnToEn($params['title']);
			}

			if($this->validate($params)) {

				$data = [];

				$data = [
					"cateid" => $params['cate'],
					"title" => $params['title'],
					"alias" => $params['alias'],
					"short_content" => $params['short_content'],
					"content" => $params['content'],
					"meta_key" => $params['meta_key'],
					"meta_desc" => $params['meta_desc'],
				];

				//check upload image
				if($_FILES && $_FILES['avartar']['name'] != ""){
					$config = \Controller_AdminBase::getConfigUpload();
					$status = \Model_Service_Upload::check_upload($config, "news/");
					if($status) {
						$data["avartar"] = $status[0]['saved_as'];
					}
				}

				try {
					\DB::start_transaction();
					$result = \Model_Base_Core::insertAll('news', $data);
					$idtag = true;
					if(!empty($params['tags'])) {
						$idtag = $this->addTagNews($params, $result[0]);
					}
					\DB::commit_transaction();
					if($result && $idtag) {
						return \Response::redirect('/admin/news');
					}
				} catch (Exception $e) {
					\DB::rollback_transaction();
					\Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
				}
			}
		}
		$listTags = \Model_Base_Core::getAll('tags', [
				'select' => [
					'id', 't_name', 'alias'
				],
				'where' => [
					'status' => 1
				],
				'order_by' => [
					'id' => 'desc'
				]
		]);

		$listCategories = \Model_Base_Core::getAll('news_categories', [
				'select' => [
					'id', 'name'
				],
				'where' => [
					'status' => 1
				],
				'order_by' => [
					'id' => 'desc'
				]
		]);
		$returnData['listTags'] = $listTags;
		$returnData['listCategories'] = $listCategories;
		$this->theme->get_template()->set('content', \View::forge('news/add', $returnData));
	}

	public function action_edit($id = null)
	{
		if ($id != null && \Input::method() == "POST") {
			$params = \Input::post();

				if(empty($params['alias'])) {
					$params['alias'] = \Controller_AdminBase::convertVnToEn($params['title']);
				}

			if($this->validate($params)) {
				$data = [];

				$data = [
					"cateid" => $params['cate'],
					"title" => $params['title'],
					"alias" => $params['alias'],
					"short_content" => $params['short_content'],
					"content" => $params['content'],
					"meta_key" => $params['meta_key'],
					"meta_desc" => $params['meta_desc'],
				];

				//check upload image
				if($_FILES && $_FILES['avartar']['name'] != ""){
					$config = \Controller_AdminBase::getConfigUpload();
					$status = \Model_Service_Upload::check_upload($config, "news/");
					if($status) {
						$data["avartar"] = $status[0]['saved_as'];
					}
				}

				$arrWhere = [
					"id" => $id
				];
				try {
					\DB::start_transaction();
					$result = \Model_Base_Core::updateByWhere('news', $arrWhere, $data);
					$idtag = $this->updateTagNews($params, $result, $id);
					\DB::commit_transaction();
					if($result && $idtag) {
						return \Response::redirect('/admin/news');
					}
				} catch (Exception $e) {
					\DB::rollback_transaction();
					\Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
				}
			}
		}

		if ($id != null) {
			$result = \Model_Base_Core::getOne('news', [
				'where' => [
					'id' => $id
				]
			]);
			$listTags = \Model_Base_Core::getAll('tags', [
					'select' => [
						'id', 't_name', 'alias'
					],
					'where' => [
						'status' => 1
					],
					'order_by' => [
						'id' => 'desc'
					]
			]);

			$listMetaTag = \Model_Base_Core::getAll('metatags', [
				'select' => [
					'id', 'tag_id', 'news_id'
				],
				'where' => [
					'news_id' => $id
				],
				'order_by' => [
					'id' => 'desc'
				]
			]);

			$listCategories = \Model_Base_Core::getAll('news_categories', [
					'select' => [
						'id', 'name'
					],
					'where' => [
						'status' => 1
					],
					'order_by' => [
						'id' => 'desc'
					]
			]);

			$arrTag = [];
			if(count($listMetaTag) > 0){
				foreach($listMetaTag as $k => $v){
					array_push($arrTag, $v['tag_id']);
				}
			}
			$data['listTags'] = $listTags;
			$data['listCategories'] = $listCategories;
			$data['newsinfo'] = $result;
			$data['listMetaTag'] = $arrTag ;
			$this->theme->get_template()->set('content', \View::forge('news/edit', $data));
		}else{
			$this->theme->get_template()->set('content', \View::forge('news/index'));
		}
	}

	public function action_del()
	{
		if(\Input::method() == "POST"){
			$params = \Input::post();
			$arrWhere = [
					"id" => $params['newsid']
			];

			$newsDelInfo = \Model_Base_Core::getOne('news', $arrWhere);
			$statusDelImg = \Controller_AdminBase::removeImage(DOCROOT."assets/img/news/".$newsDelInfo['avartar']);

			if($statusDelImg){
				$result = \Model_Base_Core::deleteRowByWhere("news", $arrWhere);
				if($result) {
					return \Response::redirect('/admin/news');
				}
			}
		}
	}

	public function addTagNews($params, $news)
	{
		if($news) {
			$data = [];
			foreach($params['tags'] as $ktag => $valtag) {
				$data = [
					"tag_id" => $valtag,
					"news_id" => $news
				];
				try {
					\Model_Base_Core::insertAll('metatags', $data);
				} catch (Exception $e) {
					Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
					return false;
				}
			}
			return true;
		} else {
			return false;
		}
	}

	public function updateTagNews($params, $news, $id)
	{
		if($news && $id) {
			$data = [];
			$result = true;
			$arrDel = [
				"news_id" => $id
			];
			$numRow = \Model_Base_Core::getRowNum('metatags', $arrDel);
			if($numRow > 0){
				$resDel = \Model_Base_Core::deleteRowByWhere('metatags', $arrDel);
			}
			if(!empty($params['tags'])) {
				$result = $this->addTagNews($params, $id);
			}
			return $result;
		} else {
			return false;
		}
	}

	public function action_categories()
	{
		$this->title = 'Welcome dienlanhdaiphu.com';
		$total = \Model_Base_Core::getRowNum('news_categories');

		$pagination = \Controller_AdminBase::getPagination([
			'url' => Uri::create('/admin/news/categories'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		$listCategories = \Model_Base_Core::getAll('news_categories', [
			'select' => [
				'id', 'name', 'status'
			],
			'order_by' => [
				'created' => 'desc'
			],
			'limit' => $pagination->per_page,
			'ofset' => $pagination->offset
		]);


		$returnData['pagination'] = $pagination;
		$returnData['listCategories'] = $listCategories;
		$this->theme->get_template()->set('content', \View::forge('news/categories/index', $returnData));
	}

	public function action_addcate()
	{
		if(\Input::method() == "POST") {
			$params = \Input::post();
			if($this->validateCate($params)) {
					$data = [
						"name" => $params['name'],
						"alias" => $params['alias']
					];
				$result = \Model_Base_Core::insertAll('news_categories', $data);
				if($result) {
					return \Response::redirect('/admin/news/categories');
				}
			}
		}
		$this->theme->get_template()->set('content', \View::forge('news/categories/add'));
	}

	public function action_editcate($id = null)
	{
		if ($id != null && \Input::method() == "POST") {
			$params = \Input::post();
			if($this->validateCate($params)) {

				$data = [
					"name" => $params['name'],
					"alias" => $params['alias']
				];

				$arrWhere = [
					"id" => $id
				];
				$result = \Model_Base_Core::updateByWhere('news_categories', $arrWhere, $data);
				if($result) {
					return \Response::redirect('/admin/news/categories');
				}
			}
		}

		if ($id != null) {
			$result = \Model_Base_Core::getOne('news_categories', [
				'where' => [
					'id' => $id
				]
			]);
			$data['newscate'] = $result;
			$this->theme->get_template()->set('content', \View::forge('news/categories/edit', $data));
		}else{
			$this->theme->get_template()->set('content', \View::forge('news/categories'));
		}
	}

	public function action_delcate()
	{
		if(\Input::method() == "POST"){
			$params = \Input::post();
			$arrWhere = [
					"id" => $params['cateid']
			];
			$result = \Model_Base_Core::deleteRowByWhere("news_categories", $arrWhere);
			if($result) {
				return \Response::redirect('/admin/news/categories');
			}
		}
	}

	public function action_tags()
	{
		$this->title = 'Welcome dienlanhdaiphu.com';

		$total = \Model_Base_Core::getRowNum('tags');

		$pagination = \Controller_AdminBase::getPagination([
			'url' => Uri::create('/admin/news/tags'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		$listTags = \Model_Base_Core::getAll('tags', [
			'select' => [
				'id', 't_name', 'alias', 'status'
			],
			'order_by' => [
				'id' => 'desc'
			],
			'limit' => $pagination->per_page,
			'ofset' => $pagination->offset
		]);


		$returnData['pagination'] = $pagination;
		$returnData['listTags'] = $listTags;
		$this->theme->get_template()->set('content', \View::forge('news/tags/index', $returnData));
	}

	public function action_addtag()
	{
		if(\Input::method() == "POST") {
			$params = \Input::post();
			if($this->validateTag($params)) {
					$data = [
						"t_name" => $params['t_name'],
						"alias" => $params['alias']
					];
				$result = \Model_Base_Core::insertAll('tags', $data);
				if($result) {
					return \Response::redirect('/admin/news/tags');
				}
			}
		}
		$this->theme->get_template()->set('content', \View::forge('news/tags/add'));
	}

	public function action_edittag($id = null)
	{
		if ($id != null && \Input::method() == "POST") {
			$params = \Input::post();
			if($this->validateTag($params)) {

				$data = [
					"t_name" => $params['t_name'],
					"alias" => $params['alias']
				];

				$arrWhere = [
					"id" => $id
				];

				$result = \Model_Base_Core::updateByWhere('tags', $arrWhere, $data);
				if($result) {
					return \Response::redirect('/admin/news/tags');
				}
			}
		}

		if ($id != null) {
			$result = \Model_Base_Core::getOne('tags', [
				'where' => [
					'id' => $id
				]
			]);
			$data['taginfo'] = $result;
			$this->theme->get_template()->set('content', \View::forge('news/tags/edit', $data));
		}else{
			$this->theme->get_template()->set('content', \View::forge('news/tags/index'));
		}
	}

	public function action_deltag()
	{
		if(\Input::method() == "POST"){
			$params = \Input::post();
			$arrWhere = [
					"id" => $params['tagid']
			];
			$result = \Model_Base_Core::deleteRowByWhere("tags", $arrWhere);
			if($result) {
				return \Response::redirect('/admin/news/tags');
			}
		}
	}

	public function validate($params)
	{
		$val = \Validation::forge();
		$val->add_field('title', 'Title', 'required|trim');
		$val->add_field('alias', 'Alias', 'trim');
		$val->add_field('short_content', "ShortContent", 'required|trim|max_length[200]');

		if($val->run($params)){
			return true;
		}else{
			return false;
		}
	}

	public function validateCate($params)
	{
		$val = \Validation::forge();
		$val->add_field('name', 'Name', 'required|trim');
		$val->add_field('alias', 'Alias', 'trim');

		if($val->run($params)){
			return true;
		}else{
			return false;
		}
	}

	public function validateTag($params)
	{
		$val = \Validation::forge();
		$val->add_field('t_name', 'Name', 'required|trim');
		$val->add_field('alias', 'Alias', 'trim');

		if($val->run($params)){
			return true;
		}else{
			return false;
		}
	}
}
