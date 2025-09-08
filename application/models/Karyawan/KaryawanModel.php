<?php
class KaryawanModel
{
    private $JudulKaryawan = 'Karyawan';
    private $Table = 'mvc_tb_karyawan';
    private $TableDepartemen = 'mvc_tb_departemen';
    private $Database;
    public function __construct()
    {
        $this->Database = new DatabaseCore;
    }
    public function GetJudulKaryawan()
    {
        return $this->JudulKaryawan;
    }
    public function getAllKaryawan()
    {
        $this->Database->query('SELECT * FROM ' . $this->Table);

        return $this->Database->resultSet();
    }
    public function getKaryawanById($IDKaryawan)
    {
        $this->Database->query('SELECT * FROM ' . $this->Table . ' WHERE crudmvc_id_karyawan=:IDKaryawan');
        $this->Database->bind('IDKaryawan', $IDKaryawan);
        return $this->Database->single();
    }
    public function getAllKaryawanWithDepartemen()
    {
        $query = "SELECT k.*, d.crudmvc_nama_departemen 
                  FROM {$this->Table} k 
                  LEFT JOIN {$this->TableDepartemen} d 
                  ON k.mvc_id_departemen = d.crudmvc_id_departemen";

        $this->Database->query($query);
        return $this->Database->resultSet();
    }
    public function UploadFotoProfil()
    {
        $NamaFotoProfil = $_FILES['fotoprofil']['name'];
        $UkuranFotoProfil = $_FILES['fotoprofil']['size'];
        $ErrorUploadFotoProfil = $_FILES['fotoprofil']['error'];
        $TempatSimpanFotoProfil = $_FILES['fotoprofil']['tmp_name'];
        if( $UkuranFotoProfil > 1000000 ) {
            echo "<script>
				alert('Maaf!!! Max Size Foto = 1 MB');
			  </script>";
            return false;
        }
        if( $ErrorUploadFotoProfil === 4 ) {
            echo "<script>
				alert('Maaf!!! Silahkan Pilih Photo Profil Anda');
			  </script>";
            return false;
        }
        $EkstensiValidFotoProfil = ['jpg', 'jpeg', 'png'];
        $EkstensiFotoProfil = explode('.', $NamaFotoProfil);
        $EkstensiFotoProfil = strtolower(end($EkstensiFotoProfil));
        if( !in_array($EkstensiFotoProfil, $EkstensiValidFotoProfil) ) {
            echo "<script>
				alert('Maaf!!! Format Yang Diizinkan Berupa (jpg,jpeg,png)');
			  </script>";
            return false;
        }
        $NamaFileSimpanFotoProfil = uniqid();
        $NamaFileSimpanFotoProfil .= '.';
        $NamaFileSimpanFotoProfil .= $EkstensiFotoProfil;
        move_uploaded_file($TempatSimpanFotoProfil, 'asset/img/img_karyawan/' . $NamaFileSimpanFotoProfil);
        return $NamaFileSimpanFotoProfil;
    }
    public function getAllDepartemenKaryawan()
    {
        $this->Database->query('SELECT * FROM ' . $this->TableDepartemen);
        return $this->Database->resultSet();
    }
    public function CreateDataKaryawan($CreateKaryawan)
    {
        $QueryCreateKaryawan = "INSERT INTO mvc_tb_karyawan VALUES ('', :nipkaryawan, :namakaryawan, :jeniskelamin, :deaprtemenkaryawan, :fotoprofil)";
        $this->Database->query($QueryCreateKaryawan);
        $this->Database->bind('nipkaryawan', 'RSP'.$CreateKaryawan['nipkaryawan']);
        $this->Database->bind('namakaryawan', $CreateKaryawan['namakaryawan']);
        $this->Database->bind('jeniskelamin', $CreateKaryawan['jeniskelamin']);
        $this->Database->bind('deaprtemenkaryawan', $CreateKaryawan['unitkaryawan']);
        $this->Database->bind('fotoprofil', $CreateKaryawan['fotoprofil']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function UpdateDataKaryawan($UpdateKaryawan)
    {
        $QueryUpdateKaryawan = "UPDATE mvc_tb_karyawan SET 
        mvc_nip_karyawan =:nipkaryawan,
        mvc_nama_karyawan =:namakaryawan,
        mvc_jk_karyawan =:jeniskelamin,
        mvc_id_departemen =:unitkaryawan,
        mvc_foto_karyawan =:fotoprofil
          WHERE mvc_id_karyawan =:idkaryawan";
        $this->Database->query($QueryUpdateKaryawan);
        $this->Database->bind('nipkaryawan', $UpdateKaryawan['nipkaryawan']);
        $this->Database->bind('namakaryawan', $UpdateKaryawan['namakaryawan']);
        $this->Database->bind('jeniskelamin', $UpdateKaryawan['jeniskelamin']);
        $this->Database->bind('unitkaryawan', $UpdateKaryawan['unitkaryawan']);
        $this->Database->bind('fotoprofil', $UpdateKaryawan['fotoprofil']);
        $this->Database->bind('idkaryawan', $UpdateKaryawan['idkaryawan']);
        $this->Database->execute();
        return $this->Database->rowCount();

    }
    public function DeleteDataKaryawan($mvc_id_karyawan)
    {
        $QueryDeleteKaryawan = "DELETE FROM mvc_tb_karyawan WHERE mvc_id_karyawan=:mvc_id_karyawan";
        $this->Database->query($QueryDeleteKaryawan);
        $this->Database->bind('mvc_id_karyawan', $mvc_id_karyawan);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}
