<style type="text/css">

    label.error{
        color: red;
    }

</style>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-block-head">
                <a href="<?php echo $this->baseUrl ?>/lancamento/index" 
                   class="btn btn-info btn-sm pull-right">Lista</a>
                <h3>Lançamento</h3>
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
                            <form role="form" method="POST" id="frmLancamento" action="<?php echo $this->baseUrl ?>/lancamento/salvar" onsubmit="return geral.submitForm(this, '');">
                                <input value="<?php echo $this->lancamento->getLancamentoId(); ?>" type="hidden" id="lancamento_id" name="lancamento_id" >
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>Cedente</label>
                                            <select id="cedente_id" name="cedente_id" onchange="lancamento.popularConta(this);" class="form-control">
                                                <option value=""></option>
                                                <?php
                                                foreach ($this->cedentes as $cedente):
                                                    ?>
                                                    <option <?php echo $this->lancamento->getCedenteId() == $cedente->getCedenteId() ? 'selected' : ''; ?> value="<?php echo $cedente->getCedenteId(); ?>"><?php echo $cedente->getCedenteNomerazao(); ?></option>
                                                    <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">

                                            <label>Sacado</label>
                                            <select id="sacado_id" name="sacado_id" class="form-control">
                                                <option value=""></option>
                                                <?php
                                                foreach ($this->sacados as $sacado):
                                                    ?>
                                                    <option <?php echo $this->lancamento->getSacadoId() == $sacado->getSacadoId() ? 'selected' : ''; ?> value="<?php echo $sacado->getSacadoId(); ?>"><?php echo $sacado->getSacadoNomerazao(); ?></option>
                                                    <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <?php
                                        
                                         $data = new Guga_Date($this->lancamento->getLancamentoDtvenc());
                                        
                                        ?>

                                        <div class="form-group">
                                            <label>Vencimento</label>
                                            <input value="<?php echo $data->format('d/m/Y') ?>" id="lancamento_dtvenc" name="lancamento_dtvenc" maxlength="50" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Demonstrativo</label>
                                            <textarea maxlength="500" class="form-control" id="lancamento_demonstrativo" name="lancamento_demonstrativo" rows="3"><?php echo $this->lancamento->getLancamentoDemonstrativo(); ?></textarea>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>Conta</label>
                                            <select <?php echo count($this->contas) > 0 ? '' : 'disabled="true"' ?> id="conta_id" name="conta_id" class="form-control">
                                                <option value=""></option>
                                                <?php
                                                foreach ($this->contas as $conta):
                                                    ?>
                                                    <option <?php echo $this->lancamento->getContaId() == $conta->getContaId() ? 'selected' : ''; ?> value="<?php echo $conta->getContaId(); ?>"><?php echo $conta->getContaNome(); ?></option>
                                                    <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Valor</label>
                                            <input value="<?php echo 'R$ ' . number_format($this->lancamento->getLancamentoValor(), 2, ',', '.'); ?>" id="lancamento_valor" name="lancamento_valor" maxlength="50" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select id="lancamento_status" name="lancamento_status" class="form-control">
                                                <option <?php echo $this->lancamento->getLancamentoStatus() == 'E' ? 'selected' : ''; ?> value="E">Emitido</option>
                                                <option <?php echo $this->lancamento->getLancamentoStatus() == 'P' ? 'selected' : ''; ?> value="P">Pago</option>
                                                <option <?php echo $this->lancamento->getLancamentoStatus() == 'R' ? 'selected' : ''; ?> value="R">Remessa</option>
                                                <option <?php echo $this->lancamento->getLancamentoStatus() == 'C' ? 'selected' : ''; ?> value="C">Cancelado</option>
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
