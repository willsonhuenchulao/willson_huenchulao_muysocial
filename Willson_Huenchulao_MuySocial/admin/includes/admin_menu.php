       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">BACKEND -  MuySocial</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

              <!--   <li><a href="">Users Online: <?php //echo users_online(); ?></a></li> -->

                <li><a href="">Usuarios Online: <span class="usersonline"><span class="badge badge-primary">2</span></span></a></li>
            
              <!--el admin_navigation.php se llama en el index.php del admin luego para ir al index.php(fuera de la carpeta admin solo tendriamos que salir de la carpeta admin y listo)-->
               <li><a href="../index.php">Inicio</a></li>
               
               
               
    
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    

                     usuario               
                    
                    
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                           
                           
                           
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li class="divider"></li>
                        
                    </ul>
                </li>
            </ul>
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Escritorio</a>
                    </li>
                
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i>Entradas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./entradas.php"> Todas las entradas</a>
                            </li>
                            <li>
                                <a href="entradas.php?accion=add_entrada">Añadir nueva entrada</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./categorias.php"><i class="fa fa-fw fa-wrench"></i> Categorias</a>
                    </li>
                   
                    <li class="">
                        <a href="comentarios.php"><i class="fa fa-fw fa-comments"></i> Comentarios</a>
                    </li>
                    
                    
                    
                    
                    
                </ul>
            </div>
            
            
            
            <!-- /.navbar-collapse -->
        </nav>
        