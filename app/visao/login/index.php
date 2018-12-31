<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Acesso ao sistema</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="<?php echo Guga_Auth::getBaseUrl() ?>/login/logar" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control"
                                       placeholder="CPF" name="usuario_cpf" id="usuario_cpf" autofocus value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" 
                                       placeholder="Senha" name="usuario_senha" id="usuario_senha" type="password" value="">
                            </div>
                            <p style="color: red; text-align: center"><?php echo $this->msgAlerta; ?></p>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Entrar</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>