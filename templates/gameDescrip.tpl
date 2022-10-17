{include file="templates/header.tpl"}
    <div class="container">
        <div class="row">
            {foreach from=$juegos item=$juego}
                {if $id eq $juego->id}
                <div class="col-6">
                    <img class="imgDescrp icon img-thumbnail" src="{$juego->imagen}"/>
                </div>
                <div class="col-6 text-center">
                
                    
                        <h1> {$juego->nombre} </h1>

                    <p>Descripccion: {$juego->descripcion} </p>

                    <p>Calificacion: {$juego->calificacion} </p>

                    <p>Precio: {$juego->precio} $ </p>
                    
                
                </div>
            </div>
            {/if}
        {/foreach}
    </div>
{include file="templates/footer.tpl"}