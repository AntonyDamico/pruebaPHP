<?php require "views/partials/header.php" ?>

<h1 class="title">Datos Metereológicos</h1>

<?php if (isset($_GET['status'])): ?>
    <p class="message <?= $_GET['status'] ?>"><?= $_GET['message'] ?></p>
<?php endif; ?>

<div class="container">
    <form action="save.php" method="POST">

        <input type="date" name="fecha" id="" placeholder="Ingrese la fecha">

        <label for="maxTemp">Temperatura Máxima (°C)</label>
        <input type="number" name="maxTemp" id="maxTemp">

        <label for="minTemp">Temperatura Mínima (°C)</label>
        <input type="number" name="minTemp" id="minTemp">

        <label for="precipitation">Previsión de Precipitacion (%)</label>
        <input
                type="number" name="precipitation" id="precipitation"
                min="0" max="100"
        >

        <label for="observations">Observaciones</label>
        <textarea
                name="observations" id="observations"

        >
    </textarea>

        <button type="submit">Enviar</button>

    </form>
</div>

<div class="row">

    <?php foreach ($mediciones as $medicion): ?>
        <div class="temp-elem">
            <p><?= $medicion->fecha ?> </p>
            <p><?= $medicion->observaciones ?></p>
            <p>
                <span class="max">
                    <?= $medicion->temp_max ?>°C
                </span>
                <span class="min">
                    <?= $medicion->temp_min ?>°C
                </span>
            </p>
            <p><?= $medicion->prev_precipita ?>%</p>
        </div>
    <?php endforeach; ?>


</div>

<?php require "views/partials/footer.php" ?>
