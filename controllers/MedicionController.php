<?php

require "models/Medicion.php";

class MedicionController
{

    public static function index()
    {
        $mediciones = (new Medicion())->selectAll();
        foreach ($mediciones as $medicion) {
            $medicion->fecha = date_format(date_create($medicion->fecha), "d/m/Y");
        }
        include "views/index.php";
    }

    public static function save()
    {
        try {
            Medicion::validateInput();
            (new Medicion)->save($_POST);
            header('Location: /?status=success');
        } catch (Exception $exception) {
            header('Location: /?status=error&message=' . $exception->getMessage());
        }
    }
}