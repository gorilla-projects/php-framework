<?php require('views/partials/header.view.php'); ?>

<div class="container-fluid">
    <div class="row">
        <h3>Opleidingen</h3>

    </div>

    <?php foreach ($vars['educations'] as $education) : ?>
        <div class="row">
            <div class="col-12">
                <a href="education/<?= $education->id ?>/edit"><?= $education->name ?></a>
            </div>
        </div>
    <?php endforeach ?>


</div>

<?php require('views/partials/footer.view.php'); ?>