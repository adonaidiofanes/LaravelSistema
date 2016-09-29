<h1>Adicionar novo produto</h1>
<form class="" action="/produtos" method="POST">
    <input type="text" name="nome" value="" placeholder="Nome">
    {{ ($errors->has('nome')) ? $errors->first('nome') : '' }}<br>
    <textarea name="descricao" rows="8" cols="40" placeholder="Descricao"></textarea>
    {{ ($errors->has('descricao')) ? $errors->first('descricao') : '' }}<br>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="name" value="Salvar">
</form>