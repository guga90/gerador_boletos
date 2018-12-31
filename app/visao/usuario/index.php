<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-block-head">
                <a href="<?php echo $this->baseUrl ?>/usuario/novo" 
                   class="btn btn-info btn-sm pull-right">Novo</a>
                <h3>Usuário</h3>
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
                                    <th>CPF</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($this->usuarios as $usuario):  
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $usuario->getUsuarioCpf(); ?></td>
                                        <td><?php echo $usuario->getUsuarioNome(); ?></td>
                                        <td><?php echo $usuario->getUsuarioTelefone(); ?></td>
                                        <td><?php echo $usuario->getUsuarioStatus() == 'A' ? 'Ativo' : 'Inativo'; ?></td>
                                        <td>
                                            <a title="Editar" href="<?php echo $this->baseUrl . '/usuario/novo/id/' . $usuario->getUsuarioId(); ?>" class="btn btn-primary btn-xs">
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