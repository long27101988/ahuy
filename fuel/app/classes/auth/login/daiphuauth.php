<?php

/**
 * simpleauth basic login driver
 *
 * @package     Fuel
 * @subpackage  Auth
 */
class Auth_Login_DaiPhuAuth extends \Auth_Login_Driver
{

    /**
     * Load the config and setup the remember-me session if needed
     */
    public static function _init()
    {
        \Config::load('simpleauth', true);

        // setup the remember-me session object if needed
        if (\Config::get('simpleauth.remember_me.enabled', false)) {
            static::$remember_me = \Session::forge([
                    'driver' => 'cookie',
                    'cookie' => [
                        'cookie_name' => \Config::get('simpleauth.remember_me.cookie_name', 'rmcookie'),
                    ],
                    'encrypt_cookie' => true,
                    'expire_on_close' => false,
                    'expiration_time' => \Config::get('simpleauth.remember_me.expiration', 86400 * 31),
            ]);
        }
    }

    /**
     * @var  Database_Result  when login succeeded
     */
    protected $user = null;

    /**
     * @var  array  value for guest login
     */
    protected static $guest_login = [
        'id' => 0,
        'username' => 'guest',
        'group' => '0',
        'login_hash' => false,
        'email' => false,
    ];

    /**
     * @var  array  SimpleAuth class config
     */
    // protected $config = [
    //     'drivers' => ['group' => ['daiphugroup']],
    //     'additional_fields' => ['profile_fields'],
    // ];

    /**
     * Check for login
     *
     * @return  bool
     */
    protected function perform_check()
    {
        // fetch the username and login hash from the session
        $username = \Session::get('username');
        $login_hash = \Session::get('login_hash');

        // only worth checking if there's both a username and login-hash
        if (!empty($username) and ! empty($login_hash)) {
            if (is_null($this->user) or ( $this->user['username'] != $username)) {
                $this->user = \DB::select_array(\Config::get('simpleauth.table_columns', ['*']))
                        ->where('username', '=', $username)
                        ->from(\Config::get('simpleauth.table_name'))
                        ->execute(\Config::get('simpleauth.db_connection'))->current();
            }

            // return true when login was verified, and either the hash matches or multiple logins are allowed
            if ($this->user and ( \Config::get('simpleauth.multiple_logins', false) or $this->user['login_hash'] === $login_hash)) {
                return true;
            }
            // echo 'dsfsdf';
        }

        // not logged in, do we have remember-me active and a stored username?
        elseif (static::$remember_me and $username = static::$remember_me->get('username', null)) {
            return $this->force_login($username);
        }

        // no valid login when still here, ensure empty session and optionally set guest_login
        $this->user = \Config::get('simpleauth.guest_login', true) ? static::$guest_login : false;
        \Session::delete('username');
        \Session::delete('login_hash');

        return false;
    }

    /**
     * Check the user exists
     *
     * @return  bool
     */
    public function validate_user($username = '', $password = '')
    {
        $username = trim($username) ? : trim(\Input::post(\Config::get('simpleauth.username_post_key', 'username')));
        $password = trim($password) ? : trim(\Input::post(\Config::get('simpleauth.password_post_key', 'password')));

        if (empty($username) or empty($password)) {
            return false;
        }

        $password = $this->hash_password($password);
        $user = \DB::select_array(['id', 'username', 'fullname', 'birthday', 'email'])
                ->where('username', '=', $username)
                ->where('password', '=', $password)
                ->where('status', '=', 1)
                ->from(\Config::get('simpleauth.table_name'))
                ->execute(\Config::get('simpleauth.db_connection'))->current();

        return $user ? : false;
    }

    /**
     * Login user
     *
     * @param   string
     * @param   string
     * @return  bool
     */
    public function login($username = '', $password = '')
    {
        if (!($this->user = $this->validate_user($username, $password))) {
            \Session::delete('username');
            \Session::delete('login_hash');
            return false;
        }
        // register so Auth::logout() can find us

        Auth::_register_verified($this);
        \Session::set('username', $this->user['username']);
        \Session::set('login_hash', $this->create_login_hash());

        \Session::instance()->rotate();
        return true;
    }


