<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Produto</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #333; font-weight: bold; }
        input, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; }
        input:focus, textarea:focus { outline: none; border-color: #007bff; box-shadow: 0 0 5px rgba(0,123,255,0.3); }
        textarea { resize: vertical; min-height: 100px; }
        .btn-submit { padding: 12px 20px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        .btn-submit:hover { background: #0056b3; }
        .btn-cancel { padding: 12px 20px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px; margin-left: 10px; }
        .btn-cancel:hover { background: #5a6268; }
        .buttons { margin-top: 20px; }
        .error { color: #dc3545; font-size: 12px; margin-top: 5px; }
        .form-group.has-error input,
        .form-group.has-error textarea { border-color: #dc3545; }
    </style>
</head>
<body>
    <div class="container">
        <h1>✏️ Novo Produto</h1>

        <form action="{{ route('produtos.store') }}" method="POST">
            @csrf

            <div class="form-group @error('nome') has-error @enderror">
                <label for="nome">Nome do Produto *</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
                @error('nome')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group @error('descricao') has-error @enderror">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao">{{ old('descricao') }}</textarea>
                @error('descricao')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group @error('preco') has-error @enderror">
                <label for="preco">Preço (R$) *</label>
                <input type="number" id="preco" name="preco" step="0.01" min="0" value="{{ old('preco') }}" required>
                @error('preco')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group @error('quantidade') has-error @enderror">
                <label for="quantidade">Quantidade *</label>
                <input type="number" id="quantidade" name="quantidade" min="0" value="{{ old('quantidade') }}" required>
                @error('quantidade')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="buttons">
                <button type="submit" class="btn-submit">💾 Salvar Produto</button>
                <a href="{{ route('produtos.index') }}" class="btn-cancel">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
