<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo $this->baseUrl; ?>/index/">BOLETO</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="<?php echo $this->baseUrl; ?>/login/logout">
                        <i class="fa fa-sign-out fa-fw">
                        </i> Sair</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?php echo $this->baseUrl; ?>/lancamento/index">
                        <i class="fa fa-files-o fa-fw"></i>
                        </i> Lançamento</a>
                </li>
                <li>
                    <a href="<?php echo $this->baseUrl; ?>/cedente/index">
                        <i class="fa fa-files-o fa-fw"></i>
                        </i> Cedente</a>
                </li>
                <li>
                    <a href="<?php echo $this->baseUrl; ?>/conta/index">
                        <i class="fa fa-files-o fa-fw"></i>
                        </i> Conta</a>
                </li>
                <li>
                    <a href="<?php echo $this->baseUrl; ?>/sacado/index">
                        <i class="fa fa-files-o fa-fw"></i>
                        </i> Sacado</a>
                </li>
                <li>
                    <a href="<?php echo $this->baseUrl; ?>/remessa/index">
                        <i class="fa fa-files-o fa-fw"></i>
                        </i> Remessa</a>
                </li>
                <li>
                    <a href="<?php echo $this->baseUrl; ?>/usuario/index">
                        <i class="fa fa-files-o fa-fw"></i>
                        </i> Usuário</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>