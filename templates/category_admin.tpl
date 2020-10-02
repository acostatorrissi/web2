{include file="header.tpl"}
{include file="table_category.tpl"}

   {if $edit==true}
        {include file="category_edit.tpl"} 
    {else}
        {include file="category_insert.tpl"}
    {/if}


{include file="footer.tpl"}