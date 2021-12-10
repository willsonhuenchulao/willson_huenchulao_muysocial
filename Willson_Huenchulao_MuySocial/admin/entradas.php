<?php require_once "includes/admin_header.php" ?>
    
<?php require_once("Modelos/Entradas.php");?>
<?php require_once("Modelos/Categorias.php")?>
    
<?php

    $entrada = new Entradas();
    $categoria= new Categorias();
   
    $datos= $entrada->get_entradas();

     
?>

    <div id="wrapper">
        
  

      
 
        <?php require_once "includes/admin_menu.php" ?>
        
        
    

<div id="page-wrapper">

<div class="container-fluid">

   
    <div class="row">
        <div class="col-lg-12">

  <h1 class="page-header">
             
               BACKEND - MuySocial
                
  </h1>
           
           
<?php
            
     if(isset($_GET["m"])){
         
         switch($_GET["m"]){
           
             case "2":
             ?>
               <h2 style="color:red">fallo en la consulta</h2>
             <?php
             break;
                 
             case "5":
             ?>
               <h2 style="color:red">No existe el registro de la entrada</h2>
             <?php
             break;
                 
             case "6":
             ?>
               <h2 style="color:green">se ha eliminado el registro de la entrada</h2>
             <?php
             break;
         }
     }            
?>           
           
            
            
<?php
    
if(isset($_GET['accion'])){

$accion = $_GET['accion'];

} else {

$accion = '';

}

switch($accion) {
    
    case 'add_entrada';
    
     require_once "includes/add_entrada.php";
    
    break; 
    
    
    case 'edit_entrada';
    
    require_once "includes/edit_entrada.php";
        
    break;
    

    default:
    
    require_once "includes/ver_entradas.php";
    
    break;
        
    
}
        
        


?>

            </div>
        </div>
       

    </div>
    

</div>

     
        
        
    <?php require_once "includes/admin_footer.php" ?>
