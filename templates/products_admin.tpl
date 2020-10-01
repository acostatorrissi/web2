{include file="header.tpl"}
{include file="admin_table.tpl"}

    {if $edit==true}
        {include file="form_edit.tpl"} 
    {else}
        {include file="form.tpl"}
    {/if}

{include file="footer.tpl"}