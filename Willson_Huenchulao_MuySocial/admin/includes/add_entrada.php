   <?php
    
       if(isset($_POST["crear_entrada"])){
           
          $id_categoria_entrada=$_POST["entrada_categoria"]; 
          $entrada_titulo=$_POST["entrada_titulo"]; 
          $entrada_autor=$_POST["entrada_usuario"]; 
           
          $entrada_imagen=$_FILES["entrada_imagen"]["name"];
          $entrada_imagen_temp=$_FILES["entrada_imagen"]["tmp_name"]; 
          move_uploaded_file($entrada_imagen_temp,"../images/$entrada_imagen");
           
          $entrada_contenido=$_POST["entrada_contenido"]; 
          $entrada_etiquetas=$_POST["entrada_etiquetas"];        
          $entrada_comment_count=0;
          $entrada_status=$_POST["entrada_status"];               

           
            
           $entrada->insertar_entrada($id_categoria_entrada,$entrada_titulo,$entrada_autor,$entrada_imagen,$entrada_contenido,$entrada_etiquetas,$entrada_comment_count,$entrada_status);
       }


   ?>
   
   
   <?php
        
       if(isset($_GET["m"])){
           
           switch($_GET["m"]){
                   
               case "1":
               ?>
                <h2 style="color:red">El campo está vacío</h2>
               <?php
               break;
                   
                case "2":
               ?>
                <h2 style="color:red">Fallo en la consulta</h2>
               <?php
               break;
                   
               case "3":
               ?>
                <h2 style="color:green">se insertó el registro</h2>
               <?php
               break;
                   
               case "4":
               ?>
                <h2 style="color:red">no se insertó el registro</h2>
               <?php
               break;
           }   
       }

   ?>
   
   
   
   <h1 class="text-primary">Crear Entrada</h1>
   
    <form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="titulo">Titulo de la entrada</label>
          <input type="text" class="form-control" name="entrada_titulo">
      </div>

         <div class="form-group">
       <label for="categoria">Categoría</label>
       
         <select name="entrada_categoria" id="">
          <option value="">seleccione</option>
          
          <?php  
           
           $cat = $categoria->get_categorias();
              
               for($i=0;$i<count($cat);$i++){
           ?>
          
              <option value="<?php echo $cat[$i]["id_categoria"]?>"><?php echo $cat[$i]["titulo"]?></option>
          
          <?php } ?>

           
      </select>
      
      </div>


       <div class="form-group">
       <label for="usuarios">Usuario</label>
        <input type="text" class="form-control" name="entrada_usuario">
       
      
      </div>

      

       <div class="form-group">
       <label for="status">Estatus de la entrada</label>
        <input type="text" class="form-control" name="entrada_status">
         <!--<select name="entrada_status" id="">
           
             <option value="">seleccione el status</option>  
             <option value="">publicado</option>
             <option value="">borrador</option>
         </select>-->
      </div>
      
      
      
    <div class="form-group">
         <label for="entrada_imagen">Imagen de la entrada</label>
          <input type="file"  name="entrada_imagen">
      </div>

      <div class="form-group">
         <label for="entrada_etiquetas">Etiquetas de la entrada</label>
          <input type="text" class="form-control" name="entrada_etiquetas">
      </div>
      
      <div class="form-group">
         <label for="entrada_contenido">Contenido de la entrada</label>
         <textarea class="form-control" name="entrada_contenido" id="body" cols="30" rows="10">
         </textarea>
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="crear_entrada" value="Publicar entrada">
      </div>


</form>
    