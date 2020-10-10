<?php
class Framework
{

    public static function run()
    {
        self::init();
        session_start();

        set_error_handler(function ($severity, $message, $file, $line) {
            $error_msg = $message . "\nFile: " . $file . "\nLine: " . $line;
            file_put_contents("log.txt", $error_msg, FILE_APPEND);
            if (PRODUCTION) {
                throw new \ErrorException($message, $severity, $severity, $file, $line);
            } else {
                echo '<h3>' . str_replace("\n", "</h3><h3>", $error_msg) . '</h3>';
            }
        });

        try {
            // Routing
            $request = new Request();
            Router::parse($request->url, $request);

            // Load controller
            $name = $request->controller . "Controller";
            $file = CONTROLLER_PATH . $name . '.class.php';
            require $file;
            $controller = new $name();

            // Dispatch
            call_user_func_array([$controller, $request->action], $request->params);
        } catch (Exception $e) {
            include ERROR_PATH . '404.php';
        } finally {
            restore_error_handler();
        }
    }

    private static function init()
    {
        // Define path constants
        define("DS", DIRECTORY_SEPARATOR);
        define("ROOT", dirname(getcwd()) . DS);
        define("APP_PATH", ROOT . 'application' . DS);
        define("FRAMEWORK_PATH", ROOT . "framework" . DS);
        define("PUBLIC_PATH", ROOT . "public" . DS);
        define("CONFIG_PATH", APP_PATH . "config" . DS);
        define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
        define("MODEL_PATH", APP_PATH . "models" . DS);
        define("VIEW_PATH", APP_PATH . "views" . DS);
        define("CORE_PATH", FRAMEWORK_PATH . "core" . DS);
        define('DB_PATH', FRAMEWORK_PATH . "database" . DS);
        define("LIB_PATH", FRAMEWORK_PATH . "libraries" . DS);
        define("HELPER_PATH", FRAMEWORK_PATH . "helpers" . DS);
        define("TEMPLATE_PATH", PUBLIC_PATH . "templates" . DS);
        define("CSS_PATH", PUBLIC_PATH . "css" . DS);
        define("JS_PATH", PUBLIC_PATH . "js" . DS);
        define("UPLOAD_PATH", PUBLIC_PATH . "uploads" . DS);
        define("HTML_PATH", PUBLIC_PATH . "html" . DS);
        define("CHOCOLATE_PATH", HTML_PATH . "chocolate" . DS);
        define("USER_PATH", HTML_PATH . "user" . DS);
        define("ERROR_PATH", HTML_PATH . "error" . DS);

        // Load config
        include CONFIG_PATH . 'config.php';

        // Load core classes
        foreach (array(CORE_PATH, DB_PATH) as $dir) {
            foreach (scandir($dir) as $filename) {
                $path = $dir . $filename;
                if ($path != __FILE__) {
                    if (is_file($path)) {
                        require $path;
                    }
                }
            }
        }
    }
}
