{include file="header.tpl"}

<div class="container">
  
  <form method="POST" action="registerNewUsser">
    <div class="form-group">
      <label for="name">Nombre: </label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
    </div>
    <div class="form-group">
      <label for="lastName">Apellido: </label>
      <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Apellido">
    </div>
    <div class="form-group">
      <label for="email">Email: </label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Ingrese email">
    </div>
    <div class="form-group">
      <label for="password">Password: </label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese el password">
    </div>
    <div class="form-group">  
      <label for="passwordRep">Repita el Password: </label>
      <input type="password" class="form-control" id="passwordRep" name="passwordRep" placeholder="Repita el password">
    </div>
    {if $error}
      <div class="alert alert-danger">
        {$error}
      </div>
    {/if}
    <button type="submit" class="btn btn-check" >Registrarse</button>
  </form>
</div>
{include file="footer.tpl"}