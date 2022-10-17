{include file="templates/header.tpl"}

    <div class="row">
        <div class="col-9">
        <h1> Juegos </h1>
        <table class="table"> 
                <thead class="table-primary">
                    <tr>
                        <th> Imagen </th>
                        <th> Juego </th>
                        <th> Genero </th>
                        <th> Calificacion </th>
                        <th> Precio </th>
                        {if $logueado == true} <th> Opciones </th> {/if}
                    </tr>
                </thead>
                <tbody>
                {foreach from=$juegos item=$juego} 
                    <tr>
                        <td> 
                            {if isset($juego->imagen)}
                                <img width="100" class="icon img-thumbnail" src="{$juego->imagen}"/>
                            {/if}
                        </td>
                        <td> <a href='game/{$juego->id}'>{$juego->nombre}</a> </td>
                        <td> {$juego->generos} </td>
                        <td> {$juego->calificacion}/10 </td>
                        <td> 
                            {if $juego->precio > 0}
                                {$juego->precio}$ 
                            {else}
                                Gratis
                            {/if}
                         </td>
                        {if $logueado == true}
                        <td>
                            <a href='delete/{$juego->id}' type='button' class='btn btn-danger'>Borrar</a>
                            <a href='editInputs/{$juego->id}' type='button' class='btn btn-danger'>Editar</a>
                        </td>
                        {/if}
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
    <div class="col-3">
            <h1> Generos </h1>  
            <table class="table">
                <thead class="table-primary">
                <tr>
                    <th> Nombre </th>
                    {if $logueado == true}<th> Opciones </th>{/if}

                </tr>
                </thead>
                <tbody>
                {foreach from=$generos item=$genero} 
                    <tr>
                        <td> <a href='genero/{$genero->genero_id}'>{$genero->nombre}</a> </td>
                        {if $logueado == true}
                        <td> 
                            <a href='deleteGenero/{$genero->genero_id}' type='button' class='btn btn-danger'>Borrar</a>
                            <a href='editgeneroForm/{$genero->genero_id}' type='button' class='btn btn-danger'>Editar</a>
                        </td>
                        {/if}
                    </tr>
                {/foreach}
                
                </tbody>
            </table>
        </div>
        {if $logueado == true}
            <h2> Agregar nuevo genero </h2>
            {include file="templates/formGnros.tpl"}
            <h2> Agregar nuevo juego </h2>
            {include file="templates/form.tpl"}
        {/if}


{include file="templates/footer.tpl"}