<?php
class ApplicationCore {
    protected $Controller = 'Dashboard';
    protected $Method = 'dashboard';
    protected $Params = [];
    public function __construct()
    {
        $Url = $this->ParseURL();
        if (is_array($Url)) {
            if (isset($Url[0]) && file_exists(CONTROLLER_PATH . ucfirst($Url[0]) . '/' . ucfirst($Url[0]) . '.php')) {
                $this->Controller = ucfirst($Url[0]);
                unset($Url[0]);
            } else if (!empty($Url)) {
                $this->redirectToError();
            }
        }
        require_once CONTROLLER_PATH . $this->Controller . '/' . $this->Controller . '.php';
        $this->Controller = new $this->Controller;
        if (isset($Url[1])) {
            if (method_exists($this->Controller, $Url[1])) {
                $this->Method = $Url[1];
                unset($Url[1]);
            } else {
                $this->redirectToError();
            }
        }
        if (!empty($Url)){
            $this->Params = array_values($Url);
        }
        call_user_func_array([$this->Controller, $this->Method], $this->Params);
    }
    public function ParseURL(){
        if (isset($_GET['url'])){
            $LinkAplikasi = rtrim($_GET['url'], '/');
            $LinkAplikasi = filter_var($LinkAplikasi, FILTER_SANITIZE_URL);
            $LinkAplikasi = explode('/', $LinkAplikasi);
            return $LinkAplikasi;
        }
    }
    private function redirectToError()
    {
        require_once CONTROLLER_PATH . 'ErrorNotFound/ErrorNotFound.php';
        $this->Controller = new ErrorNotFound();
        $this->Method = 'errornotfound';
        $this->Params = [];
        call_user_func_array([$this->Controller, $this->Method], []);
        exit;
    }
}