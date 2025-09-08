<?php
class DepartemenModel
{
    private $JudulDepartemen = 'Departemen';
    private $Table = 'mvc_tb_departemen';
    private $Database;
    public function GetJudulDepartemen()
    {
        return $this->JudulDepartemen;
    }
    public function __construct()
    {
        $this->Database = new DatabaseCore;
    }
    public function getAllDepartemen()
    {
        $this->Database->query('SELECT * FROM ' . $this->Table);
        return $this->Database->resultSet();
    }
    public function getDepartemenById($id)
    {
        $this->Database->query('SELECT * FROM ' . $this->Table . ' WHERE crudmvc_id_departemen=:id');
        $this->Database->bind('id', $id);
        return $this->Database->single();
    }
    public function CreateDataDepartemen($CreateDepartemen)
    {
        $QueryCreateDepartemen = "INSERT INTO mvc_tb_departemen VALUES ('', :kategoridepartemen, :namadepartemen, :kodedepartemen, :keterangandepartemen)";
        $this->Database->query($QueryCreateDepartemen);
        $this->Database->bind('kategoridepartemen', $CreateDepartemen['kategoridepartemen']);
        $this->Database->bind('namadepartemen', $CreateDepartemen['namadepartemen']);
        $this->Database->bind('kodedepartemen', strtoupper($CreateDepartemen['kodedepartemen']));
        $this->Database->bind('keterangandepartemen', $CreateDepartemen['keterangandepartemen']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function UpdateDataDepartemen($UpdateDepartemen)
    {
        $QueryUpdateDepartemen = "UPDATE mvc_tb_departemen SET 
        crudmvc_kategori_departemen =:kategoridepartemen,
        crudmvc_nama_departemen =:namadepartemen,
        crudmvc_kode_departemen =:kodedepartemen,
        crudmvc_departemen_ket =:keterangandepartemen
          WHERE crudmvc_id_departemen=:iddepartemen";
        $this->Database->query($QueryUpdateDepartemen);
        $this->Database->bind('kategoridepartemen', $UpdateDepartemen['kategoridepartemen']);
        $this->Database->bind('namadepartemen', $UpdateDepartemen['namadepartemen']);
        $this->Database->bind('kodedepartemen', strtoupper($UpdateDepartemen['kodedepartemen']));
        $this->Database->bind('keterangandepartemen', $UpdateDepartemen['keterangandepartemen']);
        $this->Database->bind('iddepartemen', $UpdateDepartemen['iddepartemen']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function DeleteDataDepartemen($crudmvc_id_departemen)
    {
        $QueryDeleteDepartemen = "DELETE FROM mvc_tb_departemen WHERE crudmvc_id_departemen=:id";
        $this->Database->query($QueryDeleteDepartemen);
        $this->Database->bind('id', $crudmvc_id_departemen);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}
