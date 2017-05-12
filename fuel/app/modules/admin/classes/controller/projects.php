<?php
namespace Admin;
use \Controller_AdminBase;
use Fuel\Core\View;
use Model\Base\Core;
use \Fuel\Core\Uri;
use \Fuel\Core\Security;

class Controller_Projects extends Controller_AdminBase {
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

		$total = \Model_Base_Core::getRowNum('projects');

		$pagination = \Controller_AdminBase::getPagination([
			'url' => Uri::create('/public/admin/projects'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		$listProjects = \Model_Base_Core::getAll('projects', [
			'select' => [
				'id', 'title', 'alias','status' ,'short_content', 'avartar'
			],
			'order_by' => [
				'created' => 'desc'
			],
			'limit' => $pagination->per_page,
			'ofset' => $pagination->offset
		]);


		$returnData['pagination'] = $pagination;
		$returnData['listProjects'] = $listProjects;
		$this->theme->get_template()->set('content', \View::forge('projects/index', $returnData));
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
				if($_FILES && $_FILES['avartar']['name'] != ""){
					$config = \Controller_AdminBase::getConfigUpload();
					$status = \Model_Service_Upload::check_upload($config, "projects/");
					if($status) {
						$data["avartar"] = $status[0]['saved_as'];
					}
				}

				$result = \Model_Base_Core::insertAll('projects', $data);
				if($result) {
					return \Response::redirect('/admin/projects');
				}
			}
		}
		$this->theme->get_template()->set('content', \View::forge('projects/add'));
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
				if($_FILES && $_FILES['avartar']['name'] != ""){
					$config = \Controller_AdminBase::getConfigUpload();
					$status = \Model_Service_Upload::check_upload($config, "projects/");
					if($status) {
						$data['avartar'] = $status[0]['saved_as'];
					}
				}

				$arrWhere = [
					"id" => $id
				];
				$result = \Model_Base_Core::updateByWhere('projects', $arrWhere, $data);
				if($result) {
					return \Response::redirect('/admin/projects');
				}
			}
		}

		if ($id != null) {
			$result = \Model_Base_Core::getOne('projects', [
				'where' => [
					'id' => $id
				]
			]);
			$data['projectinfo'] = $result;
			$this->theme->get_template()->set('content', \View::forge('projects/edit', $data));
		}else{
			$this->theme->get_template()->set('content', \View::forge('projects/index'));
		}
	}

	public function action_del() {

		if(\Input::method() == "POST"){
			$params = \Input::post();
			$arrWhere = [
					"id" => $params['projectid']
			];

      $projectsDelInfo = \Model_Base_Core::getOne('projects', $arrWhere);
			$statusDelImg = \Controller_AdminBase::removeImage(DOCROOT."assets/img/projects/".$projectsDelInfo['avartar']);

      if($statusDelImg){
        $result = \Model_Base_Core::deleteRowByWhere("projects", $arrWhere);
        if($result) {
          return \Response::redirect('/admin/projects');
        }
      }
		}
	}

	public function action_indexgalleries($id = null) {

		$this->title = 'Welcome dienlanhdaiphu.com';

		if(!empty($id)) {

			$total = \Model_Base_Core::getRowNum('galleries', [
				'where' => [
					'project_id' => $id
				]
			]);

			$pagination = \Controller_AdminBase::getPagination([
				'url' => Uri::create('/public/admin/projects/galleries'),
				'total' => $total,
				'item_per_page' => 10,
			]);

			$listImages = \Model_Base_Core::getAll('galleries', [
				'select' => [
					'id', 'description', 'image_link', 'status'
				],
				'where' => [
					'project_id' => $id
				],
				'order_by' => [
					'id' => 'desc'
				],
				'limit' => $pagination->per_page,
				'ofset' => $pagination->offset
			]);

			$returnData['pagination'] = $pagination;
			$returnData['listImages'] = $listImages;
			$returnData['idProject'] = $id;

			$this->theme->get_template()->set('content', \View::forge('projects/galleries/index', $returnData));

		} else {

			return \Response::redirect('/admin/projects');

		}

	}

	public function action_addimg($id = null) {
		$this->title = 'Welcome dienlanhdaiphu.com';

		if(!empty($id)) {
			if(\Input::method() == "POST") {

				$params = \Input::post();
				//check upload image
				if($_FILES && count($_FILES['image']['name']) > 0){
					$config = \Controller_AdminBase::getConfigUpload();
					$status = \Model_Service_Upload::check_upload($config, "galleries/");
					//var_dump($status);die;
					if($status) {
						foreach($status as $kstatus => $valstatus) {
							$data = [];
							$data['project_id'] = $id;
							$data['image_link'] = $valstatus['saved_as'];
							$data['description'] = $params['des'][$kstatus];
							$result = \Model_Base_Core::insertAll('galleries', $data);
						}
					}
					return \Response::redirect('/admin/projects/galleries/'.$id);
				}
			}
			$returnData['idProject'] = $id;
			$this->theme->get_template()->set('content', \View::forge('projects/galleries/add', $returnData));
		} else {
			return \Response::redirect('/admin/projects');
		}
	}

	public function action_addfield() {
		if(\Input::method() == "POST") {
			$params = \Input::post();
			if(empty($params)) {
				return \Response::redirect("/admin");
			} else {
				$numberField = $params['numberOfField'];
				$data['number'] = $numberField;
				return \Response::forge(\View::forge('projects/galleries/addfield', $data));
			}
		} else {
			return \Response::redirect("/admin");
		}
	}

	public function action_editimg($id = null, $idimg = null) {
		$this->title = 'Welcome dienlanhdaiphu.com';
		if(!empty($id) && !empty($idimg)) {

			if(\Input::method() == "POST") {
				$params = \Input::post();

				$data = [];

				$data['description'] = $params['des'];

				if($_FILES && $_FILES['image']['name'] != ""){
					$config = \Controller_AdminBase::getConfigUpload();
					$status = \Model_Service_Upload::check_upload($config, "galleries/");
					//var_dump($status);die;
					if($status) {
						$data['image_link'] = $status[0]['saved_as'];
					}
				}
				$arrWhere = [
					"id" => $idimg
				];

				try {
					\DB::start_transaction();
					$result = \Model_Base_Core::updateByWhere('galleries', $arrWhere, $data);
					\DB::commit_transaction();
					if($result) {
						return \Response::redirect('/admin/projects/galleries/'.$id);
					}
				} catch (Exception $e) {
					\DB::rollback_transaction();
					\Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
					return \Response::redirect('/admin/projects/galleries/'.$id);
				}
			}

			if ($idimg != null) {
				$result = \Model_Base_Core::getOne('galleries', [
					'where' => [
						'id' => $idimg
					]
				]);
				$data['imgInfo'] = $result;
				$this->theme->get_template()->set('content', \View::forge('projects/galleries/edit', $data));

			} else {
				return \Response::redirect('/admin/projects');
			}
		}
	}

	public function action_delimg($id = null, $idimg = null) {
		if(\Input::method() == "POST"){
			$params = \Input::post();
			$arrWhere = [
					"id" => $params['imagesid']
			];
			$result = \Model_Base_Core::deleteRowByWhere("galleries", $arrWhere);
			if($result) {
				return \Response::redirect('/admin/projects/galleries/'.$id);
			}
		}
	}
}
