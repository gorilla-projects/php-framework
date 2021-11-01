<div class="container">

    <?php foreach($vars['skills'] as $skill) : ?>
        <div class="row">
            <div class="col-6"><?= $skill->name ?></div>
            <div class="col-6"><?= $skill->info ?></div>
        </div>
    <?php endforeach ?>

</div>