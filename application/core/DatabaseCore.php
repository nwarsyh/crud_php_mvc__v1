<?php
class DatabaseCore {
    private $DatabaseHandler;
    private $Statement;
    public function __construct()
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->DatabaseHandler = new PDO($dsn, DB_USER, DB_PASS, $option);
            $this->DatabaseHandler = new PDO($dsn, DB_USER, DB_PASS, $option);
        } catch (PDOException $error){
            die($error->getMessage());
        }
    }
    public function query($query)
    {
        $this->Statement = $this->DatabaseHandler->prepare($query);
    }
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            $type = match (true) {
            is_int($value)  => PDO::PARAM_INT,
                is_bool($value) => PDO::PARAM_BOOL,
                is_null($value) => PDO::PARAM_NULL,
                default         => PDO::PARAM_STR,
            };
        }
        $this->Statement->bindValue($param, $value, $type);
    }
    public function execute()
    {
        return $this->Statement->execute();
    }
    public function resultSet()
    {
        $this->execute();
        return $this->Statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function single()
    {
        $this->execute();
        return $this->Statement->fetch(PDO::FETCH_ASSOC);
    }
    public function rowCount()
    {
        return $this->Statement->rowCount();
    }
}
