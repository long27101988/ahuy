<?php
/**
* base controller
*/
use Fuel\Core\Request;
use Fuel\Core\Controller_Template;

class Controller_Base extends Controller_Template {
	protected $module;
    // public $template = 'template';
	public function before()
    {
		$this->init();
        parent::before();
        $this->module = strtolower(Request::active()->module);
	}

	public function after($response)
    {
        if (empty($response) or !$response instanceof Response) {
            $response = \Response::forge(\Theme::instance()->render());
        }
        return parent::after($response);
    }

    public static function getPagination($params)
    {	
        try {
            $config = array(
                'pagination_url' => $params['url'],
                'total_items' => !empty($params['total'])? $params['total']: 10,
                'per_page' => !empty($params['item_per_page'])? $params['item_per_page']: 10,
                'uri_segment' => 3,
                'name' => !empty($params['name'])? $params['name']: 'bootstrap3',
                'uri_segment' => !empty($params['segment'])? $params['segment']: 'page',
            );
            $pagination = Pagination::forge('mypagination', $config);
            return $pagination;
        } catch (Exception $e) {
            Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
        }
        return false;
    }


    public function init()
    {
        //frontend\
        $this->theme = Theme::instance();
        $this->theme->active('main');
        $controller = strtolower(substr(Inflector::denamespace(Request::active()->controller), 11));
        $action = Request::active()->action;
        if ($controller == 'index') {
                $this->theme->set_template('index');
                $this->theme->set_partial('header', 'partials/header');
                $this->theme->set_partial('footer', 'partials/footer');
        } else {
            echo "day ne main"; die;
            $this->theme->set_template('main');
            $this->theme->set_partial('banner', 'partials/banner');
            $this->theme->set_partial('brearcrumbs', 'partials/breadcrumbs');
            $this->theme->get_template()->set_global('mainClass', $this->getMainClassContent($controller, $action));

            $this->theme->get_template()->set_global('sidebar', \View::forge('elements/sidebar'));
            // $this->theme->get_template()->set_global('banner', \View::forge('elements/banner'));
            // $this->theme->get_template()->set_global('brearcrumbs', \View::forge('elements/sidebar'));

            $response['listProjects'] = [];
            $this->theme->set_partial('header', 'partials/header')->set('listProjects', $response);
            $this->theme->set_partial('footer', 'partials/footer');
        }
        $this->theme->get_template()->set_global('controller', $controller);
        $this->theme->get_template()->set_global('action', $action);
    }

    private function getMainClassContent($controller, $action)
    {
        $class = '';
        switch ($controller) {
            case 'news':
                if ($action == 'index') {
                    $class = 'news';
                } else {
                    $class = 'news';
                }
                break;

            case 'product':
                if ($action == 'index') {
                    $class = 'products';
                } else {
                    $class = 'project-details';
                }
                break;
            // chuyen view dich ve sang cho du an

            case 'service':
                if ($action == 'index' || $action == 'tags') {
                    $class = 'projects';
                } else {
                    $class = 'project-details';
                }
                break;

            case 'project':
                if ($action == 'index') {
                    $class = 'services';
                } else {
                    $class = 'service-details';
                }
                break;

            default:
                # code...
                break;
        }
        return $class;
    }


}
?>
