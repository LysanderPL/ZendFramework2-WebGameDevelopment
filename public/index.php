<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

error_reporting(E_ALL);
ini_set('display_errors', true);


function userErrorHandler($errno, $errmsg, $filename, $linenum, $vars)
{
    // timestamp for the error entry
    $dt = date("Y-m-d H:i:s (T)");

    // define an assoc array of error string
    // in reality the only entries we should
    // consider are E_WARNING, E_NOTICE, E_USER_ERROR,
    // E_USER_WARNING and E_USER_NOTICE
    $errortype = array(
        E_ERROR => 'Error',
        E_WARNING => 'Warning',
        E_PARSE => 'Parsing Error',
        E_NOTICE => 'Notice',
        E_CORE_ERROR => 'Core Error',
        E_CORE_WARNING => 'Core Warning',
        E_COMPILE_ERROR => 'Compile Error',
        E_COMPILE_WARNING => 'Compile Warning',
        E_USER_ERROR => 'User Error',
        E_USER_WARNING => 'User Warning',
        E_USER_NOTICE => 'User Notice',
        E_STRICT => 'Runtime Notice',
        E_RECOVERABLE_ERROR => 'Catchable Fatal Error'
    );

    /** @var $user_errors TYPE_NAME */
    $user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);

    $err = "";
    $err .= $dt;
    $err .= " | " . $errno;
    $err .= " | " . $errortype[$errno];
    $err .= " | " . $errmsg;
    $err .= " | " . $filename;
    $err .= " | " . $linenum;

    if (in_array($errno, $user_errors)) {
        $err .= "\t<vartrace>" . wddx_serialize_value($vars, "Variables") . "</vartrace>\n";
    }
    $err .= "\n";

    // for testing
    // echo $err;

    // save to the error log, and e-mail me if there is a critical user error
    error_log($err, 3, realpath(__DIR__ . '/../log/error.log'));
    if ($errno == E_USER_ERROR) {
        mail("podania.12@gmail.com", "Error", $err);
    }
}

set_error_handler("userErrorHandler");

function shutdown()
{
    if ($error = error_get_last()) {
        $dt = date("Y-m-d H:i:s (T)");
        $err = "";
        $err .= $dt;
        $err .= " | " . $error['type'];
        $err .= " | " . $error['type'];
        $err .= " | " . $error['message'];
        $err .= " | " . $error['file'];
        $err .= " | " . $error['line'];

        $err .= "\n";
        error_log($err, 3, realpath(__DIR__ . '/../log/error.log'));
    }
}

register_shutdown_function('shutdown');
// trzeba ustawiac strefe czasowa
date_default_timezone_set('Europe/Warsaw');

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
