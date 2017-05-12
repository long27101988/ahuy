<?php
namespace Admin;
use \Controller_AdminBase;
use Fuel\Core\View;
use Model\Base\Core;
use \Fuel\Core\Uri;
use \Fuel\Core\Security;

class Controller_Products extends Controller_AdminBase {
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

		$total = \Model_Base_Core::getRowNum('products');

		$pagination = \Controller_AdminBase::getPagination([
			'url' => Uri::create('/public/admin/products'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		/*$listProducts = \Model_Base_Core::getAll('products', [
			'select' => [
				'id', 'name', 'alias', 'active', 'avatar', 'category_id', 'model', 'product_place',
        'capacity', 'useful', 'guarantee', 'intro', 'specifications', 'hp', 'price', 'price_old', 'status'
			],
			'order_by' => [
				'created' => 'desc'
			],
			'limit' => $pagination->per_page,
			'ofset' => $pagination->offset
		]);*/

		$query = \DB::query("select products.*, categories.name as namecate from products, categories where products.category_id = categories.id order by products.created desc limit ".$pagination->per_page." offset ".$pagination->offset);
		$listProducts = $query->execute()->as_array();

		$returnData['pagination'] = $pagination;
		$returnData['listProducts'] = $listProducts;
		$this->theme->get_template()->set('content', \View::forge('products/index', $returnData));
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
          "category_id" => $params['category_id'],
          "name" => $params['name'],
          "alias" => $params['alias'],
          "model" => $params['model'],
          "product_place" => $params['product_place'],
          "capacity" => $params['capacity'],
          "useful" => $params['useful'],
          "guarantee" => $params['guarantee'],
          "intro" => $params['intro'],
          "specifications" => $params['specifications'],
          "hp" => $params['hp'],
          "price" => ($params['price'] == "") ? 0 : $params['price'],
          "price_old" => ($params['price_old'] == "") ? 0 : $params['price_old'],
          "meta_key" => $params['meta_key'],
          "meta_desc" => $params['meta_desc'],
				];

        //check upload image
				if($_FILES && $_FILES['avatar']['name'] != ""){
					$config = \Controller_AdminBase::getConfigUpload();
					$status = \Model_Service_Upload::check_upload($config, "products/");
					if($status) {
            $data['avatar'] = $status[0]['saved_as'];
					}
				}


				try {
					\DB::start_transaction();
					$result = \Model_Base_Core::insertAll('products', $data);
					$idtag = true;
					if(!empty($params['tags'])) {
						$idtag = $this->addTagNews($params, $result[0]);
					}
					\DB::commit_transaction();
					if($result && $idtag) {
						return \Response::redirect('/admin/products');
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

		$listCategories = \Model_Base_Core::getAll('categories', [
				'select' => [
					'id', 'name'
				],
				'where' => [
					'active' => 1
				],
				'order_by' => [
					'id' => 'desc'
				]
		]);
		$returnData['listTags'] = $listTags;
		$returnData['listCategories'] = $listCategories;
		$this->theme->get_template()->set('content', \View::forge('products/add', $returnData));
	}

	public function action_edit($id = null)
	{
		if ($id != null && \Input::method() == "POST") {
			$params = \Input::post();

      if(empty($params['alias'])) {
				$params['alias'] = \Controller_AdminBase::convertVnToEn($params['title']);
			}
			//var_dump($this->validate($params));die;
      if($this->validate($params)) {

        $data = [];

        $data = [
          "category_id" => $params['category_id'],
          "name" => $params['name'],
          "alias" => $params['alias'],
          "model" => $params['model'],
          "product_place" => $params['product_place'],
          "capacity" => $params['capacity'],
          "useful" => $params['useful'],
          "guarantee" => $params['guarantee'],
          "intro" => $params['intro'],
          "specifications" => $params['specifications'],
          "hp" => $params['hp'],
          "price" => $params['price'],
          "price_old" => $params['price_old'],
          "meta_key" => $params['meta_key'],
          "meta_desc" => $params['meta_desc'],
				];

        //check upload image
				if($_FILES && $_FILES['avatar']['name'] != ""){
					$config = \Controller_AdminBase::getConfigUpload();
					$status = \Model_Service_Upload::check_upload($config, "products/");
					if($status) {
            $data['avatar'] = $status[0]['saved_as'];
					}
				}


				$arrWhere = [
					"id" => $id
				];
				try {
					\DB::start_transaction();
					$result = \Model_Base_Core::updateByWhere('products', $arrWhere, $data);
					$idtag = $this->updateTagProducts($params, $result, $id);
					\DB::commit_transaction();
					if($result && $idtag) {
						return \Response::redirect('/admin/products');
					}
				} catch (Exception $e) {
					\DB::rollback_transaction();
					\Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
				}
			}
		}

		if ($id != null) {
			$result = \Model_Base_Core::getOne('products', [
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
					'id', 'tag_id', 'products_id'
				],
				'where' => [
					'products_id' => $id
				],
				'order_by' => [
					'id' => 'desc'
				]
			]);

			$listCategories = \Model_Base_Core::getAll('categories', [
					'select' => [
						'id', 'name'
					],
					'where' => [
						'active' => 1
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
			$data['productsInfo'] = $result;
			$data['listMetaTag'] = $arrTag ;
			$this->theme->get_template()->set('content', \View::forge('products/edit', $data));
		}else{
			$this->theme->get_template()->set('content', \View::forge('products/index'));
		}
	}

	public function action_del()
	{
		if(\Input::method() == "POST"){
			$params = \Input::post();
			$arrWhere = [
					"id" => $params['productsid']
			];

			$productsDelInfo = \Model_Base_Core::getOne('products', $arrWhere);
			$statusDelImg = \Controller_AdminBase::removeImage(DOCROOT."assets/img/products/".$productsDelInfo['avatar']);

			if($statusDelImg){
				$result = \Model_Base_Core::deleteRowByWhere("products", $arrWhere);
				if($result) {
					return \Response::redirect('/admin/products');
				}
			}
		}
	}

	public function addTagProducts($params, $products)
	{
		if($products) {
			$data = [];
			foreach($params['tags'] as $ktag => $valtag) {
				$data = [
					"tag_id" => $valtag,
					"products_id" => $products
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

	public function updateTagProducts($params, $products, $id)
	{
		if($products && $id) {
			$data = [];
			$result = true;
			$arrDel = [
				"products_id" => $id
			];
			$numRow = \Model_Base_Core::getRowNum('metatags', $arrDel);
			if($numRow > 0){
				$resDel = \Model_Base_Core::deleteRowByWhere('metatags', $arrDel);
			}
			if(!empty($params['tags'])) {
				$result = $this->addTagProducts($params, $id);
			}
			return $result;
		} else {
			return false;
		}
	}

	public function action_categories()
	{
		$this->title = 'Welcome dienlanhdaiphu.com';
		$total = \Model_Base_Core::getRowNum('categories');

		$pagination = \Controller_AdminBase::getPagination([
			'url' => Uri::create('/admin/products/categories'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		$listCategories = \Model_Base_Core::getAll('categories', [
			'select' => [
				'id', 'name', 'active'
			],
			'order_by' => [
				'created' => 'desc'
			],
			'limit' => $pagination->per_page,
			'ofset' => $pagination->offset
		]);


		$returnData['pagination'] = $pagination;
		$returnData['listCategories'] = $listCategories;
		$this->theme->get_template()->set('content', \View::forge('products/categories/index', $returnData));
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
				$result = \Model_Base_Core::insertAll('categories', $data);
				if($result) {
					return \Response::redirect('/admin/products/categories');
				}
			}
		}
		$this->theme->get_template()->set('content', \View::forge('products/categories/add'));
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
				$result = \Model_Base_Core::updateByWhere('categories', $arrWhere, $data);
				if($result) {
					return \Response::redirect('/admin/products/categories');
				}
			}
		}

		if ($id != null) {
			$result = \Model_Base_Core::getOne('categories', [
				'where' => [
					'id' => $id
				]
			]);
			$data['productscate'] = $result;
			$this->theme->get_template()->set('content', \View::forge('products/categories/edit', $data));
		}else{
			$this->theme->get_template()->set('content', \View::forge('products/categories'));
		}
	}

	public function action_delcate()
	{
		if(\Input::method() == "POST"){
			$params = \Input::post();
			$arrWhere = [
					"id" => $params['cateid']
			];
			$result = \Model_Base_Core::deleteRowByWhere("categories", $arrWhere);
			if($result) {
				return \Response::redirect('/admin/products/categories');
			}
		}
	}

	public function action_tags()
	{
		$this->title = 'Welcome dienlanhdaiphu.com';

		$total = \Model_Base_Core::getRowNum('tags');

		$pagination = \Controller_AdminBase::getPagination([
			'url' => Uri::create('/admin/products/tags'),
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
		$this->theme->get_template()->set('content', \View::forge('products/tags/index', $returnData));
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
					return \Response::redirect('/admin/products/tags');
				}
			}
		}
		$this->theme->get_template()->set('content', \View::forge('products/tags/add'));
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
					return \Response::redirect('/admin/products/tags');
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
			$this->theme->get_template()->set('content', \View::forge('products/tags/edit', $data));
		}else{
			$this->theme->get_template()->set('content', \View::forge('products/tags/index'));
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
				return \Response::redirect('/admin/products/tags');
			}
		}
	}

	public function validate($params)
	{
		$val = \Validation::forge();
		$val->add_field('name', 'Title', 'required|trim');
		$val->add_field('alias', 'Alias', 'required|trim');

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
