<style type="text/css">

    label.error{
        color: red;
    }

</style>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-block-head">
                <a href="<?php echo $this->baseUrl ?>/conta/index" 
                   class="btn btn-info btn-sm pull-right">Lista</a>
                <h3>Conta</h3>
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
                            <form role="form" method="POST" id="frmConta" action="<?php echo $this->baseUrl ?>/conta/salvar" onsubmit="return geral.submitForm(this, '');">
                                <input value="<?php echo $this->conta->getContaId(); ?>" type="hidden" id="conta_id" name="conta_id" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group col-md-12">
                                            <label>Nome</label>
                                            <input value="<?php echo $this->conta->getContaNome(); ?>" id="conta_nome" name="conta_nome" maxlength="20" class="form-control">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Banco</label>
                                            <select id="banco_id" name="banco_id" class="form-control">
                                                <option value=""></option>

                                                <?php
                                                foreach ($this->bancos as $banco):
                                                    ?>

                                                    <option <?php echo $banco->getBancoId() == $this->conta->getBancoId() ? 'selected' : ''; ?> value="<?php echo $banco->getBancoId(); ?>"><?php echo $banco->getBancoCodigo() . ' - ' . $banco->getBancoNome(); ?></option>

                                                    <?php
                                                endforeach;
                                                ?>
                                            </select> 
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Contrato</label>
                                            <input value="<?php echo $this->conta->getContaContrato(); ?>" id="conta_contrato" name="conta_contrato" maxlength="20" class="form-control">
                                        </div>

                                        <div class="form-group col-md-10">
                                            <label>Conta</label>
                                            <input value="<?php echo $this->conta->getContaNumero(); ?>" id="conta_numero" name="conta_numero" maxlength="20" class="form-control">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Dígito</label>
                                            <input value="<?php echo $this->conta->getContaNumeroDigito(); ?>" id="conta_numerodigito" name="conta_numerodigito" maxlength="2" class="form-control">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Taxa de desconto</label>
                                            <input value="<?php echo $this->conta->getContaTaxadesconto(); ?>" id="conta_taxadesconto" name="conta_taxadesconto" maxlength="20" class="form-control">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Dias para protesto</label>
                                            <input value="<?php echo $this->conta->getContaDiasprotesto(); ?>" id="conta_diasprotesto" name="conta_diasprotesto" maxlength="20" class="form-control">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Moeda</label>
                                            <select id="conta_status" name="conta_moeda" class="form-control">
                                                <option value="9">Real</option>
                                            </select>
                                        </div>


                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group col-md-12">
                                            <label>Cedente</label>
                                            <select id="cedente_id" name="cedente_id" class="form-control">
                                                <option value=""></option>

                                                <?php
                                                foreach ($this->cedentes as $cedente):
                                                    ?>

                                                    <option <?php echo $cedente->getCedenteId() == $cedente->getCedenteId() ? 'selected' : ''; ?> value="<?php echo $cedente->getCedenteId(); ?>"><?php echo $cedente->getCedenteNomeRazao(); ?></option>

                                                    <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>


                                        <div class="form-group col-md-10">
                                            <label>Agência</label>
                                            <input value="<?php echo $this->conta->getContaAgencia(); ?>" id="conta_agencia" name="conta_agencia" maxlength="20" class="form-control">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Dígito</label>
                                            <input value="<?php echo $this->conta->getContaNumeroDigito(); ?>" id="conta_agenciadigito" name="conta_agenciadigito" maxlength="2" class="form-control">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Convênio</label>
                                            <input value="<?php echo $this->conta->getContaConvenio(); ?>" id="conta_convenio" name="conta_convenio" maxlength="20" class="form-control">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Carteira</label>
                                            <input value="<?php echo $this->conta->getContaCarteira(); ?>" id="conta_carteira" name="conta_carteira" maxlength="20" class="form-control">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Taxa de juros ao mês</label>
                                            <input value="<?php echo $this->conta->getContaTaxajurosmes(); ?>" id="conta_taxajurosmes" name="conta_taxajurosmes" maxlength="20" class="form-control">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Taxa de multa</label>
                                            <input value="<?php echo $this->conta->getContaTaxamulta(); ?>" id="conta_taxamulta" name="conta_taxamulta" maxlength="20" class="form-control">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Status</label>
                                            <select id="conta_status" name="conta_status" class="form-control">
                                                <option <?php echo $this->conta->getContaStatus() == 'A' ? 'selected' : ''; ?> value="A">Ativo</option>
                                                <option <?php echo $this->conta->getContaStatus() == 'I' ? 'selected' : ''; ?> value="I">Inativo</option>
                                            </select>
                                        </div>


                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group col-md-12">
                                            <label>Observação ao caixa</label>
                                            <textarea maxlength="500" id="conta_obscaixa" name="conta_obscaixa" class="form-control"><?php echo $this->conta->getContaObscaixa(); ?></textarea>
                                        </div>
                                    </div>



                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Salvar</button>
                                        <button type="reset" class="btn btn-default">Limpar</button>
                                    </div>
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
