<?php

class ErrorNotFound extends ControllerCore {
    public function errornotfound()
    {
        $Data['subjudul'] = 'CRUDMVC | nwarsyah V.1';
        $Data['kontenerror'] = $this->model('ErrorNotFoundModel')->GetErrorNotFound();
        $this->view('Template/header', $Data);
        $this->view('ErrorNotFound/erroreotfound', $Data);
        $this->view('Template/footer');
    }
}