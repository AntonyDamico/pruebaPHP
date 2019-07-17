<?php require "views/partials/header.php" ?>

<h1 class="title">Datos Metereológicos</h1>

<?php if (isset($_GET['status'])): ?>
    <p class="message"><?= $_GET['message'] ?></p>
<?php endif; ?>

<div class="container">
    <form action="save.php" method="POST">
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
                cols="30" rows="4"
        >
    </textarea>

        <button type="submit">Enviar</button>

    </form>
</div>

<div class="row">

    <?php foreach ($mediciones as $medicion): ?>
        <div class="temp-elem">
            <p><?= $mediciones[0]->fecha ?> </p>
            <p><?= $mediciones[0]->observaciones ?></p>
            <p>
                <span class="max">
                    <?= $mediciones[0]->temp_max ?>°C
                </span>
                <span class="min">
                    <?= $mediciones[0]->temp_min ?>°C
                </span>
            </p>
            <p><?= $mediciones[0]->prev_precipita ?>%</p>
        </div>
    <?php endforeach; ?>


</div>

<?php require "views/partials/footer.php" ?>
