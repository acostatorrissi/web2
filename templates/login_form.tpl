{include file="header.tpl"}

<div class="container">
  <form method="POST" action="verify">
    <div class="form-group">
      <label for="email">Email: </label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="password">Password!: </label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-check" >Iniciar sesión</button>
     {if $error}
      <div class="alert alert-danger mt-4">
        {$error}
      </div>
    {/if}
  </form>

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
    <button type="submit" class="btn btn-check">Registrarse</button>
  </form>
</div>
{include file="footer.tpl"}