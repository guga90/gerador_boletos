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
                <h3>Remessa</h3>
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
                            <form role="form" method="POST" id="frmRemessa" action="<?php echo $this->baseUrl ?>/remessa/executar" >

                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select id="cedente_id" name="cedente_id" onchange="remessa.validaCampos(this);" class="form-control">
                                                <option value="E">Exportação</option>
                                                <option value="I">Importação</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Conta</label>
                                            <select disabled="true" id="conta_id" name="conta_id" class="form-control">
                                                <option value=""></option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Data Inicial</label>
                                            <input id="data_inicial" name="data_inicial" maxlength="10" class="form-control">
                                        </div>

                                    </div>
                                    
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>Cedente</label>
                                            <select id="cedente_id" name="cedente_id" onchange="remessa.popularConta(this);" class="form-control">
                                                <option value=""></option>
                                                <?php
                                                foreach ($this->cedentes as $cedente):
                                                    ?>
                                                    <option value="<?php echo $cedente->getCedenteId(); ?>"><?php echo $cedente->getCedenteNomerazao(); ?></option>
                                                    <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Remessa de retorno</label>
                                            <input type="file" />
                                        </div>

                                        <div class="form-group">
                                            <label>Data Final</label>
                                            <input id="data_final" name="data_final" maxlength="10" class="form-control">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Executar</button>
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
