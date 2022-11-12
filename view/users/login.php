<?php require_once __DIR__ . '/../layouts/head.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>
                    <form action="/login" method="post" class="text-center">
                        <?php require_once __DIR__ . '/../layouts/messages.php'; ?>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Email</label>
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="email@example.com">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingPassword">Senha</label>
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Senha">
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                            <label class="form-check-label" for="rememberPasswordCheck">
                                Lembrar Senha
                            </label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>