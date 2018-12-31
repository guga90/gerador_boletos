<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-block-head">
                <a href="<?php echo $this->baseUrl ?>/cedente/novo" 
                   class="btn btn-info btn-sm pull-right">Novo</a>
                <h3>Cedente</h3>
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
                                    <th>CPF/CNPJ</th>
                                    <th>Nome/Razão Social</th>
                                    <th>Telefone</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($this->cedentes as $cedente):
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $cedente->getCedenteCpfCnpj(); ?></td>
                                        <td><?php echo $cedente->getCedenteNomeRazao(); ?></td>
                                        <td><?php echo $cedente->getCedenteTelefone(); ?></td>
                                        <td><?php echo $cedente->getCedenteStatus() == 'A' ? 'Ativo' : 'Inativo'; ?></td>
                                        <td>
                                            <a title="Editar" href="<?php echo $this->baseUrl . '/cedente/novo/id/' . $cedente->getCedenteId(); ?>" class="btn btn-primary btn-xs">
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
    $(document).ready(function() {
        $('.dataTables').DataTable({
            responsive: true
        });
    });
</script>