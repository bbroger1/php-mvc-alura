<?php require_once __DIR__ . '/../layouts/head.php'; ?>
<?php require_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container">
    <?php require_once __DIR__ . '/../layouts/header.php'; ?>
    <form action="/courses/create" method="POST">
        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" id="description" name="description" class="form-control">
        </div>
        <button class="btn btn-primary">Salvar</button>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>