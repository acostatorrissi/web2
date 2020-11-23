{include file="header_admin.tpl"} <!-- VER -->
{include file="admin_table.tpl"}

    {if $edit==true}
        {assign "buttonName" "Editar"} 
        {include file="form_edit.tpl"}
    {else}
        {assign "buttonName" "Agregar"}
        {include file="form_insert.tpl"}     
    {/if}

{include file="selectCategories.tpl"}
{include file="footer.tpl"}