<?php
namespace Admin;
use \Controller_AdminBase;
use Fuel\Core\View;
use Model\Base\Core;
use \Fuel\Core\Uri;
use \Fuel\Core\Security;

class Controller_Services extends Controller_AdminBase {
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

		$total = \Model_Base_Core::getRowNum('services');

		$pagination = \Controller_AdminBase::getPagination([
			'url' => Uri::create('/public/admin/services'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		$listServices = \Model_Base_Core::getAll('services', [
			'select' => [
				'id', 'title', 'alias','status' ,'short_content', 'avatar'
			],
			'order_by' => [
				'created' => 'desc'
			],
			'limit' => $pagination->per_page,
			'ofset' => $pagination->offset
		]);


		$returnData['pagination'] = $pagination;
		$returnData['listServices'] = $listServices;
		$this->theme->get_template()->set('content', \View::forge('services/index', $returnData));
	}

	public function validate($params){
		$val = \Validation::forge();
		$val->add_field('title', 'Title', 'required|trim');
		$val->add_field('alias', 'Alias', 'required|trim');
		$val->add_field('short_content', "ShortContent", 'required|trim|max_length[200]');

		if($val->run($params)){
			return true;
		}else{
			return false;
		}
	}

	public function action_add(){
		if(\Input::method() == "POST") {
			$params = \Input::post();

			if(empty($params['alias'])) {
				$params['alias'] = \Controller_AdminBase::convertVnToEn($params['title']);
			}

			if($this->validate($params)) {

				$data = [];

				$data = [
					"title" => $params['title'],
					"alias" => $params['alias'],
					"short_content" => $params['short_content'],
					"content" => $params['content'],
					"meta_key" => $params['meta_key'],
					"meta_desc" => $params['meta_desc'],
				];

				//check upload image
				if($_FILES && $_FILES['avatar']['name'] != ""){
					$config = \Controller_AdminBase::getConfigUpload();
          $config['url'] = "";
					$status = \Model_Service_Upload::check_upload($config, "services/");
					if($status) {
						$data['avatar'] = $status[0]['saved_as'];
					}
				}

				try {
					\DB::start_transaction();
					$result = \Model_Base_Core::insertAll('services', $data);
					$idtag = true;
					if(!empty($params['tags'])){
						$idtag = $this->addTagService($params, $result[0]);
					}
					\DB::commit_transaction();
					if($result && $idtag) {
						return \Response::redirect('/admin/services');
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
		$returnData['listTags'] = $listTags;
		$this->theme->get_template()->set('content', \View::forge('services/add', $returnData));
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
					"title" => $params['title'],
					"alias" => $params['alias'],
					"short_content" => $params['short_content'],
					"content" => $params['content'],
					"meta_key" => $params['meta_key'],
					"meta_desc" => $params['meta_desc'],
				];

				//check upload image
				if($_FILES && $_FILES['avatar']['name'] != ""){
					$config = \Controller_AdminBase::getConfigUpload();
					$status = \Model_Service_Upload::check_upload($config, "services/");
					if($status) {
						$data['avatar'] = $status[0]['saved_as'];
					}
				}

				$arrWhere = [
					"id" => $id
				];
				try {
					\DB::start_transaction();
					$result = \Model_Base_Core::updateByWhere('services', $arrWhere, $data);
					$idtag = $this->updateTagService($params, $result, $id);
					\DB::commit_transaction();
					if($result && $idtag) {
						return \Response::redirect('/admin/services');
					}
				} catch (Exception $e) {
					\DB::rollback_transaction();
					\Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
				}
			}
		}

		if ($id != null) {
			$result = \Model_Base_Core::getOne('services', [
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
				'where' => [
					'service_id' => $id
				]
			]);
			$arrMetaTag = [];
			foreach($listMetaTag as $ktag => $valtags){
				array_push($arrMetaTag, $valtags['tag_id']);
			}
			$data['listTags'] = $listTags;
			$data['metaTag'] = $arrMetaTag;
			$data['servicesinfo'] = $result;
			$this->theme->get_template()->set('content', \View::forge('services/edit', $data));
		}else{
			$this->theme->get_template()->set('content', \View::forge('services/index'));
		}
	}

	public function addTagService($params, $service)
	{
		if($service) {
			$data = [];
			foreach($params['tags'] as $ktag => $valtag) {
				$data = [
					"tag_id" => $valtag,
					"service_id" => $service
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

	public function updateTagService($params, $service, $id)
	{
		if($service && $id) {
			$data = [];
			$result = true;

			$arrDel = [
				"service_id" => $id
			];
			$numRow = \Model_Base_Core::getRowNum('metatags', $arrDel);
			if($numRow > 0){
				$resDel = \Model_Base_Core::deleteRowByWhere('metatags', $arrDel);
			}

			if(!empty($params['tags'])){
				$result = $this->addTagService($params, $id);
			}
			return $result;
		} else {
			return false;
		}
	}

	public function action_del()
	{
		if(\Input::method() == "POST"){
			$params = \Input::post();
			$arrWhere = [
					"id" => $params['serviceid']
			];

      $servicesDelInfo = \Model_Base_Core::getOne('setvices', $arrWhere);
			$statusDelImg = \Controller_AdminBase::removeImage(DOCROOT."assets/img/services/".$servicesDelInfo['avatar']);

      if($statusDelImg){
        $result = \Model_Base_Core::deleteRowByWhere("services", $arrWhere);
        if($result) {
          return \Response::redirect('/admin/services');
        }
      }
		}
	}

	public function action_tags()
	{
		$this->title = 'Welcome dienlanhdaiphu.com';

		$total = \Model_Base_Core::getRowNum('tags');

		$pagination = \Controller_AdminBase::getPagination([
			'url' => Uri::create('/admin/services/tags'),
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
		$this->theme->get_template()->set('content', \View::forge('services/tags/index', $returnData));
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
					return \Response::redirect('/admin/services/tags');
				}
			}
		}
		$this->theme->get_template()->set('content', \View::forge('services/tags/add'));
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
					return \Response::redirect('/admin/services/tags');
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
			$this->theme->get_template()->set('content', \View::forge('services/tags/edit', $data));
		}else{
			$this->theme->get_template()->set('content', \View::forge('services/tags/index'));
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
				return \Response::redirect('/admin/services/tags');
			}
		}
	}
}
