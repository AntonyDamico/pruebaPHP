<?php

require "models/Medicion.php";

class MedicionController
{

    public static function index()
    {
        $mediciones = (new Medicion())->selectAll();
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