<?php
/**
* base controller
*/
use Fuel\Core\Request;
use Fuel\Core\Controller_Template;

class Controller_AdminBase extends Controller_Template {
	protected $module;
    protected $sidebarActive = '';
    protected $title = 'Dienlanhdaiphu.com';
    public $is_login = false;
    // public $template = '';
	public function before()
    {
		$this->init();
        parent::before();
        $this->module = strtolower(Request::active()->module);
    }

    public function after($response)
    {
        $this->fetchTitle();
        if (empty($response) or !$response instanceof Response) {
            $response = \Response::forge(\Theme::instance()->render());
        }
        return parent::after($response);
    }

    public function fetchTitle()
    {
        $this->theme->get_template()->set_global('title', $this->title);
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

		public static function getConfigUpload()
		{
			$config = array(
				'path' => DOCROOT.DS.'public/upload/images/',
				'path_chmod' => 0777,
				'randomize' => true,
				'overwrite' => true,
				'max_size' => 5*(1024*1024),
				'ext_whitelist' => array('jpg', 'jpeg', 'gif', 'png'),
			);
			return $config;
		}

		public static function convertVnToEn($str)
		{
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
				$str = preg_replace("/( )/", '-', $str);
        return $str;
		}

		public static function removeImage($link) {
			if(file_exists($link)){
				if(unlink($link))
					return true;
				return false;
			}
			return false;
		}

    public function init()
    {
        //backend\
        $this->theme = Theme::instance();
        $this->theme->active('admin');
        // $this->template = $this->theme->get_template();
        $controller = strtolower(substr(Inflector::denamespace(Request::active()->controller), 11));
        $action = Request::active()->action;
        $this->is_login = \Model\User::is_login();
        // if($this->is_login)
        //     echo 'dsfsdf';die;
        $this->sidebarActive = $this->getActiveSidebar($controller, $action);

        if ($controller != 'auth') {
            $this->theme->set_template('index');
            $this->theme->set_partial('head', 'partials/head');
            $this->theme->set_partial('sidebar', 'partials/sidebar');
            $this->theme->set_partial('header', 'partials/header');
            $this->theme->set_partial('footer', 'partials/footer');
            $this->theme->get_template()->set_global('controller', $controller);
            $this->theme->get_template()->set_global('action', $action);
            $this->theme->get_template()->set_global('sidebarActive', $this->sidebarActive);
        } else {
            $this->theme->set_template('login');
        }
    }

    private function getActiveSidebar($controller, $action)
    {
        $response = '';
        // echo $controller.$action;die;
        switch ($controller.$action) {
            case 'homeindex':
                $response = 'welcome';
                break;
            case 'value':
                # code...
                break;
            default:
                # code...
                break;
        }
        return $response;
    }
}
?>
