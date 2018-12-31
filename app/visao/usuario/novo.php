<style type="text/css">

    label.error{
        color: red;
    }

</style>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-block-head">
                <a href="<?php echo $this->baseUrl ?>/usuario/index" 
                   class="btn btn-info btn-sm pull-right">Lista</a>
                <h3>Usuário</h3>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="POST" id="frmUsuario" action="<?php echo $this->baseUrl ?>/usuario/salvar" onsubmit="return geral.submitForm(this, '');">
                                <input value="<?php echo $this->usuario->getUsuarioId(); ?>" type="hidden" id="usuario_id" name="usuario_id" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input value="<?php echo $this->usuario->getUsuarioNome(); ?>" id="usuario_nome" name="usuario_nome" maxlength="100" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Data de Nascimento</label>
                                            <input value="<?php echo $this->usuario->getUsuarioDtnasc(); ?>" id="usuario_dtnasc" name="usuario_dtnasc" maxlength="10" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>CEP</label>
                                            <input onchange="usuario.consultarCep(this.value)" value="<?php echo $this->usuario->getUsuarioCep(); ?>" id="usuario_cep" name="usuario_cep" maxlength="9" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Cidade</label>
                                            <input value="<?php echo $this->usuario->getUsuarioCidade(); ?>" id="usuario_cidade" name="usuario_cidade" maxlength="50" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Logradouro</label>
                                            <input value="<?php echo $this->usuario->getUsuarioLogradouro(); ?>" id="usuario_logradouro" name="usuario_logradouro" maxlength="100" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Senha</label>
                                            <input type="password" id="usuario_senha" name="usuario_senha" maxlength="10" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>CPF</label>
                                            <input value="<?php echo $this->usuario->getUsuarioCpf(); ?>" id="usuario_cpf" name="usuario_cpf" maxlength="18" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input value="<?php echo $this->usuario->getUsuarioTelefone(); ?>" id="usuario_telefone" name="usuario_telefone" maxlength="14" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input value="<?php echo $this->usuario->getUsuarioEstado(); ?>" id="usuario_estado" name="usuario_estado" maxlength="50" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Setor</label>
                                            <input value="<?php echo $this->usuario->getUsuarioSetor(); ?>" id="usuario_setor" name="usuario_setor" maxlength="50" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select id="usuario_status" name="usuario_status" class="form-control">
                                                <option <?php echo $this->usuario->getUsuarioStatus() == 'A' ? 'selected' : ''; ?> value="A">Ativo</option>
                                                <option <?php echo $this->usuario->getUsuarioStatus() == 'I' ? 'selected' : ''; ?> value="I">Inativo</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirma Senha</label>
                                            <input type="password" id="confirma_senha" name="confirma_senha" maxlength="10" class="form-control">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Salvar</button>
                                    <button type="reset" class="btn btn-default">Limpar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
