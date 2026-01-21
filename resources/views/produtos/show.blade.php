<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produto->nome }} - Detalhes</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 20px; }
        .detail-group { margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #ddd; }
        .detail-group:last-child { border-bottom: none; }
        .label { color: #666; font-weight: bold; font-size: 12px; text-transform: uppercase; }
        .value { color: #333; font-size: 18px; margin-top: 5px; }
        .price { color: #28a745; font-size: 24px; font-weight: bold; }
        .buttons { margin-top: 30px; }
        .btn-edit { display: inline-block; padding: 12px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; margin-right: 10px; }
        .btn-edit:hover { background: #0056b3; }
        .btn-back { display: inline-block; padding: 12px 20px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px; }
        .btn-back:hover { background: #5a6268; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📦 {{ $produto->nome }}</h1>

        <div class="detail-group">
            <span class="label">ID</span>
            <div class="value">#{{ $produto->id }}</div>
        </div>

        <div class="detail-group">
            <span class="label">Descrição</span>
            <div class="value">{{ $produto->descricao ?? 'Sem descrição' }}</div>
        </div>

        <div class="detail-group">
            <span class="label">Preço</span>
            <div class="price">R$ {{ number_format($produto->preco, 2, ',', '.') }}</div>
        </div>

        <div class="detail-group">
            <span class="label">Quantidade em Estoque</span>
            <div class="value">{{ $produto->quantidade }} unidades</div>
        </div>

        <div class="detail-group">
            <span class="label">Data de Criação</span>
            <div class="value">{{ $produto->created_at->format('d/m/Y H:i') }}</div>
        </div>

        <div class="buttons">
            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn-edit">✏️ Editar</a>
            <a href="{{ route('produtos.index') }}" class="btn-back">⬅️ Voltar</a>
        </div>
    </div>
</body>
</html>
