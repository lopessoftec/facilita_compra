<?php
session_start();
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-4 border rounded pb-2 mt-2">
            <div>
                <h3>Login</h3>
            </div>
            <form action="/autenticar" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="text" class="form-control" placeholder="Seu email" autofocus="">
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input name="password" type="password" id="password" name="text" class="form-control" placeholder="Seu senha" autofocus="">
                </div>
                <button type="submit" class="btn btn-success btn-block">Entrar</button>
                <a href="/register-view" class="btn btn-primary btn-block">Cadastrar</a>
            </form>
        </div>
    </div>
</div>