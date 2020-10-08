                <select name="id_categoria" id="select-tabla">
                    {foreach from=$categorias item=category}
                        <option value={$category->id_categoria}>
                            {$category->nombre|upper}
                        </option>
                    {/foreach}
                </select>   
                <button class="btn btn-check">{$buttonName}</button>   
            </form>     
        </div> 
  </div> 


