<?php

class Karyawan extends ControllerCore {
    public function karyawan()
    {
        $Data['subjudul'] = 'CRUDMVC | nwarsyah V.1';
        $Data['subjudullama'] = 'Karyawan';
        $Data['karyawan'] = $this->model('KaryawanModel')->getAllKaryawanWithDepartemen();
        $Data['departemenkaraywan'] = $this->model('KaryawanModel')->getAllDepartemenKaryawan();
        $this->view('Template/header', $Data);
        $this->view('Karyawan/karyawan', $Data);
        $this->view('Template/footer');
    }
    public function CreateKaryawan()
    {
        $FotoHasilUpload = $this->model('KaryawanModel')->UploadFotoProfil();
        if (!$FotoHasilUpload) {
            return false;
        }
        $_POST['fotoprofil'] = $FotoHasilUpload;
        if ( $this->model('KaryawanModel')->CreateDataKaryawan($_POST) > 0) {
            AlertCore::alertPesan('Data Karyawan', 'Berhasil Disimpan', 'success');
            header('Location: ' . BASEURL . '/Karyawan/karyawan');
            exit;
        } else{
            AlertCore::alertPesan('Data Karyawan', 'Gagal Disimpan', 'danger');
            header('Location: ' . BASEURL . '/Karyawan/karyawan');
            exit;
        }
    }
    public function UpdateKaryawan()
    {
        $FotoLama = $_POST['fotoprofillama'];
        if ($_FILES['fotoprofil']['error'] !== 4) {
            if (file_exists('asset/img/' . $FotoLama)) {
                unlink('asset/img/' . $FotoLama); // hapus file lama
            }

            $Foto = $this->model('KaryawanModel')->UploadFotoProfil();
        } else{
            $Foto = $FotoLama;
        }
        $_POST['fotoprofil'] = $Foto;

        $HasilUpdate = $this->model('KaryawanModel')->UpdateDataKaryawan($_POST);
        if ($HasilUpdate !== false) {
            AlertCore::alertPesan('Data Karyawan', 'Berhasil Diubah', 'success');
            header('Location: ' . BASEURL . '/Karyawan/karyawan');
            exit;
        } else if($HasilUpdate === 0) {
            AlertCore::alertPesan('Data Karyawan', 'Tidak Ada Perubahan', 'secondary');
            header('Location: ' . BASEURL . '/Karyawan/karyawan');
        }else{
            AlertCore::alertPesan('Data Karyawan', 'Gagal Diubah', 'danger');
            header('Location: ' . BASEURL . '/Karyawan/karyawan');
            exit;
        }

    }
    public function DeleteKaryawan($crudmvc_id_karyawan)
    {
        if ( $this->model('KaryawanModel')->DeleteDataKaryawan($crudmvc_id_karyawan) > 0) {
            AlertCore::alertPesan('Data Karyawan', 'Berhasil Dihapus', 'success');
            header('Location: ' . BASEURL . '/Karyawan/karyawan');
            exit;
        } else{
            AlertCore::alertPesan('Data Karyawan', 'Gagal Disimpan', 'danger');
            header('Location: ' . BASEURL . '/Karyawan/karyawan');
            exit;
        }
    }
}