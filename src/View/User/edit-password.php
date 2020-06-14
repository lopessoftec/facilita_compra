<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <strong>Alterar senha</strong>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
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
                                        <button type="submit" class="btn btn-primary"><strong>Salvar</strong></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>