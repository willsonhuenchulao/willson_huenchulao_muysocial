<?php  require_once "includes/conexion.php"; ?>
 <?php  require_once "includes/header.php"; ?>


    <!-- Menú -->
    
    <?php  require_once "includes/menu.php"; ?>

    
 
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            
            <div class="col-md-8">
               
               
               <?php
                
                   $conectar= Conectar::conexion();
                
                   /*$sql="select * from entradas where entrada_status='publicado'";*/
                   $sql="select * from entradas ORDER BY id_entrada DESC;";
                   
                   $resultado= $conectar->prepare($sql);
                
                      if(!$resultado->execute()){
                          
                          die("fallo en la consulta");
                          exit();
                          
                      }else{
                          /*hay registros con status publicado*/
                        if($resultado->rowCount()>0){
                          
                          while($reg=$resultado->fetch()){
                              
                              $id_entrada=$reg["id_entrada"];
                              $entrada_titulo=$reg["entrada_titulo"];
                              $entrada_autor=$reg["entrada_autor"];
                              $entrada_fecha=date("d-m-Y",strtotime($reg["entrada_fecha"]));
                              $entrada_imagen=$reg["entrada_imagen"];
                              $entrada_contenido=substr($reg["entrada_contenido"],0,100);
                              
                             ?>
                             
                                <!--<h1 class="page-header">
                                    Page Heading
                                    <small>Secondary Text</small>
                                </h1>-->

                                <!-- First Blog Post -->
                                <h2>
                                    <a href="entrada.php?id_entrada=<?php echo $id_entrada?>"><?php echo $entrada_titulo?></a>
                                </h2>
                                <p class="lead">
                                    por <a href="index.php"><?php echo $entrada_autor?></a>
                                </p>
                                <p><span class="glyphicon glyphicon-time"></span> <?php echo $entrada_fecha?></p>
                                <hr>
                                <img class="img-responsive" src="images/<?php echo $entrada_imagen?>" alt="">
                                <hr>
                                <p><?php echo $entrada_contenido?></p>
                                <a class="btn btn-primary" href="entrada.php?id_entrada=<?php echo $id_entrada?>">Leer más <span class="glyphicon glyphicon-chevron-right"></span></a>

                                <hr>
          
                             <?php
                          
                          }
                        
                        /*no hay registros publicados*/    
                        }else {
                             
                             echo "<h2 style='color:red' class='text-center'>No hay entradas publicadas</h2>";
                        }
                     }
                
                ?>

                     
            </div>
            
              

         
            
            
            <?php require_once "includes/sidebar.php";?>
             

        </div>
        <!-- /.row -->

        <hr>


        <ul class="pager">

       

        </ul>

   

<?php require_once "includes/footer.php";?>
