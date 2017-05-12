<?php

use Fuel\Core\Fuel,
    Fuel\Core\Config,
    Fuel\Core\Log;

class Model_Service_Util
{

    protected static $hasher = null;
    private static $messages = [
        JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded',
        JSON_ERROR_STATE_MISMATCH => 'Syntax error, malformed JSON',
        JSON_ERROR_CTRL_CHAR => 'Unexpected control character found',
        JSON_ERROR_SYNTAX => 'Syntax error, malformed JSON',
        5 /* JSON_ERROR_UTF8 */ => 'Invalid UTF-8 sequence',
        6 /* JSON_ERROR_RECURSION */ => 'Recursion detected',
        7 /* JSON_ERROR_INF_OR_NAN */ => 'Inf and NaN cannot be JSON encoded',
        8 /* JSON_ERROR_UNSUPPORTED_TYPE */ => 'Type is not supported',
    ];

    public static function mb_trim($str)
    {
        $str = trim(preg_replace('/(^\s+)|(\s+$)/us', '', $str));
        return preg_replace('/\t+/', ' ', $str);
    }

    public static function _empty($val)
    {
        return ($val === false or $val === null or $val === '' or $val === []);
    }

    public static function gen_code($code = null)
    {
        if ($code) {
            return md5($code . Config::get('auth.salt') . uniqid() . time());
        } else {
            return md5(Config::get('auth.salt') . uniqid() . time());
        }
    }

    public static function hash_password($password)
    {
        is_null(self::$hasher) and self::$hasher = new \PHPSecLib\Crypt_Hash();
        return base64_encode(self::$hasher->pbkdf2($password, Config::get('auth.salt'), Config::get('auth.iterations', 10000), 32));
    }

    public static function get_app_config($name, $option = [])
    {
        $data = [];
        $config = Config::get('app.' . $name);
        foreach ($option as $key) {
            $data[$key] = $config[$key];
        }

        return !empty($option) ? $data : $config;
    }

    public static function send_mail($mail_data, $option = null)
    {
        $mail_data = base64_encode(json_encode($mail_data));
        $option = base64_encode(json_encode($data));
        $oil_path = str_replace('\\', '/', realpath(APPPATH . '/../../'));
        $command = "env FUEL_ENV=" . Fuel::$env . " php $oil_path/oil r tool:send_mail '$mail_data' '$option' > /dev/null &";
        try {
            exec($command);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return false;
        }

        return true;
    }

    public static function convertDateTimeFormat($sDateTime, $sFromFormat, $sToFormat = 'Y-m-d H:i:s')
    {
        $dr = date_create_from_format($sFromFormat, $sDateTime);
        return $dr ? $dr->format($sToFormat) : '';
    }

    public static function coverArrToString($arrInput, $sKey = 'id')
    {
        $sResult = "";
        foreach ($arrInput as $item) {
            $sResult .= "'" . $item[$sKey] . "',";
        }
        $sResult = substr($sResult, 0, -1);
        return !$sResult ? "0" : $sResult;
    }

    public static function extractArr($arrInput, $sKey = 'id')
    {
        $arrResult = [];
        foreach ($arrInput as $item) {
            $arrResult[] = $item[$sKey];
        }
        return $arrResult;
    }

    public static function groupArrBykey($arrInput, $sField = 'id')
    {
        $arrResult = [];
        foreach ($arrInput as $item) {
            $arrResult[$item[$sField]][] = $item;
        }
        return $arrResult;
    }
    
    
    public static function reindexArrBykey($arrInput, $sField = 'id')
    {
        $arrResult = [];
        foreach ($arrInput as $item) {
            $arrResult[$item[$sField]] = $item;
        }
        return $arrResult;
    }

    public static function convertToArray($arrInput, $del_key = [])
    {
        $arrResult = [];
        foreach ($arrInput as $item) {
            $newItem = $item->to_array();
            if (!empty($del_key)) {
                foreach ($newItem as $key => $value) {
                    if (in_array($key, $del_key)) {
                        unset($newItem[$key]);
                    }
                }
            }
            $arrResult[] = $newItem;
        }
        return $arrResult;
    }

    public static function json_encode($value)
    {
        // needed to receive 'Invalid UTF-8 sequence' error; PHP bugs #52397, #54109, #63004
        if (function_exists('ini_set')) { // ini_set is disabled on some hosts :-(
            $old = ini_set('display_errors', 0);
        }

        // needed to receive 'recursion detected' error
        set_error_handler(function($severity, $message) {
            restore_error_handler();
            throw new JsonException($message);
        });

        $json = json_encode($value);

        restore_error_handler();
        if (isset($old)) {
            ini_set('display_errors', $old);
        }
        if ($error = json_last_error()) {
            $message = isset(static::$messages[$error]) ? static::$messages[$error] : 'Unknown error';
            throw new JsonException($message, $error);
        }
        return $json;
    }

    public static function json_decode($json)
    {
        if (!preg_match('##u', $json)) {
            throw new JsonException('Invalid UTF-8 sequence', 5);
        }

        $value = json_decode($json);
        if ($value === NULL && $json !== '' && $json !== 'null') {
            $error = json_last_error();
            $message = isset(static::$messages[$error]) ? static::$messages[$error] : 'Unknown error';
            throw new JsonException($message, $error);
        }
        return $value;
    }

    public static function rrmdir($dir, $root = 0)
    {
        if ((time() - @filectime($dir)) > 3600) {
            if (is_dir($dir)) {
                $objects = scandir($dir);
                foreach ($objects as $object) {
                    if ($object != '.' && $object != '..') {
                        if (filetype($dir . DS . $object) == 'dir') {
                            self::rrmdir($dir . DS . $object);
                        } else {
                            unlink($dir . DS . $object);
                        }
                    }
                }
                reset($objects);
                if (!$root) {
                    rmdir($dir);
                }
            }
        }
    }

}
