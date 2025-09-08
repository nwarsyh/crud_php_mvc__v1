<?php

class About extends ControllerCore {
    public function about()
    {
        $Data['subjudul'] = 'CRUDMVC | nwarsyah V.1';
        $Data['kontenabout'] = $this->model('AboutModel')->GetAbout();
        $this->view('Template/header', $Data);
        $this->view('About/about', $Data);
        $this->view('Template/footer');
    }
}