<?php

use Fuel\Core\Upload;

class Model_Service_Upload
{

    public static function create_upload_folder()
    {
        if (!file_exists(DOCROOT . 'files')) {
            mkdir(DOCROOT . 'files', 0755);
        }
        if (!file_exists(DOCROOT . 'files' . DS . 'upload_temp')) {
            mkdir(DOCROOT . 'files' . DS . 'upload_temp', 0755);
        }
    }

    public static function check_upload($config = [], $url = "")
    {
        $error = [];
        $result = [];
        try {
            self::create_upload_folder();
            Upload::process($config);
        } catch (Exception $e) {
            $error['code'] = Api\Exception\ExceptionCode::E_UPLOAD_ERROR_NOT_FILE;
            return $error;
        }
        if (Upload::is_valid()) {
             Upload::save(DOCROOT.'assets/img/'.$url);
             $result = Upload::get_files();
        }
        foreach (Upload::get_errors() as $file) {
            $error['code'] = $file['errors']['0']['error'];
            $error['message'] = $file['errors']['0']['message'];
            return $error;
        }

        return $result;
    }

}
