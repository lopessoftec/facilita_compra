<div class="container mt-4">
    <form method="post" action="/change-password">
        <div class="row justify-content-md-center">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">Senha</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Senha">
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm_password">Confirme a senha</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Senha">
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>