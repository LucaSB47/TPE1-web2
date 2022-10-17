{include file="templates/header.tpl"}
<h1> Editar genero </h1>
<form action='editGenero/{$generos->genero_id}' method="POST" class="my-4">
    <div class="m-5 row justify-content-center">
        <div class="">
            <div class="form-group">
                <label>genero</label>
                <input name="genero" type="text" class="form-control" value="{$generos->nombre}">
            </div>
        </div>
    <div>    
        <button type="submit" class="btn btn-primary mt-2 center-block">Editar</button>
    </div>
</form>

{include file="templates/footer.tpl"}