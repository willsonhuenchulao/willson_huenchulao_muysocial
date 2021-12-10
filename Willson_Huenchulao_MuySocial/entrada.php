<?php  require_once "includes/conexion.php"; ?>
 <?php  require_once "includes/header.php"; ?>


    <!-- MENU -->
    
    <?php  include "includes/menu.php"; ?>
    
 
    
    <div class="container">

        <div class="row">

         
            
            <div class="col-md-8">
              
            
               <?php
                
                   $conectar= Conectar::conexion();
                
                   $id_entrada=$_GET["id_entrada"];
                
                   $sql="select * from entradas where id_entrada=?";
                   
                   $resultado= $conectar->prepare($sql);
                
                   $resultado->bindValue(1,$id_entrada);
                
                      if(!$resultado->execute()){
                          
                          die("fallo en la consulta");
                          exit();
                          
                      }else{
                          
                          while($reg=$resultado->fetch()){
                              
                              $id_entrada=$reg["id_entrada"];
                              $entrada_titulo=$reg["entrada_titulo"];
                              $entrada_autor=$reg["entrada_autor"];
                              $entrada_fecha=date("d-m-Y",strtotime($reg["entrada_fecha"]));
                              $entrada_imagen=$reg["entrada_imagen"];
                              $entrada_contenido=$reg["entrada_contenido"];
                              
                             ?>
                             
                                
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
                                <a class="btn btn-primary" href="#">Leer mas.. <span class="glyphicon glyphicon-chevron-right"></span></a>

                                <hr>
          
                             <?php
                          
                          }
                      }
                
                ?>

                     



        
        <?php
              
         if(isset($_POST["crear_comentario"])){
            
                $conectar= Conectar::conexion();
             
               
              
               if(empty($_POST["comentario_autor"]) or empty($_POST["comentario_email"]) or empty($_POST["comentario_contenido"])){
                    
                   echo "<h2 style='color:red'>Los campos estan vacios</h2>";
                   
               }else{

                $sql="insert into comentarios values(null,?,?,?,?,'no aprobado',now())"; 

                $resultado=$conectar->prepare($sql);

                $resultado->bindValue(1,$_GET["id_entrada"]);
                $resultado->bindValue(2,$_POST["comentario_autor"]);   
                $resultado->bindValue(3,$_POST["comentario_email"]);
                $resultado->bindValue(4,$_POST["comentario_contenido"]); 

                  if(!$resultado->execute()){

                      echo "<h2 style='color:red'>fallo en la consulta</h2>";
                  
                  }else{
                      
                      if($resultado->rowCount()>0){
                          
                          
                          $query="update entradas set entrada_comment_count =  entrada_comment_count +1 where id_entrada=?";
                          
                          $result = $conectar->prepare($query);
                          
                          $result->bindValue(1,$_GET["id_entrada"]);
                          
                             if(!$result->execute()){
                                 
                                 echo "<h2 style='color:red'>fallo en la consulta</h2>";
                             }
                          
                           echo "<h2 style='color:green'>El comentario debe ser aprobado por el administrador</h2>"; 
                          
                      }else{
                         
                            echo "<h2 style='color:red'>No se insertó el comentario</h2>";
                      }
                  }
                   
               }

         }
       
        ?>


        
        <div class="well">

            <h4>Deja un Comentario:</h4>
            <form action="#" method="post" role="form">

                <div class="form-group">
                    <label for="Autor">Autor</label>
                    <input type="text" name="comentario_autor" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" name="comentario_email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="comentario">Comentario</label>
                    <textarea name="comentario_contenido" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="crear_comentario" class="btn btn-primary">Enviar</button>
            </form>
        </div>

        <hr>
                
                
                
    
               
               
        <?php
             
             $conectar=Conectar::conexion();
             
             $id_entrada_comentario=$_GET["id_entrada"];
                
             $sql="select * from comentarios where id_entrada_comentario=? and comentario_status='aprobado' ORDER BY id_comentario DESC";
                
             $resultado=$conectar->prepare($sql);
                
             $resultado->bindValue(1, $id_entrada_comentario);
                
               if(!$resultado->execute()){
                 
                   echo "<h2 style='color:red'>fallo en la consulta</h2>";
               
               }else{
                   
                   /*existe el id de la entrada*/
                   if($resultado->rowCount()>0){
                        
                       while($reg=$resultado->fetch()){
                           
                           $comentario_fecha=date("d-m-Y", strtotime($reg["comentario_fecha"]));
                           $comentario_contenido=$reg["comentario_contenido"];
                           
                           $comentario_autor=$reg["comentario_autor"];
                          
                           ?>
                           
                                <div class="media">

                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                                    </a>
                                    <div class="media-body">
                                       <h4>       
                                           <?php echo $comentario_autor; ?>
                                            <small><?php echo $comentario_fecha; ?></small>
                                        </h4>

                                     <?php echo $comentario_contenido; ?>

                                    </div>
                                </div>
                                
                           <?php
                    
                           
                       }
                   }
               }
                
         ?>
                   

            </div>
            
              

         
            
            
            <?php require_once "includes/sidebar.php";?>
             

        </div>
        <!-- /.row -->

        <hr>

   

<?php require_once "includes/footer.php";?>
