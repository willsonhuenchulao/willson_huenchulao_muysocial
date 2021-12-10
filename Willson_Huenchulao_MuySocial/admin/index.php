<?php require_once "includes/admin_header.php";?>
   
   
   
    <div id="wrapper">

<?php

      /*if(Conectar::conexion()){
          
          echo "<h2 style='color:green'>conectado</h2>";
      }else{
          
          echo "<h2 style='color:red'>error de conexion</h2>";
      }*/

   ?>

        <!-- Navigation -->
 
        <?php require_once "includes/admin_menu.php" ?>
        
   
        <div id="page-wrapper">

            <div class="container-fluid">

                
                <div class="row">
                    <div class="col-lg-12">
                      
                      <?php
                        
                         if(isset($_GET["m"])){
        
                            switch($_GET["m"]){

                                case "1":
                                ?>
                                 <h2 style="color:red">Fallo en la consulta en el listado de los registros de las entradas</h2>
                                <?php
                                break;
                            }

                        }
                        
                        
                       ?>
                       
                       
                        <h1 class="page-header">
                            
                            BACKEND - MuySocial
                            
                         
                        </h1>

                    </div>
                </div>
       
                <!-- /.row -->
                
       
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      
                      
                         <div class="huge">40</div>

                        <div>Entradas</div>
                    </div>
                </div>
            </div>
            <a href="entradas.php">
                <div class="panel-footer">
                    <span class="pull-left">Ver Detalles</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                     
                                       <div class="huge">30</div>
           
                                      <div>Comentarios</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comentarios.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <div class="huge">10</div>

                                       
                                        <div> Usuarios</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                     <div class="huge">5</div>

                                   <div>Categorías</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categorias.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                                

                <div class="row">
                
                   
                   
                  <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                    
              </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        
    
        <!-- /#page-wrapper -->
        
    <?php require_once "includes/admin_footer.php" ?>

       

      