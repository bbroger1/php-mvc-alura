<?php require_once __DIR__ . '/../layouts/head.php'; ?>
<?php require_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container">
    <?php require_once __DIR__ . '/../layouts/header.php'; ?>
    <?php require_once __DIR__ . '/../layouts/messages.php'; ?>

    <?php
    foreach ($data['courses'] as $course) : ?>
        <div class="row">
            <div class="col-md-10">
                <?= $course->getDescription(); ?>
            </div>
            <form action="/courses/edit" method="POST" class="mr-2">
                <input type="hidden" name="id" value="<?= $course->getId() ?>">
                <button type="submit" class="btn btn-primary btn-sm">
                    Editar
                </button>
            </form>
            <form action="/courses/delete" method="POST">
                <input type="hidden" name="id" value="<?= $course->getId() ?>">
                <button type="submit" class="btn btn-danger btn-sm">
                    Excluir
                </button>
            </form>
        </div>
        <hr>
    <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>