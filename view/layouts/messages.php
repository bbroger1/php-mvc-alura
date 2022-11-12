<?php if (isset($_SESSION['mensagem'])) { ?>
    <div class="alert alert-<?= $_SESSION['tipoMensagem'] ?>">
        <?= $_SESSION['mensagem'] ?>
    </div>
<?php }

unset($_SESSION['mensagem']);
unset($_SESSION['tipoMensagem']);
?>