    /**
     * Force login user
     *
     * @param   string
     * @return  bool
     */
    public function force_login($username = '')
    {
        if (empty($username)) {
            return false;
        }

        $this->user = \DB::select_array(\Config::get('simpleauth.table_columns', ['*']))
            ->where_open()
            ->where('username', '=', $username)
            ->where_close()
            ->from(\Config::get('simpleauth.table_name'))
            ->execute(\Config::get('simpleauth.db_connection'))
            ->current();

        if ($this->user == false) {
            // $this->user = \Config::get('simpleauth.guest_login', true) ? static::$guest_login : false;
            \Session::delete('username');
            \Session::delete('login_hash');
            return false;
        }

        \Session::set('username', $this->user['username']);
        \Session::set('login_hash', $this->create_login_hash());

        // and rotate the session id, we've elevated rights
        \Session::instance()->rotate();

        // register so Auth::logout() can find us
        Auth::_register_verified($this);

        return true;
    }

    /**
     * Logout user
     *
     * @return  bool
     */
    public function logout()
    {
        // $this->user = \Config::get('simpleauth.guest_login', true) ? static::$guest_login : false;
        \Session::delete('username');
        \Session::delete('login_hash');
        return true;
    }

    /**
     * Create new user
     *
     * @param   string
     * @param   string
     * @param   string  must contain valid email address
     * @param   int     group id
     * @param   Array
     * @return  bool
     */
    public function create_user($username, $password, $email, $system_role_cd = 1)
    {
        $password = trim($password);
        $email = filter_var(trim($email), FILTER_VALIDATE_EMAIL);

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

        $result = \DB::insert(\Config::get('simpleauth.table_name'))
            ->set($user)
            ->execute(\Config::get('simpleauth.db_connection'));

        return ($result[1] > 0) ? $result[0] : false;
        return false;
    }

    /**
     * Update a user's properties
     * Note: username cannot be updated, to update password the old password must be passed as old_password
     *
     * @param   Array  properties to be updated including profile fields
     * @param   string
     * @return  bool
     */
    public function update_user($values, $username = null)
    {
        $username = $username ? : $this->user['username'];
        $current_values = \DB::select_array(\Config::get('simpleauth.table_columns', ['*']))
            ->where('username', '=', $username)
            ->from(\Config::get('simpleauth.table_name'))
            ->execute(\Config::get('simpleauth.db_connection'));

        if (empty($current_values)) {
            throw new \SimpleUserUpdateException('username not found', 4);
        }

        $update = [];
        if (array_key_exists('username', $values)) {
            throw new \SimpleUserUpdateException('username cannot be changed.', 5);
        }
        if (array_key_exists('password', $values)) {
            if (empty($values['old_password'])
                or $current_values->get('password') != $this->hash_password(trim($values['old_password']))) {
                throw new \SimpleUserWrongPassword('Old password is invalid');
            }

            $password = trim(strval($values['password']));
            if ($password === '') {
                throw new \SimpleUserUpdateException('Password can\'t be empty.', 6);
            }
            $update['password'] = $this->hash_password($password);
            unset($values['password']);
        }
        if (array_key_exists('old_password', $values)) {
            unset($values['old_password']);
        }

        $update['updated_at'] = \Date::forge()->get_timestamp();

        $affected_rows = \DB::update(\Config::get('simpleauth.table_name'))
            ->set($update)
            ->where('username', '=', $username)
            ->execute(\Config::get('simpleauth.db_connection'));

        // Refresh user
        if ($this->user['username'] == $username) {
            $this->user = \DB::select_array(\Config::get('simpleauth.table_columns', ['*']))
                    ->where('username', '=', $username)
                    ->from(\Config::get('simpleauth.table_name'))
                    ->execute(\Config::get('simpleauth.db_connection'))->current();
        }

        return $affected_rows > 0;
    }

