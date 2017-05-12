<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

ERROR - 2016-09-02 06:00:08 --> Notice - Undefined property: Controller_Auth::$controller in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/controller/auth.php on line 50
ERROR - 2016-09-02 06:01:37 --> Notice - Undefined property: Controller_Auth::$controller in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/controller/auth.php on line 50
ERROR - 2016-09-02 06:01:50 --> Notice - Undefined property: Controller_Auth::$controller in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/controller/auth.php on line 50
ERROR - 2016-09-02 06:17:01 --> Notice - Undefined variable: user in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/controller/auth.php on line 59
ERROR - 2016-09-02 06:20:08 --> Fatal Error - Call to undefined method Controller_Auth::hash_password() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/controller/auth.php on line 67
ERROR - 2016-09-02 06:21:43 --> Runtime Notice - Non-static method Auth\Auth_Login_Driver::hash_password() should not be called statically, assuming $this from incompatible context in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/controller/auth.php on line 67
ERROR - 2016-09-02 06:22:49 --> Runtime Recoverable error - Argument 1 passed to Fuel\Core\Database_Query_Builder_Insert::set() must be of the type array, null given, called in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/controller/auth.php on line 76 and defined in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/database/query/builder/insert.php on line 123
ERROR - 2016-09-02 06:28:13 --> Notice - Undefined variable: result in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/controller/auth.php on line 78
ERROR - 2016-09-02 06:28:47 --> 1364 - SQLSTATE[HY000]: General error: 1364 Field 'fullname' doesn't have a default value with query: "INSERT INTO `users` (`username`, `password`, `email`) VALUES ('long27101988', 'DY44FzcJ7eDr7TQzhKHD9/HxzWOYS+unMgpYR9KuA34=', 'mrlong1206@gmail.com')" in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/database/pdo/connection.php on line 253
ERROR - 2016-09-02 06:30:05 --> 1364 - SQLSTATE[HY000]: General error: 1364 Field 'last_login' doesn't have a default value with query: "INSERT INTO `users` (`username`, `password`, `fullname`, `email`) VALUES ('long27101988', 'DY44FzcJ7eDr7TQzhKHD9/HxzWOYS+unMgpYR9KuA34=', 'cao hoang long', 'mrlong1206@gmail.com')" in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/database/pdo/connection.php on line 253
ERROR - 2016-09-02 06:30:52 --> Warning - date() expects at least 1 parameter, 0 given in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/controller/auth.php on line 77
ERROR - 2016-09-02 06:31:16 --> 1364 - SQLSTATE[HY000]: General error: 1364 Field 'login_hash' doesn't have a default value with query: "INSERT INTO `users` (`username`, `password`, `fullname`, `last_login`, `email`) VALUES ('long27101988', 'DY44FzcJ7eDr7TQzhKHD9/HxzWOYS+unMgpYR9KuA34=', 'cao hoang long', 0, 'mrlong1206@gmail.com')" in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/database/pdo/connection.php on line 253
ERROR - 2016-09-02 06:31:45 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'login_hash' cannot be null with query: "INSERT INTO `users` (`username`, `password`, `fullname`, `last_login`, `login_hash`, `email`) VALUES ('long27101988', 'DY44FzcJ7eDr7TQzhKHD9/HxzWOYS+unMgpYR9KuA34=', 'cao hoang long', 0, null, 'mrlong1206@gmail.com')" in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/database/pdo/connection.php on line 253
ERROR - 2016-09-02 07:20:13 --> Fatal Error - Class 'Admin\Model_Base_Core' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 24
ERROR - 2016-09-02 07:46:24 --> Fatal Error - Call to undefined method Model_Base_Core::getPagination() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 26
ERROR - 2016-09-02 07:48:46 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:49:35 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:49:36 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:49:37 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:49:38 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:50:13 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:24 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:24 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:25 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:25 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:26 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:27 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:27 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:27 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:28 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:28 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:28 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:28 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:28 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:29 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:29 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:29 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:30 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:30 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:51:39 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:52:13 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:52:43 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:52:44 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:55:18 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:55:57 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 07:56:15 --> Fatal Error - Class 'Admin\AdminBase' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 26
ERROR - 2016-09-02 07:56:33 --> Fatal Error - Class 'AdminBase' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 26
ERROR - 2016-09-02 07:56:59 --> Fatal Error - Class 'AdminBase' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 26
ERROR - 2016-09-02 07:57:20 --> Fatal Error - Class 'Admin\Base' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 26
ERROR - 2016-09-02 07:57:42 --> Fatal Error - Class 'AdminBase' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 26
ERROR - 2016-09-02 07:57:43 --> Fatal Error - Class 'AdminBase' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 26
ERROR - 2016-09-02 07:59:33 --> Fatal Error - Class 'Admin\Model_Base_Core' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 32
ERROR - 2016-09-02 07:59:42 --> Notice - Undefined index: avartar in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/views/news/index.php on line 64
ERROR - 2016-09-02 08:00:18 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:00:21 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:00:21 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:00:21 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:00:21 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:00:28 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:00:40 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:02 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:04 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:04 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:04 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:04 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:05 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:05 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:06 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:10 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:12 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:12 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:12 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:27 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:01:27 --> Error - The requested view could not be found: /news/index.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:36 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:01:36 --> Notice - Undefined variable: sidebar in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/views/news/index.php on line 133
ERROR - 2016-09-02 08:01:41 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:01:41 --> Error - The requested view could not be found: /news/index.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:01:59 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:02:04 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:02:31 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:02:46 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:02:52 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:02:52 --> Error - The requested view could not be found: /index.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:03:09 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:03:09 --> Notice - Undefined index: extension in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 452
ERROR - 2016-09-02 08:03:15 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:03:26 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:03:44 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:04:08 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:04:08 --> Error - The requested view could not be found: /news/index.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:04:18 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:04:18 --> Error - The requested view could not be found: /news/index.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:04:24 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:04:24 --> Error - The requested view could not be found: admin/news/index.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:04:33 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:04:47 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:04:47 --> Notice - Undefined variable: sidebar in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/views/news/index.php on line 133
ERROR - 2016-09-02 08:05:26 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:06:14 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:06:27 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:06:29 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:06:30 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:06:30 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:06:53 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:07:52 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:07:53 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:07:54 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:07:54 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:07:54 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:07:55 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:09 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:10 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:11 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:11 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:12 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:12 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:12 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:13 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:14 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:14 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:14 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:14 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:15 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:25 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:26 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:27 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:31 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:32 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:32 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:32 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:32 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:50 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:09:51 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:10:24 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:10:25 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:10:25 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:10:26 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:10 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:16 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:17 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:17 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:17 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:17 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:24 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:24 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:25 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:25 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:25 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:25 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:25 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:29 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:50 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:51 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:51 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:11:52 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:12:05 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:12:06 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:12:07 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:12:07 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:12:08 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:12:11 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:12:39 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:12:39 --> Error - The requested view could not be found: admin::news/index.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:13:14 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:14:05 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:14:05 --> Notice - Undefined variable: sidebar in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/views/news/index.php on line 133
ERROR - 2016-09-02 08:14:59 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:17:03 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:17:27 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:17:28 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:22:20 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:24:17 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:24:18 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:24:19 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:24:20 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:24:21 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:26:00 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:26:01 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:26:01 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:26:02 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:26:02 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:26:02 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:26:03 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:26:03 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:26:03 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:26:03 --> Error - The requested view could not be found: news.php in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/core/classes/view.php on line 477
ERROR - 2016-09-02 08:26:59 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:27:21 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:28:20 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:28:53 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:29:07 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:29:51 --> Model_Base_Core:getAll:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'avarta' in 'field list' with query: "SELECT `id`, `title`, `alias`, `status`, `short_content`, `avarta` FROM `news` ORDER BY `created` DESC LIMIT 10"
ERROR - 2016-09-02 08:30:52 --> Parsing Error - parse error in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/views/news/index.php on line 29
ERROR - 2016-09-02 08:33:45 --> Parsing Error - parse error, expecting `']'' in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/views/news/index.php on line 24
ERROR - 2016-09-02 08:53:37 --> Fatal Error - Access to undeclared static property: Fuel\Core\Security::$token in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/views/news/index.php on line 35
ERROR - 2016-09-02 08:54:04 --> Fatal Error - Access to undeclared static property: Fuel\Core\Security::$token in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/views/news/index.php on line 35
ERROR - 2016-09-02 09:18:55 --> Notice - Undefined variable: returnData in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 51
ERROR - 2016-09-02 09:56:32 --> Fatal Error - Call to undefined method Fuel\Core\Input::getParams() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 52
ERROR - 2016-09-02 09:56:33 --> Fatal Error - Call to undefined method Fuel\Core\Input::getParams() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 52
ERROR - 2016-09-02 09:56:34 --> Fatal Error - Call to undefined method Fuel\Core\Input::getParams() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 52
ERROR - 2016-09-02 09:56:39 --> Fatal Error - Call to undefined method Fuel\Core\Input::getParam() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 52
ERROR - 2016-09-02 09:57:18 --> Fatal Error - Call to undefined method Fuel\Core\Input::getParam() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 52
ERROR - 2016-09-02 11:02:14 --> Parsing Error - parse error in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 52
ERROR - 2016-09-02 11:56:53 --> Fatal Error - Class 'Admin\Model_Base_Core' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 87
ERROR - 2016-09-02 11:57:00 --> Fatal Error - Class 'news' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/base/core.php on line 28
ERROR - 2016-09-02 12:00:25 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/news.php on line 4
ERROR - 2016-09-02 12:00:41 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/news.php on line 4
ERROR - 2016-09-02 12:00:54 --> Fatal Error - Class 'news' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/base/core.php on line 28
ERROR - 2016-09-02 12:01:45 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/news.php on line 4
ERROR - 2016-09-02 12:03:10 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/news.php on line 4
ERROR - 2016-09-02 12:03:20 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/news.php on line 4
ERROR - 2016-09-02 12:06:18 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/news.php on line 4
ERROR - 2016-09-02 12:06:21 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/news.php on line 4
ERROR - 2016-09-02 12:07:45 --> Model_Base_Core:insert:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'created_at' in 'field list' with query: "INSERT INTO `news` (`created_at`, `updated_at`) VALUES (1472818065, null)"
ERROR - 2016-09-02 12:08:02 --> Model_Base_Core:insert:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'created_at' in 'field list' with query: "INSERT INTO `news` (`created_at`, `updated_at`) VALUES (1472818082, null)"
ERROR - 2016-09-02 12:08:49 --> Model_Base_Core:insert:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'created_at' in 'field list' with query: "INSERT INTO `news` (`created_at`, `updated_at`) VALUES (1472818129, null)"
ERROR - 2016-09-02 12:08:52 --> Model_Base_Core:insert:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'created_at' in 'field list' with query: "INSERT INTO `news` (`created_at`, `updated_at`) VALUES (1472818132, null)"
ERROR - 2016-09-02 12:09:40 --> Model_Base_Core:insert:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'created_at' in 'field list' with query: "INSERT INTO `news` (`created_at`, `updated_at`) VALUES (1472818180, null)"
ERROR - 2016-09-02 12:09:50 --> Model_Base_Core:insert:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'created_at' in 'field list' with query: "INSERT INTO `news` (`created_at`, `updated_at`) VALUES (1472818190, null)"
ERROR - 2016-09-02 12:13:08 --> Model_Base_Core:insert:253 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'created_at' in 'field list' with query: "INSERT INTO `news` (`created_at`, `updated_at`) VALUES (1472818388, null)"
ERROR - 2016-09-02 12:13:33 --> Model_Base_Core:insert:1667 - Orm\Observer_Created
ERROR - 2016-09-02 12:46:17 --> Parsing Error - parse error, expecting `"identifier (T_STRING)"' or `"\\ (T_NS_SEPARATOR)"' in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 9
ERROR - 2016-09-02 12:56:28 --> Parsing Error - parse error in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 77
ERROR - 2016-09-02 13:18:35 --> Notice - Undefined variable: params in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 110
ERROR - 2016-09-02 13:35:42 --> Parsing Error - parse error in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 122
ERROR - 2016-09-02 13:35:56 --> Notice - Undefined variable: newinfo in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/views/news/edit.php on line 2
ERROR - 2016-09-02 13:47:53 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/news.php on line 4
ERROR - 2016-09-02 13:48:11 --> Fatal Error - Call to undefined method Model_News::table() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/base/core.php on line 41
ERROR - 2016-09-02 13:48:50 --> Fatal Error - Call to undefined method Model_News::table() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/base/core.php on line 41
ERROR - 2016-09-02 13:48:58 --> Fatal Error - Class 'news' not found in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/base/core.php on line 41
ERROR - 2016-09-02 13:49:38 --> Model_Base_Core:insertAll:90 - Argument 1 passed to Fuel\Core\Database_Query_Builder_Insert::values() must be of the type array, string given, called in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/base/core.php on line 43 and defined
ERROR - 2016-09-02 13:49:45 --> Model_Base_Core:insertAll:90 - Argument 1 passed to Fuel\Core\Database_Query_Builder_Insert::values() must be of the type array, string given, called in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/classes/model/base/core.php on line 43 and defined
ERROR - 2016-09-02 14:11:28 --> Notice - Undefined variable: id in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 131
ERROR - 2016-09-02 14:11:53 --> Fatal Error - Call to undefined method Fuel\Core\Input::getParams() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 132
ERROR - 2016-09-02 14:12:07 --> Fatal Error - Call to undefined method Fuel\Core\Input::getParam() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 132
ERROR - 2016-09-02 14:12:22 --> Fatal Error - Call to undefined method Fuel\Core\Input::getParam() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 132
ERROR - 2016-09-02 14:12:23 --> Fatal Error - Call to undefined method Fuel\Core\Input::getParam() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 132
ERROR - 2016-09-02 14:12:25 --> Fatal Error - Call to undefined method Fuel\Core\Input::getParam() in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 132
ERROR - 2016-09-02 14:12:28 --> Notice - Undefined index: id in /Library/WebServer/Documents/daiphu/daiphu_project/fuel/app/modules/admin/classes/controller/news.php on line 134
ERROR - 2016-09-02 14:13:19 --> Model_Base_Core:deleteRowByWhere:253 - SQLSTATE[42S02]: Base table or view not found: 1146 Table 'daiphudb.new' doesn't exist with query: "DELETE FROM `new` WHERE `id` = '19'"
ERROR - 2016-09-02 14:13:51 --> Model_Base_Core:deleteRowByWhere:253 - SQLSTATE[42S02]: Base table or view not found: 1146 Table 'daiphudb.new' doesn't exist with query: "DELETE FROM `new` WHERE `id` = '19'"
