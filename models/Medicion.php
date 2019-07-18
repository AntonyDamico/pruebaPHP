<?php

require_once "DependencyContainer.php";

class Medicion
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = DependencyContainer::get('pdo');
    }

    public function selectAll()
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM mediciones_diarias
            WHERE fecha >= (CURDATE() - INTERVAL 3 DAY) order by fecha"
        );
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function save(array $data)
    {
        if (!$this->dateExists()) {
            $this->insert($data);
        } else {
            $this->update($data);
        }
    }

    private function insert($data)
    {
        $query =
            "insert into mediciones_diarias 
            (fecha, temp_max, temp_min, prev_precipita, observaciones)
            values (?, ?, ?, ?, ?) ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            $data['fecha'],
            (float)$data['maxTemp'],
            (float)$data['minTemp'],
            (int)$data['precipitation'],
            $data['observations']
        ]);
    }

    private function update($data)
    {
        $query =
            "update mediciones_diarias set 
            temp_max=?, temp_min=?, prev_precipita=?, observaciones=? where fecha = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            (float)$data['maxTemp'],
            (float)$data['minTemp'],
            (int)$data['precipitation'],
            $data['observations'],
            $data['fecha']
        ]);
    }

    private function dateExists()
    {
        $sql = "select * from mediciones_diarias where fecha = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $_POST['fecha'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function validateInput()
    {
        if (!self::requiredFields())
            throw new Exception('Complete todos los campos necesarios');
        if (!self::valuesAreNumeric())
            throw new Exception('Los valores de temperatura y precipitación deben ser numéricos');
        if (!self::correctPrecipitation())
            throw new Exception('La precipitacion solo puede estar entre 0 y 100.');
        if (!self::minTempLessThanMax())
            throw new Exception('El valor de la temperatura máxima debe ser mayor al de la temperatura mínima.');
        return true;
    }

    private static function requiredFields()
    {
        return
            $_POST['maxTemp'] !== '' &&
            $_POST['minTemp'] !== '' &&
            $_POST['precipitation'] !== '' &&
            $_POST['observations'] !== '';
    }

    private static function correctPrecipitation()
    {
        return
            $_POST['precipitation'] >= 0 &&
            $_POST['precipitation'] <= 100;
    }

    private static function minTempLessThanMax()
    {
        return $_POST['minTemp'] < $_POST['maxTemp'];
    }

    private static function valuesAreNumeric()
    {
        return
            is_numeric($_POST['maxTemp']) &&
            is_numeric($_POST['minTemp']) &&
            is_numeric($_POST['precipitation']);
    }

}