    <div class="jumbotron row">
        <div class="col-md-6 text-center">
            <h1><?= $data['title'] ?></h1>
        </div>
        <div class="col-md-6 text-right mx-auto my-auto">
            <a href="<?= $data['route'] ?>" class="btn btn-sm btn-primary mb-2">
                <?= $data['button'] ?>
            </a>
        </div>
    </div>

    <?php require_once __DIR__ . '/../layouts/messages.php'; ?>