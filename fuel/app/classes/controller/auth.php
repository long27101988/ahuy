<?php

use Fuel\Core\View;
use Fuel\Core\Uri;
use Fuel\Core\Response;
use \Auth\Auth;
use \Controller_AdminBase as Controller_AdminBase;

class Controller_Auth extends Controller_AdminBase
{

    public function before()
    {
        parent::before();
    }

    public function after($response)
    {
        $response = parent::after($response);
        return $response;
    }

    public function action_login()
    {
        if ($this->is_login) {
            Response::redirect('/admin');
        }
        if(\Input::post()) {
            $params = \Input::post();
            if (Auth::instance()->login($params['username'], $params['password'])) {
                Response::redirect(Uri::create('admin'));
            }
        }

        $this->theme->get_template()->set('content', View::forge('auth/login'));
    }



    /*public function action_createuser()
    {
        $params = \Input::post();
        $password = trim($params['password']);
        $email = filter_var(trim($params['email']), FILTER_VALIDATE_EMAIL);
        $username = trim($params['username']);
        $fullname = trim($params['fullname']);

        if (empty($username) or empty($password) or empty($email)) {
            throw new \SimpleUserUpdateException('username or password is not given', 1);
        }

        $same_users = \DB::select_array(\Config::get('simpleauth.table_columns', ['*']))
            ->where('username', '=', $username)
            ->from(\Config::get('simpleauth.table_name'))
            ->execute(\Config::get('simpleauth.db_connection'));

        if ($same_users->count() > 0) {
            throw new \SimpleUserUpdateException('username already exists', 3);
        }


        $password = \Auth::instance()->hash_password($password);
        $query = \DB::insert('users');

        $query->columns(array(
          'username',
          'password',
          'fullname',
          'last_login',
          'login_hash',
          'email',
        ));

        $query->values(array(
          $username,
          $password,
          $fullname,
          0,
          "",
          $email

        ));
        $result = $query->execute();

        return ($result[1] > 0) ? $result[0] : false;
        return false;
    }*/

    public function action_logout()
    {
        Auth::dont_remember_me();
        Auth::logout();
        Response::redirect('/auth');
    }

    public function action_forgot()
    {
        if ($this->is_login) {
            Response::redirect('/');
        }
        $this->theme->get_template()->set('content', View::forge($this->controller . '/' . $this->action));
    }



    public function action_new_password($forgot_token = null)
    {
        if ($this->is_login) {
            Response::redirect('/');
        }
        if (empty($forgot_token)) {
            Response::redirect('/auth/forgot');
        }
        if (!Model_Base_Core::validField('Model_MEmployee', 'forgot_token', $forgot_token)) {
            Response::redirect('/auth/forgot');
        }
        $this->theme->get_template()->set('content', View::forge($this->controller . '/' . $this->action, ['forgot_token' => $forgot_token]));
    }

    public function action_confirm($type = 1)
    {
        if ($this->is_login) {
            Response::redirect('/');
        }
        $data['message'] = $type == 1 ? 'Please check your email' : 'Change password success';
        $this->theme->get_template()->set('content', View::forge($this->controller . '/' . $this->action, $data));
    }

}
