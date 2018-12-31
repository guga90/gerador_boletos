<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-block-head">
                <a href="<?php echo $this->baseUrl ?>/lancamento/novo" 
                   class="btn btn-info btn-sm pull-right">Novo</a>
                <h3>Lançamento</h3>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>Cedente</th>
                                    <th>Banco</th>
                                    <th>Sacado</th>
                                    <th>Valor</th>
                                    <th>Vencimento</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($this->lancamentos as $lancamento):
                                    
                                    $data = new Guga_Date($lancamento->getLancamentoDtvenc());
                                    
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $lancamento->getCedenteNomeRazao(); ?></td>
                                        <td><?php echo $lancamento->getBancoCodigo() . ' - ' . $lancamento->getBancoNome(); ?></td>
                                        <td><?php echo $lancamento->getSacadoNomeRazao(); ?></td>
                                        <td><?php echo 'R$ ' . number_format($lancamento->getLancamentoValor(), 2, ',', '.'); ?></td>
                                        <td><?php echo $data->format('d/m/Y') ?></td>
                                        <td><?php
                                            switch ($lancamento->getLancamentoStatus()) {
                                                case 'E':
                                                    echo 'Emitido';
                                                    break;
                                                case 'P':
                                                    echo 'Pago';
                                                    break;
                                                case 'R':
                                                    echo 'Remessa';
                                                    break;
                                                case 'C':
                                                    echo 'Cancelado';
                                                    break;
                                            }
                                            ?>



                                        </td>
                                        <td>
                                            <a title="Editar" href="<?php echo $this->baseUrl . '/lancamento/novo/id/' . $lancamento->getLancamentoId(); ?>" class="btn btn-primary btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                              
                                            <a title="Boleto" onclick="lancamento.visualizar('<?php echo md5($lancamento->getLancamentoId()); ?>', '<?php echo $lancamento->getBancoCodigo(); ?>');" class="btn btn-danger btn-xs">
                                                <i class="fa fa-archive"></i>
                                            </a>
                              
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>

<!-- /.row -->
<script>
    $(document).ready(function() {
        $('.dataTables').DataTable({
            responsive: true
        });
    });
</script>