<?php
class ControllerCore{
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function view($Views, $Data = [])
    {
        require_once VIEW_PATH . $Views . '.php';
    }
    public function model($Model)
    {
        $controller = get_class($this); // Ambil nama controller, contoh: Karyawan
        require_once MODEL_PATH . $controller . '/' . $Model . '.php';
        return new $Model;
    }
}