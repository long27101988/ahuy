<?php 
use Model\Base\Core;
use Fuel\Core\View;
use \Fuel\Core\Uri;

class Controller_News extends Controller_Base
{
	public function before() 
	{
		parent::before();
	}

	public function action_index() 
	{
		//phat trien tiep chia category .. 
		$topNews = Model_Base_Core::getAll('news', [
			'select' => [
				'id', 'title', 'alias','avartar' ,'short_content', 'created', 'hits'
			],
			'where' => [
				'status' => 1,
			],
			'order_by' => [
				'created' => 'desc'	
			],
			'limit' => 4
		]);

		$listTopId = [];
		if ($topNews) {
			foreach ($topNews as $item) {
				$listTopId[] = $item['id'];
 			}
		}
		
		$total = Model_Base_Core::getRowNum('news', [
			'where' => [
				'status' => 1,
				['id', 'not in', $listTopId]
			]
		]);
		$pagination = Controller_Base::getPagination([
			'url' => Uri::create('tin-tuc'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		$listNews = Model_Base_Core::getAll('news', [
			'select' => [
				'id', 'title', 'alias','avartar' ,'short_content', 'created', 'hits'
			],
			'where' => [
				'status' => 1,
				['id', 'not in', $listTopId]
			],
			'order_by' => [
				'created' => 'desc'	
			],
			'limit' => $pagination->per_page,
			'ofset' => $pagination->offset
		]);

		$returnData['pagination'] = $pagination;
		$returnData['topNews'] = $topNews;
		$returnData['listNews'] = $listNews;
		$this->theme->get_template()->set('content', View::forge('news/index', $returnData));
	}

	public function action_tags($alias = null) 
	{
		$listServiceId = [];
		if ($alias) {
			$listNewsId = \DB::select('m.news_id')
			->from( \DB::expr('metatags as m'))
			->join(\DB::expr('tags as t'))
			->on('t.id', '=','m.tag_id')
			->where('t.alias', $alias)
			->group_by('m.news_id')
			->execute()->as_array();
			$listNewsId = array_column($listNewsId, 'news_id');
		} 

		if (!$alias || !$listNewsId) {
			return \Response::redirect('tin-tuc');
		}
		
		$total = Model_Base_Core::getRowNum('news', [
			'where' => [
				'status' => 1,
				['id', 'in' , $listNewsId]
			]
		]);
		$pagination = Controller_Base::getPagination([
			'url' => Uri::create('tin-tuc'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		$listNews = Model_Base_Core::getAll('news', [
			'select' => [
				'id', 'title', 'alias','avartar' ,'short_content', 'created', 'hits'
			],
			'where' => [
				'status' => 1,
				['id', 'in' , $listNewsId]
			],
			'order_by' => [
				'created' => 'desc'	
			],
			'limit' => $pagination->per_page,
			'ofset' => $pagination->offset
		]);

		$returnData['pagination'] = $pagination;
		$returnData['listNews'] = $listNews;
		$this->theme->get_template()->set('content', View::forge('news/index', $returnData));
	}

	public function action_detail($alias = null) 
	{
		$news = Model_Base_Core::getOne('news', [
			'where' => [
				'alias' => $alias,
				'status' => 1,
			]
		]);
		$tags = [];
		if (!$news || $news == null) {
			return \Response::redirect('tin-tuc');
		}

		$tags = \DB::select('t.id', 't.t_name', 't.alias')
				->from(\DB::expr('tags t'))
				->join(\DB::expr('metatags as mt'))
				->on('mt.tag_id', '=', 't.id')
				->where('mt.news_id', $news['id'])
				->execute()->as_array();
		$relateNews  = \DB::query("
			select id, title, alias, avartar, created from news where id < ". $news['id'] . "
			union
			select id, title, alias, avartar, created from news where id > ". $news['id'] . "  order by id asc limit 4
		")->execute()->as_array();
		
		$response['news'] = $news;
		$response['tags'] = $tags;
		$response['relateNews'] = $relateNews;
		$this->theme->get_template()->set('content', View::forge('news/detail', $response));
	}
}