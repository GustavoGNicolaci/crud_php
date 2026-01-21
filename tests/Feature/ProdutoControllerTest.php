<?php

namespace Tests\Feature;

use App\Models\Produto;
use Tests\TestCase;

class ProdutoControllerTest extends TestCase
{
    /**
     * Teste para validação ao armazenar produto com dados inválidos
     */
    public function test_store_falha_com_dados_invalidos()
    {
        // Dados incompletos (faltam campos obrigatórios)
        $dados = [
            'nome' => '',
            'preco' => -10,
        ];

        $response = $this->post(route('produtos.store'), $dados);

        // Verifica se há erros de validação
        $response->assertSessionHasErrors(['nome', 'preco', 'quantidade']);
    }

    /**
     * Teste para validação de preço negativo
     */
    public function test_store_rejeita_preco_negativo()
    {
        $dados = [
            'nome' => 'Produto Teste',
            'preco' => -50.00,
            'quantidade' => 10,
        ];

        $response = $this->post(route('produtos.store'), $dados);

        $response->assertSessionHasErrors(['preco']);
    }

    /**
     * Teste para validação de quantidade negativa
     */
    public function test_store_rejeita_quantidade_negativa()
    {
        $dados = [
            'nome' => 'Produto Teste',
            'preco' => 99.99,
            'quantidade' => -5,
        ];

        $response = $this->post(route('produtos.store'), $dados);

        $response->assertSessionHasErrors(['quantidade']);
    }
}
