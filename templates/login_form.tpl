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
    {if $error}
      <div class="alert alert-danger">
        {$error}
      </div>
    {/if}
    <button type="submit" class="btn btn-check" >Ingresar</button>
  </form>
  <form method="GET" action="register">
      <button type="submit" class="btn btn-check">Registrarse</button>
  </form>
</div>
{include file="footer.tpl"}