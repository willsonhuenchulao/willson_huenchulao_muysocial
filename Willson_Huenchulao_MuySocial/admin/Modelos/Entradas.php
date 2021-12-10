<?php

  class Entradas extends Conectar{
      
    private $db;  
    private $entradas; 
    private $entrada_por_id;
      
      public function __construct(){
          
        $this->db= Conectar::conexion();   
        $this->entradas=array();  
        $this->entrada_por_id=array(); 
      } 
      
      
      public function get_entradas(){
          
          $sql="select * from entradas"; 
          
          $resultado=$this->db->prepare($sql);
          
            if(!$resultado->execute()){
              
                header("Location:index.php?m=1");
            
            }else{
                
                 while($reg=$resultado->fetch()){
                     
                      $this->entradas[]=$reg;  
                 }
                
                return $this->entradas;
            }
          
      }
      
       public function insertar_entrada($id_categoria_entrada,$entrada_titulo,$entrada_autor,$entrada_imagen,$entrada_contenido,$entrada_etiquetas,$entrada_comment_count,$entrada_status){
           
          
           /*validamos que los campos no esten vacios*/
             if(empty($_POST["entrada_titulo"]) or empty($_POST["entrada_categoria"]) or empty($_POST["entrada_usuario"]) or empty($_POST["entrada_status"]) or empty($_FILES["entrada_imagen"]) or empty($_POST["entrada_etiquetas"])or empty($_POST["entrada_contenido"])){
                 
                 header("Location:entradas.php?accion=add_entrada&m=1");
                 exit();
             }
           
           $sql="insert into entradas values(null,?,?,?,now(),?,?,?,0,?)";
           
           
           $resultado= $this->db->prepare($sql);
           
           $resultado->bindValue(1,$_POST["entrada_categoria"]);
           $resultado->bindValue(2,$_POST["entrada_titulo"]);
           $resultado->bindValue(3,$_POST["entrada_usuario"]);
           $resultado->bindValue(4,$_FILES["entrada_imagen"]["name"]);
           $resultado->bindValue(5,$_POST["entrada_contenido"]);
           $resultado->bindValue(6,$_POST["entrada_etiquetas"]);
           //$resultado->bindValue(7,$_POST["entrada_comment_count"]);
           $resultado->bindValue(7,$_POST["entrada_status"]);
           
             if(!$resultado->execute()){
                  
                 header("Location:entradas.php?accion=add_entrada&m=2");
             
             }else {
                  
                  /*insertamos el registro*/
                  if($resultado->rowCount()>0){
                      
                       header("Location:entradas.php?accion=add_entrada&m=3");   
                  
                  }else{
                     header("Location:entradas.php?accion=add_entrada&m=4");  
                  }
             }  
       }
      
      
      public function get_entrada_por_id($id_entrada){
          
           
           $sql="select * from entradas where id_entrada=?";
          
           $resultado=$this->db->prepare($sql);
          
           $resultado->bindValue(1, $id_entrada);
          
             if(!$resultado->execute()){
                 
                 header("Location:entradas.php?m=1");
             
             }else{
                  /*existe el registro de la entrada*/
                  if($resultado->rowCount()>0){
                      
                      while($reg=$resultado->fetch()){
                          
                          $this->entrada_por_id[]=$reg;
                      }
                      
                      return $this->entrada_por_id;
                  
                  }else{
                     
                      header("Location:entradas.php?m=2");
                  }
             }
          
      }
      
      
        public function editar_entrada($id_entrada,$id_categoria_entrada,$entrada_titulo,$entrada_autor,$entrada_imagen,$entrada_contenido,$entrada_etiquetas,$entrada_status){
           
          
           /*validamos que los campos no esten vacios*/
             if(empty($_POST["entrada_titulo"]) or empty($_POST["entrada_categoria"]) or empty($_POST["entrada_usuario"]) or empty($_POST["entrada_status"]) or  empty($_POST["entrada_etiquetas"])or empty($_POST["entrada_contenido"])){
                 
                 header("Location:entradas.php?accion=edit_entrada&id_entrada=$id_entrada&m=1");
                 exit();
             }
           
           $sql="update entradas set
           
             id_categoria_entrada=?,
             entrada_titulo=?,
             entrada_autor=?,
             entrada_fecha=now(),
             entrada_imagen=?,
             entrada_contenido=?,
             entrada_etiquetas=?,
             entrada_status=?
             where 
             id_entrada=?
           
           
           ";
            
            $entrada_imagen= $_FILES["entrada_imagen"]["name"]; 
            $entrada_imagen_temp=$_FILES["entrada_imagen"]["tmp_name"];
            move_uploaded_file($entrada_imagen_temp,"../images/$entrada_imagen");
            
            /*validando la imagen*/
            if(empty($entrada_imagen)){
                 
               $entrada_imagen= $_POST["archivo"];  
                
             }
           
           
           $resultado= $this->db->prepare($sql);
           
           $resultado->bindValue(1,$_POST["entrada_categoria"]);
           $resultado->bindValue(2,$_POST["entrada_titulo"]);
           $resultado->bindValue(3,$_POST["entrada_usuario"]);
           $resultado->bindValue(4,$entrada_imagen);
           $resultado->bindValue(5,$_POST["entrada_contenido"]);
           $resultado->bindValue(6,$_POST["entrada_etiquetas"]);
           
           $resultado->bindValue(7,$_POST["entrada_status"]);
           $resultado->bindValue(8,$_GET["id_entrada"]);
           
             if(!$resultado->execute()){
                  
                 header("Location:entradas.php?accion=edit_entrada&id_entrada=$id_entrada&m=2");
             
             }else {
                  
                
                  if($resultado->rowCount()>0){
                      
                       header("Location:entradas.php?accion=edit_entrada&id_entrada=$id_entrada&m=3");   
                  
                  }else{
                     header("Location:entradas.php?accion=edit_entrada&id_entrada=$id_entrada&m=4");  
                  }
             }  
       }
      
         public function eliminar_entrada($id_entrada){
             
               $sql="select * from entradas where id_entrada=?"; 
             
                $resultado= $this->db->prepare($sql);
             
                $resultado->bindValue(1,$id_entrada);
             
                  if(!$resultado->execute()){
                      
                      header("Location:entradas.php?m=2");
                  
                  }else{
                      
                      if($resultado->rowCount()>0){
                          
                       
                          
                          $sql="delete from entradas where id_entrada=?";
                          
                          $resultado= $this->db->prepare($sql);
                          $resultado->bindValue(1,$id_entrada);
                          
                            if(!$resultado->execute()){
                                
                                 header("Location:entradas.php?m=2");
                                
                            }else{
                                
                                if($resultado->rowCount()>0){
                                    
                                     header("Location:entradas.php?m=6");
                                }else{
                                    
                                   header("Location:entradas.php?m=5"); 
                                }
                            }
                          
                      }else{
                          
                         header("Location:entradas.php?m=5"); 
                      }
                  }
         }
      
      
           public function get_entrada_por_id_comentario($id_entrada){
             
                    
                             $sql="select * from entradas where id_entrada=?"; 
                                                     
                            
                              $resultado=$this->db->prepare($sql);
                                                     
                              $resultado->bindValue(1,$id_entrada);
                                                     
                                if(!$resultado->execute()){
                                   
                                   header("Location:comentarios.php?m=2");
                                
                                }else{
                                    
                                    if($resultado->rowCount()>0){
                                       
                                        while($reg=$resultado->fetch()){
                                           
                                        $id_entrada=$reg["id_entrada"];
                                         $entrada_titulo=$reg["entrada_titulo"];
                                            
                                            echo "<td><a href='../entrada.php?id_entrada=$id_entrada' >$entrada_titulo</a></td>";
                                        }
                                    }
                      }
             
         }
      
      
      
  }


?>