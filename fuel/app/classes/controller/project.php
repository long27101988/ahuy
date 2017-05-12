<?php 
use Fuel\Core\View;

class Controller_Project extends Controller_Base
{
	public function before() 
	{
		parent::before();
	}

	public function action_index() 
	{
		$total = Model_Base_Core::getRowNum('projects', [
			'where' => [
				'status' => 1,
			]
		]);
		$pagination = Controller_Base::getPagination([
			'url' => Uri::create('du-an'),
			'total' => $total,
			'item_per_page' => 10,
		]);

		$listProjects = Model_Base_Core::getAll('projects', [
			'select' => [
				'id', 'title', 'alias','avartar' ,'short_content', 'created'
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
		$returnData['listProjects'] = $listProjects;

		$this->theme->get_template()->set('content', View::forge('project/index', $returnData));
	}

	public function action_detail($alias = null) 
	{
		$project = Model_Base_Core::getOne('projects', [
			'where' => [
				'alias' => $alias,
				'status' => 1,
			]
		]);
		$galleries = [];
		if (!$project || $project == null) {
			return \Response::redirect('du-an');
		}

		$galleries = Model_Base_Core::getAll('galleries', [
			'where' => [
				'project_id' => $project['id'],
				'status' => 1,
			]
		]);

		//relate project
		// $project

		$relateProjects  = \DB::query("
			select id, title, alias, avartar, created from projects where id < ". $project['id'] . "
			union
			select id, title, alias, avartar, created from projects where id > ". $project['id'] . "  order by id asc limit 3
		")->execute()->as_array();
		
		$response['project'] = $project;
		$response['galleries'] = $galleries;
		$response['relateProjects'] = $relateProjects;
		$this->theme->get_template()->set('content', View::forge('project/detail', $response));
	}
}