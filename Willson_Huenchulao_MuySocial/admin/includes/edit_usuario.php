
   <h1 class="text-primary">Editar usuario</h1>
   
   
    <form action="" method="post" enctype="multipart/form-data">    
     
     
     
      <div class="form-group">
         <label for="title">Nombre</label>
          <input type="text" value="eyter" class="form-control" name="user_firstname">
      </div>
      
      
      

       <div class="form-group">
         <label for="post_status">Apellido</label>
          <input type="text" value="Higuera" class="form-control" name="user_lastname">
      </div>
     
     
         <div class="form-group">
       
       <select name="user_role" id="">
       
      
      <option value='subscriber' selected>suscriptor</option>
      <option value='admin'>administrador</option>
        
       </select>
       
       
       
       
      </div>
      


      <div class="form-group">
         <label for="post_tags">Usuario</label>
          <input type="text" value="ucevito" class="form-control" name="username">
      </div>
      
      <div class="form-group">
         <label for="post_content">Email</label>
          <input type="email" value="eyter@gmail.com" class="form-control" name="user_email">
      </div>
      
      <div class="form-group">
         <label for="post_content">Password</label>
          <input type="password" value="<?php  ?>" class="form-control" name="user_password">
      </div>
      
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="edit_user" value="Editar Usuario">
      </div>


</form>
    