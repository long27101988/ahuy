<?php
session_start();
use Fuel\Core\View;

class Controller_Product extends Controller_Base
{
	public function before()
	{
		parent::before();
	}

	public function action_index()
	{
		$total = Model_Base_Core::getRowNum('products', [
			'where' => [
				'active' => 1,
			]
		]);
		$pagination = Controller_Base::getPagination([
			'url' => Uri::create('san-pham'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		$repsonse['listProducts'] = Model_Base_Core::getAll('products', [
			// 'select' => [
			// 	'id', 'title', 'alias','avartar' ,'short_content', 'created', 'hits'
			// ],
			'where' => [
				'active' => 1,
			],
			'order_by' => [
				'created' => 'desc'
			],
			'limit' => $pagination->per_page,
			'ofset' => $pagination->offset
		]);

		$repsonse['pagination'] = $pagination;
		$repsonse['test'] = \Session::get("shoppingcart", []);
		$this->theme->get_template()->set('titlepage', "Danh sach cac san pham dien lanh");
		$this->theme->get_template()->set('content', View::forge('products/index', $repsonse));
	}

	public function action_addshop() {

		if(\Input::method() == "POST"){
			$params = \Input::post();
			$data['shopping'] = [];
			if(!empty($params)) {
				$arrShoppingCart = Session::get("shoppingcart", []);
				if($arrShoppingCart && $arrShoppingCart['shopping'][$params['pid']]) {
					$dataUpdate = $arrShoppingCart['shopping'][$params['pid']];
					$dataUpdate['number'] = $dataUpdate['number'] + 1;
					$dataUpdate['total'] = $dataUpdate['price'] * ($dataUpdate['number'] + 1);
					$arrShoppingCart['shopping'][$params['pid']] = $dataUpdate;
					Session::set('shoppingcart', $arrShoppingCart);
					Session::write();
				} else {
					$arrProductInfo = DB::query("select id, name, avatar, model, price, product_place from products where id = '{$params['pid']}'")->execute()->as_array();
					$arrProductInfo[0]['number'] = 1;
					$arrProductInfo[0]['total'] = $arrProductInfo[0]['price'] * 1;
					$data['shopping'][$arrProductInfo[0]['id']] = $arrProductInfo[0];
					Session::set('shoppingcart', $data);
					Session::write();
				}
			}
		}
	}

	public function action_detail($alias = null)
	{
		$product = Model_Base_Core::getOne('products', [
			'where' => [
				'alias' => $alias,
				'active' => 1,
			]
		]);


		$tags = [];
		if (!$product || $product == null) {
			return \Response::redirect('san-pham');
		}
		$tags = \DB::select('t.id', 't.t_name', 't.alias')
				->from(\DB::expr('tags t'))
				->join(\DB::expr('metatags as mt'))
				->on('mt.tag_id', '=', 't.id')
				->where('mt.products_id', $product['id'])
				->execute()->as_array();

		$relateProducts  = \DB::query("
			select id, name, alias, avatar, price, created from products where id < ". $product['id'] . "
			union
			select id, name, alias, avatar, price, created from products where id > ". $product['id'] . "  order by id asc limit 6
		")->execute()->as_array();

		$response['product'] = $product;
		$response['tags'] = $tags;
		$response['relateProducts'] = $relateProducts;
		$this->theme->get_template()->set('content', View::forge('products/detail', $response));
	}

	public function action_payment()
	{
		if(\Input::method() == "POST") {
				$params = \Input::post();
				$listShoppingCart = \Session::get("shoppingcart", []);
				$allTotal = 0;
				if(!empty($listShoppingCart)) {
					foreach($listShoppingCart['shopping'] as $keyItem => $valItem){
						$allTotal += $valItem['total'];
					}
				}
				$data = [
          "name_order" => $params['name_order'],
          "email_order" => $params['email_order'],
          "address_order" => $params['address_order'],
          "name_ship" => $params['name_ship'],
          "email_ship" => $params['email_ship'],
          "address_ship" => $params['address_ship'],
          "note" => $params['note'],
          "total" => $allTotal
				];
				try {
					\DB::start_transaction();
					$result = \Model_Base_Core::insertAll('orders', $data);
					\DB::commit_transaction();
					\Session::delete('shoppingcart');
					return Response::redirect('san-pham');
				} catch (Exception $e) {
					\DB::rollback_transaction();
					\Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
					return Response::redirect('san-pham');
				}


		}

		$repsonse['listShoppingCart'] = \Session::get("shoppingcart", []);
		$this->theme->get_template()->set('content', View::forge('products/payment'));
	}
}
