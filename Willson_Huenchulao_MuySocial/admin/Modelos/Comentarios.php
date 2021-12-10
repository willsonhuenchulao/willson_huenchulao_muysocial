<?php

  class Comentarios extends Conectar{
      
    private $db;  
    private $comentarios; 
    private $comentario_por_id;
      
      public function __construct(){
          
        $this->db= Conectar::conexion();   
        $this->comentarios=array();  
        $this->comentario_por_id=array(); 
      } 
      
      
      public function get_comentarios(){
          
          $sql="select * from comentarios"; 
          
          $resultado=$this->db->prepare($sql);
          
            if(!$resultado->execute()){
              
                header("Location:index.php?m=1");
            
            }else{
                
                 while($reg=$resultado->fetch()){
                     
                      $this->comentarios[]=$reg;  
                 }
                
                return $this->comentarios;
            }
          
      }
      
      
         public function eliminar_comentario($id_comentario){
             
               $sql="select * from comentarios where id_comentario=?"; 
             
                $resultado= $this->db->prepare($sql);
             
                $resultado->bindValue(1,$id_comentario);
             
                  if(!$resultado->execute()){
                      
                      header("Location:comentarios.php?m=1");
                  
                  }else{
                      /*existe el id del registro*/ 
                      if($resultado->rowCount()>0){
                          
                          /*eliminamos el registro del comentario*/
                          
                          $sql="delete from comentarios where id_comentario=?";
                          
                          $resultado= $this->db->prepare($sql);
                          $resultado->bindValue(1,$id_comentario);
                          
                            if(!$resultado->execute()){
                                
                                 header("Location:comentarios.php?m=1");
                                
                            }else{
                                
                                if($resultado->rowCount()>0){
                                    
                                     header("Location:comentarios.php?m=3");
                                }else{
                                    
                                   header("Location:comentarios.php?m=2"); 
                                }
                            }
                          
                      }else{
                          /*no existe el id del registro*/
                         header("Location:comentarios.php?m=2"); 
                      }
                  }
         }
      
      
         public function aprobar_comentario($id_comentario){
             
               $sql="select * from comentarios where id_comentario=?"; 
             
                $resultado= $this->db->prepare($sql);
             
                $resultado->bindValue(1,$id_comentario);
             
                  if(!$resultado->execute()){
                      
                      header("Location:comentarios.php?m=1");
                  
                  }else{
                      /*existe el id del registro*/ 
                      if($resultado->rowCount()>0){
                          
                         
                          
                          $sql="update comentarios set 
                          
                            comentario_status='aprobado'
                            where id_comentario=?
                          
                          ";
                          
                          $resultado= $this->db->prepare($sql);
                          $resultado->bindValue(1,$id_comentario);
                          
                            if(!$resultado->execute()){
                                
                                 header("Location:comentarios.php?m=1");
                                
                            }else{
                                
                                if($resultado->rowCount()>0){
                                    
                                     header("Location:comentarios.php?m=4");
                                }else{
                                    
                                   header("Location:comentarios.php?m=5"); 
                                }
                            }
                          
                      }else{
                       
                         header("Location:comentarios.php?m=2"); 
                      }
                  }
         }
      
        
         public function desaprobar_comentario($id_comentario){
             
               $sql="select * from comentarios where id_comentario=?"; 
             
                $resultado= $this->db->prepare($sql);
             
                $resultado->bindValue(1,$id_comentario);
             
                  if(!$resultado->execute()){
                      
                      header("Location:comentarios.php?m=1");
                  
                  }else{
                      
                      if($resultado->rowCount()>0){
                          
                          
                          
                          $sql="update comentarios set 
                          
                            comentario_status='no aprobado'
                            where id_comentario=?
                          
                          ";
                          
                          $resultado= $this->db->prepare($sql);
                          $resultado->bindValue(1,$id_comentario);
                          
                            if(!$resultado->execute()){
                                
                                 header("Location:comentarios.php?m=1");
                                
                            }else{
                                
                                if($resultado->rowCount()>0){
                                    
                                     header("Location:comentarios.php?m=6");
                                }else{
                                    
                                   header("Location:comentarios.php?m=7"); 
                                }
                            }
                          
                      }else{
                      
                         header("Location:comentarios.php?m=2"); 
                      }
                  }
         }
      
      
  }


?>