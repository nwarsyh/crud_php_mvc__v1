<?php

class ErrorNotFoundModel
{
    private $Judul404 = 'Halaman 404';
    public function GetErrorNotFound()
    {
        return $this->Judul404;
    }
}