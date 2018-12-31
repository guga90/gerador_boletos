<style type="text/css">

    label.error{
        color: red;
    }

</style>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-block-head">
                <a href="<?php echo $this->baseUrl ?>/cedente/index" 
                   class="btn btn-info btn-sm pull-right">Lista</a>
                <h3>Cedente</h3>
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
                            <form role="form" method="POST" id="frmCedente" action="<?php echo $this->baseUrl ?>/cedente/salvar" onsubmit="return geral.submitForm(this, '');">
                                <input value="<?php echo $this->cedente->getCedenteId(); ?>" type="hidden" id="cedente_id" name="cedente_id" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nome/Razão Social</label>
                                            <input value="<?php echo $this->cedente->getCedenteNomeRazao(); ?>" id="cedente_nomerazao" name="cedente_nomerazao" maxlength="100" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>CPF/CNPJ</label>
                                            <input value="<?php echo $this->cedente->getCedenteCpfCnpj(); ?>" id="cedente_cpfcnpj" name="cedente_cpfcnpj" maxlength="18" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input value="<?php echo $this->cedente->getCedenteEmail(); ?>" id="cedente_email" name="cedente_email" maxlength="50" class="form-control">
                                        </div>



                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input value="<?php echo $this->cedente->getCedenteEstado(); ?>" id="cedente_estado" name="cedente_estado" maxlength="50" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Setor</label>
                                            <input value="<?php echo $this->cedente->getCedenteSetor(); ?>" id="cedente_setor" name="cedente_setor" maxlength="50" class="form-control">
                                        </div>


                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tipo Pessoa</label>
                                            <select id="cedente_tipopessoa" name="cedente_tipopessoa" onchange="cedente.validaTipoPessoa();" class="form-control">
                                                <option <?php echo $this->cedente->getCedenteTipopessoa() == 'J' ? 'selected' : ''; ?> value="J">Jurídica</option>
                                                <option <?php echo $this->cedente->getCedenteTipopessoa() == 'F' ? 'selected' : ''; ?> value="F">Física</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input value="<?php echo $this->cedente->getCedenteTelefone(); ?>" id="cedente_telefone" name="cedente_telefone" maxlength="14" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>CEP</label>
                                            <input onchange="cedente.consultarCep(this.value)" value="<?php echo $this->cedente->getCedenteCep(); ?>" id="cedente_cep" name="cedente_cep" maxlength="9" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Cidade</label>
                                            <input value="<?php echo $this->cedente->getCedenteCidade(); ?>" id="cedente_cidade" name="cedente_cidade" maxlength="50" class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <label>Logradouro</label>
                                            <input value="<?php echo $this->cedente->getCedenteLogradouro(); ?>" id="cedente_logradouro" name="cedente_logradouro" maxlength="100" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select id="cedente_status" name="cedente_status" class="form-control">
                                                <option <?php echo $this->cedente->getCedenteStatus() == 'A' ? 'selected' : ''; ?> value="A">Ativo</option>
                                                <option <?php echo $this->cedente->getCedenteStatus() == 'I' ? 'selected' : ''; ?> value="I">Inativo</option>
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
