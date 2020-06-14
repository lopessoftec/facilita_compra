<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <strong>Cadastro de fornecedores</strong>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form method="post" action="/register">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name">Nome</label>
                                    <input type="name" name="name" class="form-control" id="name" placeholder="Nome">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="password">Senha</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Senha">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>