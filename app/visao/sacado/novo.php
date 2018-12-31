<style type="text/css">

    label.error{
        color: red;
    }

</style>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-block-head">
                <a href="<?php echo $this->baseUrl ?>/sacado/index" 
                   class="btn btn-info btn-sm pull-right">Lista</a>
                <h3>Sacado</h3>
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
                            <form role="form" method="POST" id="frmSacado" action="<?php echo $this->baseUrl ?>/sacado/salvar" onsubmit="return geral.submitForm(this, '');">
                                <input value="<?php echo $this->sacado->getSacadoId(); ?>" type="hidden" id="sacado_id" name="sacado_id" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nome/Razão Social</label>
                                            <input value="<?php echo $this->sacado->getSacadoNomeRazao(); ?>" id="sacado_nomerazao" name="sacado_nomerazao" maxlength="100" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>CPF/CNPJ</label>
                                            <input value="<?php echo $this->sacado->getSacadoCpfCnpj(); ?>" id="sacado_cpfcnpj" name="sacado_cpfcnpj" maxlength="18" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input value="<?php echo $this->sacado->getSacadoEmail(); ?>" id="sacado_email" name="sacado_email" maxlength="50" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input value="<?php echo $this->sacado->getSacadoEstado(); ?>" id="sacado_estado" name="sacado_estado" maxlength="50" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Setor</label>
                                            <input value="<?php echo $this->sacado->getSacadoSetor(); ?>" id="sacado_setor" name="sacado_setor" maxlength="50" class="form-control">
                                        </div>


                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tipo Pessoa</label>
                                            <select id="sacado_tipopessoa" name="sacado_tipopessoa" onchange="sacado.validaTipoPessoa();" class="form-control">
                                                <option <?php echo $this->sacado->getSacadoTipopessoa() == 'J' ? 'selected' : ''; ?> value="J">Jurídica</option>
                                                <option <?php echo $this->sacado->getSacadoTipopessoa() == 'F' ? 'selected' : ''; ?> value="F">Física</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input value="<?php echo $this->sacado->getSacadoTelefone(); ?>" id="sacado_telefone" name="sacado_telefone" maxlength="14" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>CEP</label>
                                            <input onchange="sacado.consultarCep(this.value)" value="<?php echo $this->sacado->getSacadoCep(); ?>" id="sacado_cep" name="sacado_cep" maxlength="9" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Cidade</label>
                                            <input value="<?php echo $this->sacado->getSacadoCidade(); ?>" id="sacado_cidade" name="sacado_cidade" maxlength="50" class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <label>Logradouro</label>
                                            <input value="<?php echo $this->sacado->getSacadoLogradouro(); ?>" id="sacado_logradouro" name="sacado_logradouro" maxlength="100" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select id="sacado_status" name="sacado_status" class="form-control">
                                                <option <?php echo $this->sacado->getSacadoStatus() == 'A' ? 'selected' : ''; ?> value="A">Ativo</option>
                                                <option <?php echo $this->sacado->getSacadoStatus() == 'I' ? 'selected' : ''; ?> value="I">Inativo</option>
                                            </select>
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
