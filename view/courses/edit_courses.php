<?php require_once __DIR__ . '/../layouts/head.php'; ?>
<?php require_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container">
    <?php require_once __DIR__ . '/../layouts/header.php'; ?>
    <form action="/courses/update" method="POST">
        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" id="description" name="description" value="<?= $data['course_description'] ?>" class="form-control">
            <input type="hidden" id="id" name="id" value="<?= $data['course_id'] ?>" class="form-control">
        </div>
        <button class="btn btn-primary">Editar</button>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>