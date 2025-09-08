<?php

class Departemen extends ControllerCore {
    public function departemen ()
    {
        $Data['subjudul'] = 'CRUDMVC | nwarsyah V.1';
        $Data['subjudulnamam'] = 'Departemen';
        $Data['departemen'] = $this->model('DepartemenModel')->getAllDepartemen();
        $this->view('Template/header', $Data);
        $this->view('Departemen/departemen', $Data);
        $this->view('Template/footer');
    }
    public function CreateDepartemen()
    {
        if ( $this->model('DepartemenModel')->CreateDataDepartemen($_POST) > 0) {
            AlertCore::alertPesan('Data Departemen', 'Berhasil Disimpan', 'success');
            header('Location: ' . BASEURL . '/Departemen/departemen');
            exit;
        } else{
            AlertCore::alertPesan('Data Departemen', 'Gagal Disimpan', 'danger');
            header('Location: ' . BASEURL . '/Departemen/departemen');
            exit;
        }
    }
    public function UpdateDepartemen()
    {
        $HasilUpdateDepartemen = $this->model('DepartemenModel')->UpdateDataDepartemen($_POST);
        if ($HasilUpdateDepartemen !== false) {
            AlertCore::alertPesan('Data Departemen', 'Berhasil Diubah', 'success');
            header('Location: ' . BASEURL . '/Departemen/departemen');
            exit;
        } else if($HasilUpdateDepartemen === 0) {
            AlertCore::alertPesan('Data Departemen', 'Tidak Ada Perubahan', 'secondary');
            header('Location: ' . BASEURL . '/Departemen/departemen');
        }else{
            AlertCore::alertPesan('Data Departemen', 'Gagal Diubah', 'danger');
            header('Location: ' . BASEURL . '/Departemen/departemen');
            exit;
        }
    }
    public function DeleteDepartemen($crudmvc_id_departemen)
    {
        if ( $this->model('DepartemenModel')->DeleteDataDepartemen($crudmvc_id_departemen) > 0) {
            AlertCore::alertPesan('Data Departemen', 'Berhasil Dihapus', 'success');
            header('Location: ' . BASEURL . '/Departemen/departemen');
            exit;
        } else{
            AlertCore::alertPesan('Data Departemen', 'Gagal Dihapus', 'danger');
            header('Location: ' . BASEURL . '/Departemen/departemen');
            exit;
        }
    }
}