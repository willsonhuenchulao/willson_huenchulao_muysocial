<?php require_once "includes/admin_header.php" ?>
<?php require_once("Modelos/Categorias.php");?>
   
<?php  
   
    $categoria= new Categorias();

    $datos= $categoria->get_categorias();

      
        if(isset($_POST["submit"])){
              
             $categoria->insertar_categoria($_POST["cat_titulo"]);
             //exit();
         } 

      

      if(isset($_GET["eliminar"])){
            
           $categoria->eliminar_categoria($_GET["eliminar"]);
      }

     
      

      if(isset($_POST["editar_categoria"])){
             
            $categoria->editar_categoria($_GET["editar"],$_POST["cat_titulo"]);
      }

?>
    

    <div id="wrapper">
       
        <!-- Navigation -->
 
        <?php require_once "includes/admin_menu.php" ?>
        
        
    

<div id="page-wrapper">

<div class="container-fluid">

    
    <div class="row">
        <div class="col-lg-12">


            <h1 class="page-header">
                BACKEND - MuySocial
               
            </h1>
            
            <h1 class="text-primary">Categorías</h1>


            <div class="col-xs-6">
      
    
          
    <?php
        
         if(isset($_GET["m"])){
             
             switch($_GET["m"]){
              
                 case "1":
                 ?>
                 <h2 style='color:red'>El campo está vacío</h2> 
                 <?php
                 break;
                     
                 case "2":
                 ?>
               
                 <h2 style='color:red'>Fallo en la consulta</h2>
                 <?php
                 break;
                     
                  case "3":
                 ?>
               
                <h2 style='color:red'>ya existe la categoria</h2>
                 <?php
                 break;
                     
                 case "4":
                 ?>
               
                <h2 style='color:green'>se ha insertado la categoria</h2>
                 <?php
                 break;
                     
                  case "5":
                 ?>
               
                 <h2 style='color:red'>no se ha insertado la categoria</h2>
                 <?php
                 break;
                     
                 case "6":
                 ?>
               
                 <h2 style='color:green'>se ha eliminado la categoria</h2>
                 <?php
                 break;
                     
                 case "7":
                 ?>
               
                 <h2 style='color:red'>no existe el id de la categoria</h2>
                 <?php
                 break;
                     
                  case "8":
                 ?>
               
                 <h2 style='color:green'>se ha editado la categoria</h2>
                 <?php
                 break;
                     
                  case "9":
                 ?>
               
                 <h2 style='color:red'>no se ha editado la categoria</h2>
                 <?php
                 break;
             }   
         }
                
    ?>     
           
    
    <form action="" method="post">
      <div class="form-group">
         <label for="cat-titulo">Añadir categoría</label>
          <input type="text" class="form-control" name="cat_titulo">
      </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="submit" value="Añadir Categoria">
      </div>

    </form>
    
  
       
       <?php
          
           if(isset($_GET["editar"])){
               
                require_once("includes/edit_categorias.php");
           }          
                
       ?>

    
    </div>

            <div class="col-xs-6">
    <table class="table table-bordered table-hover">
      

        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo de la Categoría</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>

       <?php
              
               for($i=0;$i<count($datos);$i++){
                   
        
       ?>
   
    
              <tr>
                  <td><?php echo $datos[$i]["id_categoria"];?></td>
                  <td><?php echo $datos[$i]["titulo"];?></td>
                  <td><a class="btn btn-primary " href='categorias.php?editar=<?php echo $datos[$i]["id_categoria"]?>'><i class="fa fa-pencil"></i>  Editar</a></td>
                  <td><a class="btn btn-danger" href='categorias.php?eliminar=<?php echo $datos[$i]["id_categoria"]?>'><i class="fa fa-trash"></i>  Eliminar</a></td>
              </tr>        

  <?php 
               
        } 

            
   ?>
        </tbody>
    </table>
                    
                        
                </div>        


            </div>
        </div>
        

    </div>
  

</div>

        
             
        
        
    <?php require_once "includes/admin_footer.php" ?>
