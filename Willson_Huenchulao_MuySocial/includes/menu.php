   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
           
           
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">MuySocial</a>
            </div>
            
            
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                
                 <?php
                    
                   $conectar= Conectar::conexion();
                    
                   $sql="select * from categorias";
                   
                   $resultado = $conectar->prepare($sql);
                    
                   
                     if(!$resultado->execute()){
                         
                        die("fallo en la consulta");
                         
                     }else{
                        
                         while($reg= $resultado->fetch()){
                           
                             $cat_titulo=$reg["titulo"];
                             
                             echo "<li><a href='#'>$cat_titulo</a></li>";
                             
                         }
                         
                     }
                    
                    
                    
                 ?>
                 
                 
                <li><a href='admin'>Admin</a></li>  
                 

               

           
                </ul>
            </div>
           
        </div>
        
    </nav>
