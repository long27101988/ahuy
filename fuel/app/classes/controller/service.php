<?php 
use Fuel\Core\View;
use Fuel\Core\Security;

class Controller_Service extends Controller_Base
{
	public function before() 
	{
		parent::before();
	}

	public function action_index($alias = null) 
	{
		$total = Model_Base_Core::getRowNum('services', [
			'where' => [
				'status' => 1,
			]
		]);
		$pagination = Controller_Base::getPagination([
			'url' => Uri::create('dich-vu'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		$listServices = Model_Base_Core::getAll('services', [
			'select' => [
				'id', 'title', 'alias','avatar' ,'short_content', 'created'
			],
			'where' => [
				'status' => 1,
			],
			'order_by' => [
				'created' => 'desc'	
			],
			'limit' => $pagination->per_page,
			'ofset' => $pagination->offset
		]);
		$returnData['pagination'] = $pagination;
		$returnData['listServices'] = $listServices;
		$this->theme->get_template()->set('content', View::forge('services/index', $returnData));
	}

	public function action_tags($alias = null) 
	{
		$listServiceId = [];
		if ($alias) {
			$listServiceId = \DB::select('m.service_id')
			->from( \DB::expr('metatags as m'))
			->join(\DB::expr('tags as t'))
			->on('t.id', '=','m.tag_id')
			->where('t.alias', $alias)
			->group_by('m.service_id')
			->execute()->as_array();
			$listServiceId = array_column($listServiceId, 'service_id');
		} 

		if (!$alias || !$listServiceId) {
			return \Response::redirect('dich-vu');
		}
		
		$total = Model_Base_Core::getRowNum('services', [
			'where' => [
				'status' => 1,
				['id', 'in' , $listServiceId]
			]
		]);
		$pagination = Controller_Base::getPagination([
			'url' => Uri::create('dich-vu'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		$listServices = Model_Base_Core::getAll('services', [
			'select' => [
				'id', 'title', 'alias','avatar' ,'short_content', 'created'
			],
			'where' => [
				'status' => 1,
				['id', 'in' , $listServiceId]
			],
			'order_by' => [
				'created' => 'desc'	
			],
			'limit' => $pagination->per_page,
			'ofset' => $pagination->offset
		]);
		$returnData['pagination'] = $pagination;
		$returnData['listServices'] = $listServices;
		$this->theme->get_template()->set('content', View::forge('services/index', $returnData));
	}

	public function action_detail($alias = null) 
	{
		$service = Model_Base_Core::getOne('services', [
			'where' => [
				'alias' => $alias,
				'status' => 1,
			]
		]);
		$tags = [];
		if (!$service || $service == null) {
			return \Response::redirect('dich-vu');
		}

		$tags = \DB::select('t.id', 't.t_name', 't.alias')
				->from(\DB::expr('tags t'))
				->join(\DB::expr('metatags as mt'))
				->on('mt.tag_id', '=', 't.id')
				->where('mt.service_id', $service['id'])
				->execute()->as_array();
		// //relate service
		// // $service

		$relateServices  = \DB::query("
			select id, title, alias, avatar, created from services where id < ". $service['id'] . "
			union
			select id, title, alias, avatar, created from services where id > ". $service['id'] . "  order by id asc limit 3
		")->execute()->as_array();
		
		$response['service'] = $service;
		$response['tags'] = $tags;
		$response['relateServices'] = $relateServices;
		$this->theme->get_template()->set('content', View::forge('services/detail', $response));
	}
}