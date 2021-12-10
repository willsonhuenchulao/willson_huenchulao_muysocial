

<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                
            

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Buscador</h4>
                    <form action="buscar.php" method="post">
                    <div class="input-group">
                        <input name="buscar" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form><!--search form-->
                    <!-- /.input-group -->
                </div>
                
                
                
  <!--Login -->
    <div class="well">



             <h4>Iniciar Sesion</h4>

                <form method="post">
                <div class="form-group">
                    <input name="usuario" type="text" class="form-control" placeholder="Escriba el usuario">
                </div>

                  <div class="input-group">
                    <input name="password" type="password" class="form-control" placeholder="Enter Password">
                    <span class="input-group-btn">
                       <button class="btn btn-primary" name="login" type="button"><a href="admin"> Enviar </a></button>
                    </span>
                   </div>

                    <div class="form-group">

                        <a href="#">Olvidó su password</a>


                    </div>

                </form>
               

       
    </div>
                
                
                
                

            
                <div class="well">
                  
                  
                  
       
                 <h4>Blog Categorias</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                            
                            <?php
                                
                             $conectar=Conectar::conexion();    
                                
                              $sql="select * from categorias";
                              
                              $resultado=$conectar->prepare($sql);
                               
                                if(!$resultado->execute()){
                                    
                                  die("fallo en la consulta");
                                    
                                }else{
                                    
                                    while($reg=$resultado->fetch()){
                                        
                                        $cat_titulo=$reg["titulo"];
                                        
                                       echo "<li><a href='#'>$cat_titulo</></li>";
                                    } 
                                
                                }
                                
                            ?>
                             
                           
                             
                            </ul>
                        </div>
                        
                    </div>
                    
                </div>
                
              
                 <?php require_once "widget.php"; ?>

            </div>
            