    /**
     * Change a user's password
     *
     * @param   string
     * @param   string
     * @param   string  username or null for current user
     * @return  bool
     */
    public function change_password($old_password, $new_password, $username = null)
    {
        try {
            return (bool) $this->update_user(['old_password' => $old_password, 'password' => $new_password], $username);
        }
        // Only catch the wrong password exception
        catch (SimpleUserWrongPassword $e) {
            return false;
        }
    }

    /**
     * Generates new random password, sets it for the given username and returns the new password.
     * To be used for resetting a user's forgotten password, should be emailed afterwards.
     *
     * @param   string  $username
     * @return  string
     */
    public function reset_password($username)
    {
        $new_password = \Str::random('alnum', 8);
        $password_hash = $this->hash_password($new_password);

        $affected_rows = \DB::update(\Config::get('simpleauth.table_name'))
            ->set(['password' => $password_hash])
            ->where('username', '=', $username)
            ->execute(\Config::get('simpleauth.db_connection'));

        if (!$affected_rows) {
            throw new \SimpleUserUpdateException('Failed to reset password, user was invalid.', 8);
        }

        return $new_password;
    }

    /**
     * Deletes a given user
     *
     * @param   string
     * @return  bool
     */
    public function delete_user($username)
    {
        if (empty($username)) {
            throw new \SimpleUserUpdateException('Cannot delete user with empty username', 9);
        }

        $affected_rows = \DB::delete(\Config::get('simpleauth.table_name'))
            ->where('username', '=', $username)
            ->execute(\Config::get('simpleauth.db_connection'));

        return $affected_rows > 0;
    }

    /**
     * Creates a temporary hash that will validate the current login
     *
     * @return  string
     */
    public function create_login_hash()
    {
        if (empty($this->user)) {
            throw new \SimpleUserUpdateException('User not logged in, can\'t create login hash.', 10);
        }

        $last_login = \Date::forge()->get_timestamp();
        $login_hash = sha1(\Config::get('simpleauth.login_hash_salt') . $this->user['username'] . $last_login);

        \DB::update(\Config::get('simpleauth.table_name'))
            ->set(['last_login' => $last_login, 'login_hash' => $login_hash])
            ->where('username', '=', $this->user['username'])
            ->execute(\Config::get('simpleauth.db_connection'));

        $this->user['login_hash'] = $login_hash;

        return $login_hash;
    }

    /**
     * Get the user's ID
     *
     * @return  Array  containing this driver's ID & the user's ID
     */
    public function get_user_id()
    {
        if (empty($this->user)) {
            return false;
        }

        return [$this->id, (int) $this->user['id']];
    }

    /**
     * Get the user's groups
     *
     * @return  Array  containing the group driver ID & the user's group ID
     */
    public function get_groups()
    {
        if (empty($this->user)) {
            return false;
        }

        return [['Simplegroup', $this->user['group']]];
    }

    /**
     * Getter for user data
     *
     * @param  string  name of the user field to return
     * @param  mixed  value to return if the field requested does not exist
     *
     * @return  mixed
     */
    public function get($field, $default = null)
    {
        if (isset($this->user[$field])) {
            return $this->user[$field];
        } else {
            return $this->user;
        }
        return $default;
    }

    /**
     * Get the user's email
     *
     * @return  string
     */
    public function get_email()
    {
        return $this->get('email', false);
    }

    /**
     * Get the user's screen_name
     *
     * @return  string
     */
    public function get_screen_name()
    {
        return false;
    }

    /**
     * Extension of base driver method to default to user group instead of user id
     */
    public function has_access($condition, $driver = null, $user = null)
    {
        if (is_null($user)) {
            $groups = $this->get_groups();
            $user = reset($groups);
        }
        return parent::has_access($condition, $driver, $user);
    }

    /**
     * Extension of base driver because this supports a guest login when switched on
     */
    public function guest_login()
    {
        return \Config::get('simpleauth.guest_login', true);
    }

}
