<?php
class App
{
    protected $controller = 'Home';
    protected $wrapController = '';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // Handle logout request separately
        if (isset($url[0]) && isset($url[1])) {
            if ($url[0] === 'login' && $url[1] === 'logout') {
                $this->logout();
                return;
            }
        }

        // Check user session
        if (isset($_SESSION['user_type'])) {
            $userType = $_SESSION['user_type'];

            // Determine controller path based on user type
            $controllerPath = $this->getControllerPath($userType, $url);

            if ($controllerPath) {
                require_once $controllerPath;
                $this->controller = new $this->controller;

                // Extract method from URL
                if (isset($url[2])) {
                    if (method_exists($this->controller, $url[2])) {
                        $this->method = $url[2];
                        unset($url[2]);
                    }
                }
            }
        } else {
            // Default controller for users without a session
            $defaultController = $this->getDefaultController($url);
            if ($defaultController) {
                require_once $defaultController;
                $this->controller = new $this->controller;

                // Extract method from URL
                if (isset($url[1])) {
                    if (method_exists($this->controller, $url[1])) {
                        $this->method = $url[1];
                        unset($url[1]);
                    }
                }
            }
        }

        // Extract parameters from URL
        $this->params = array_values($url);

        // Run the controller & method and pass parameters if any
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    protected function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }

    protected function logout()
    {
        // Clear all session data
        session_unset();
        session_destroy();

        // Redirect to login page after logout
        header('Location: ' . BASEURL . '/login');
        exit;
    }

    protected function getControllerPath($userType, &$url)
    {
        $controllerPath = '';

        if ($userType == 'admin' || $userType == 'dosen' || $userType == 'mahasiswa' || $userType == 'dpa') {
            $controllerFolder = ucfirst($userType) . 'Controllers';
            $this->wrapController = $userType;

            if (isset($url[1]) && file_exists("../app/controllers/$controllerFolder/{$url[1]}.php")) {
                $this->controller = $url[1];
                unset($url[1]);
                $controllerPath = "../app/controllers/$controllerFolder/{$this->controller}.php";
            }
        }

        return $controllerPath;
    }

    protected function getDefaultController(&$url)
    {
        $defaultController = '';

        if (isset($url[0]) && file_exists("../app/controllers/{$url[0]}.php")) {
            $this->controller = $url[0];
            unset($url[0]);
            $defaultController = "../app/controllers/{$this->controller}.php";
        }

        return $defaultController;
    }
}
