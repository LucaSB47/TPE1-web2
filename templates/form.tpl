<form action="addgame" method="POST" class="my-4" enctype="multipart/form-data">
    <div class="m-5 row justify-content-center">
        <div class="">
            <div class="form-group">
                
                <label>juego</label>
                <input name="juego" type="text" class="form-control">
                <label>descripcion</label>
                <input name="descripccion" type="text" class="form-control">
                <label>Genero</label>
                <select name="idg" class="form-control">
                    {foreach from=$generos item=$genero}
                        <option value="{$genero->genero_id}">{$genero->nombre}</option>
                    {/foreach}
                </select>
                <label>precio</label>
                <input name="precio" type="number" class="form-control">
                <label>calificacion</label>
                <select name="calificacion" class="form-control">
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
                <br>
                <label>Imagen </label>
                <input type="file" name="gameimg" id="imageToUpload">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2 center-block">Guardar</button>
</form>
