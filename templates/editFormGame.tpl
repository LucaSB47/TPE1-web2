{include file="templates/header.tpl"}

<h1> Editar juego </h1>
<form action='editGame/{$juego->id}' method="POST" class="my-4">
    <div class="m-5 row justify-content-center">
        <div class="">
            <div class="form-group">
                <label>juego</label>
                <input name="juego" type="text" class="form-control" value="{$juego->nombre}">
                <label>descripcion</label>
                <input name="descripccion" type="text" class="form-control" value="{$juego->descripcion}">
                <label>Genero</label>
                <select name="idg" type="number" class="form-control" value="{$juego->genero_id}">
                {foreach from=$generos item=$genero}
                    <option value="{$genero->genero_id}">{$genero->nombre}</option>
                {/foreach}
                </select>
                <label>precio</label>
                <input name="precio" type="number" class="form-control" value="{$juego->precio}">
            </div>
        </div>

        <div class="">
            <div class="form-group">
                <label>calificacion</label>
                <select name="calificacion" class="form-control" value="{$juego->calificacion}">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2 center-block">Editar</button>
</form>
{include file="templates/footer.tpl"}