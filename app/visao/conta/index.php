<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-block-head">
                <a href="<?php echo $this->baseUrl ?>/conta/novo" 
                   class="btn btn-info btn-sm pull-right">Novo</a>
                <h3>Conta</h3>
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
                                    <th>Agência</th>
                                    <th>Conta</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($this->contas as $conta):  
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $conta->getCedenteNomerazao(); ?></td>
                                        <td><?php echo $conta->getBancoCodigo() . ' - ' . $conta->getBancoNome(); ?></td>
                                        <td><?php echo $conta->getContaAgencia(); ?></td>
                                        <td><?php echo $conta->getContaNumero(); ?></td>
                                        <td><?php echo $conta->getContaStatus() == 'A' ? 'Ativo' : 'Inativo'; ?></td>
                                        <td>
                                            <a title="Editar" href="<?php echo $this->baseUrl . '/conta/novo/id/' . $conta->getContaId(); ?>" class="btn btn-primary btn-xs">
                                                <i class="fa fa-edit"></i>
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
    $(document).ready(function () {
        $('.dataTables').DataTable({
            responsive: true
        });
    });
</script>