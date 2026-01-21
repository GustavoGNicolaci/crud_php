<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 1000px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 20px; }
        .btn-new { display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; margin-bottom: 20px; }
        .btn-new:hover { background: #0056b3; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #007bff; color: white; padding: 12px; text-align: left; }
        td { padding: 12px; border-bottom: 1px solid #ddd; }
        tr:hover { background: #f9f9f9; }
        .btn-edit { padding: 5px 10px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; margin-right: 5px; }
        .btn-edit:hover { background: #218838; }
        .btn-delete { padding: 5px 10px; background: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .btn-delete:hover { background: #c82333; }
        .alert { padding: 12px; margin-bottom: 20px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .empty { text-align: center; color: #999; padding: 40px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🛍️ Produtos</h1>
        
        @if ($message = session('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <a href="{{ route('produtos.create') }}" class="btn-new">+ Novo Produto</a>

        @if ($produtos->isEmpty())
            <div class="empty">
                <p>Nenhum produto cadastrado. <a href="{{ route('produtos.create') }}">Criar um novo</a></p>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ Str::limit($produto->descricao, 50) }}</td>
                            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            <td>{{ $produto->quantidade }}</td>
                            <td>
                                <a href="{{ route('produtos.show', $produto->id) }}" class="btn-edit">Ver</a>
                                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn-edit">Editar</a>
                                <form style="display:inline;" method="POST" action="{{ route('produtos.destroy', $produto->id) }}" onsubmit="return confirm('Tem certeza que deseja deletar?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
