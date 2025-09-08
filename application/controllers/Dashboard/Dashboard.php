<?php

class Dashboard extends ControllerCore {
    public function dashboard()
    {
        $Data['subjudul'] = 'CRUDMVC | nwarsyah V.1';
        $Data['kontendashboard'] = $this->model('DashboardModel')->GetDashboard();
        $this->view('Template/header', $Data);
        $this->view('Dashboard/dashboard', $Data);
        $this->view('Template/footer');
    }
}