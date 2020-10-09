{include file="header.tpl"}
<div class="container">
    <div class="wrapperProduct">
        <h1 class="hProduct">{$producto->nombre|upper}</h1>
        <p class="pProduct">{$producto->descripcion}</p>
        <h2>${$producto->precio}</h2>
    </div>
    <figure class="figProduct">
            <img src={$producto->img_url} alt="{$producto->nombre}" class="imgProduct">
    </figure>
</div>
{include file="footer.tpl"}