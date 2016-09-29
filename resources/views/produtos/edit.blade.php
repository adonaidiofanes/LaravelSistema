<h1>Editar produto</h1>
<form action="/produtos/{{ $detailpage->id }}" method="POST">
    <input type="text" name="nome" value="{{ $detailpage->nome }}" placeholder="Nome">
    {{ ($errors->has('nome')) ? $errors->first('nome') : '' }}<br>
    <textarea name="descricao" rows="8" cols="40" placeholder="Descricao">{{ $detailpage->descricao }}</textarea>
    {{ ($errors->has('descricao')) ? $errors->first('descricao') : '' }}<br>
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="name" value="Salvar">
</form>

