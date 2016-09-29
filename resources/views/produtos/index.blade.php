{{ Session::get('message') }}
<h1>Produtos</h1>

    @foreach($todosprodutos as $produto)
        <h2><a href="/produtos/{{ $produto->id }}">{{ $produto->nome }}</a></h2>
        <p>{{ $produto -> descricao }}</p>
        <a href="/produtos/{{ $produto->id }}/edit">Editar</a>
        <form action="/produtos/{{ $produto->id }}" method="POST">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" name="name" value="Apagar">
        </form>
        <hr>
    @endforeach
    
    