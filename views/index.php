<?php require "views/partials/header.php" ?>

<h1>Datos Metereológicos</h1>

<?php if (isset($_GET['status'])): ?>
    <p><?= $_GET['message'] ?></p>
<?php endif; ?>

<form action="save.php" method="POST">
    <label for="maxTemp">Temperatura Máxima</label>
    <input type="number" name="maxTemp" id="maxTemp">

    <label for="minTemp">Temperatura Mínima</label>
    <input type="number" name="minTemp" id="minTemp">

    <label for="precipitation">Previsión de Precipitacion (%)</label>
    <input
            type="number" name="precipitation" id="precipitation"
            min="0" max="100"
    >

    <label for="observations">Observaciones</label>
    <textarea
            name="observations" id="observations"
            cols="30" rows="10"
    >
    </textarea>

    <button type="submit">Enviar</button>

</form>

<?php require "views/partials/footer.php" ?>
