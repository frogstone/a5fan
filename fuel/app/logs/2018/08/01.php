<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

ERROR - 2018-08-01 06:07:50 --> Notice - Undefined variable: css in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/views/show.php on line 15
ERROR - 2018-08-01 06:14:42 --> Notice - Undefined variable: hush in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/controller/detail.php on line 16
ERROR - 2018-08-01 06:16:51 --> Error - syntax error, unexpected '}' in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/controller/detail.php on line 18
ERROR - 2018-08-01 06:17:04 --> Notice - Undefined variable: ninsyo in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/model/database.php on line 85
ERROR - 2018-08-01 06:17:18 --> Notice - Undefined variable: and in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/model/database.php on line 86
ERROR - 2018-08-01 06:17:59 --> Notice - Undefined variable: db in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/model/database.php on line 93
ERROR - 2018-08-01 06:18:46 --> Fatal Error - Uncaught Fuel\Core\PhpErrorException: Object of class PDOStatement could not be converted to string in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/model/database.php:96
Stack trace:
#0 /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/core/bootstrap.php(103): Fuel\Core\Errorhandler::error_handler(4096, 'Object of class...', '/Volumes/HDD2TB...', 96)
#1 /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/model/database.php(96): {closure}(4096, 'Object of class...', '/Volumes/HDD2TB...', 96, Array)
#2 /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/controller/detail.php(16): Model_Database->select_record('school', Array)
#3 [internal function]: Controller_Detail->action_index('\xE3\x82\xA4\xE3\x83\xB3\xE3\x82\xB0\xE3\x83\xAA\xE3\x83\x83...')
#4 /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/core/classes/request.php(454): ReflectionMethod->invokeArgs(Object(Controller_Detail), Array)
#5 /Volumes/HDD2TB/Dropbox/works/_mine/A in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/model/database.php on line 96
ERROR - 2018-08-01 06:25:12 --> Error - Function name must be a string in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/model/database.php on line 98
ERROR - 2018-08-01 06:25:49 --> Error - Function name must be a string in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/model/database.php on line 100
ERROR - 2018-08-01 06:28:26 --> Notice - Undefined variable: ct in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/model/database.php on line 99
ERROR - 2018-08-01 06:29:53 --> Error - Call to a member function fetch() on boolean in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/model/database.php on line 106
ERROR - 2018-08-01 06:32:48 --> Notice - Undefined variable: sth in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/classes/model/database.php on line 106
ERROR - 2018-08-01 07:46:58 --> Notice - Undefined variable: school in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/views/detail.php on line 19
ERROR - 2018-08-01 07:52:41 --> Notice - Undefined variable: school in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/views/detail.php on line 19
ERROR - 2018-08-01 07:53:09 --> Notice - Undefined variable: school in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/views/detail.php on line 19
ERROR - 2018-08-01 07:53:58 --> Notice - Undefined variable: school in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/views/detail.php on line 19
ERROR - 2018-08-01 08:51:33 --> Notice - Undefined index: except in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/views/detail.php on line 14
ERROR - 2018-08-01 09:40:56 --> Fatal Error - Method Fuel\Core\View::__toString() must not throw an exception, caught ParseError: syntax error, unexpected '<', expecting ')' in /Volumes/HDD2TB/Dropbox/works/_mine/A5fan/fuelphp-1.8/fuel/app/views/show.php on line 0
