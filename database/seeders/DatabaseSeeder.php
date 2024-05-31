<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Cliente::factory(10)->create();

        Produto::create([
            'nome' => 'SAL BARRAK 12KG',
            'preco_compra' => 150.00,
            'preco_venda' => 200.00,
            'percentual_lucro' => 35,
            'estoque' => 10,
            'estoque_minimo' => 3,
        ]);

        Produto::create([
            'nome' => 'VIT-C BARRAK 150ml',
            'preco_compra' => 123.00,
            'preco_venda' => '159,99',
            'percentual_lucro' => 35,
            'estoque' => 5,
            'estoque_minimo' => 1,
        ]);

        Produto::create([
            'nome' => 'SAL REEFLOWERS 6.5KG',
            'preco_compra' => 203.00,
            'preco_venda' => 289.00,
            'percentual_lucro' => 35,
            'estoque' => 10,
            'estoque_minimo' => 3,
        ]);

        Produto::create([
            'nome' => 'BOMBA OCEANTECH 5000L/H',
            'preco_compra' => 150.00,
            'preco_venda' => 239.00,
            'percentual_lucro' => 35,
            'estoque' => 5,
            'estoque_minimo' => 1,
        ]);

        Produto::create([
            'nome' => 'RAÇÃO VITALIS 40G',
            'preco_compra' => 150.00,
            'preco_venda' => 189.00,
            'percentual_lucro' => 35,
            'estoque' => 20,
            'estoque_minimo' => 10,
        ]);

        Produto::create([
            'nome' => 'FIREFISH',
            'preco_compra' => 99.00,
            'preco_venda' => 250.00,
            'percentual_lucro' => 35,
            'estoque' => 2,
            'estoque_minimo' => 0,
        ]);

        Produto::create([
            'nome' => 'ZOANTHUS 1 POLIPO',
            'preco_compra' => 30.00,
            'preco_venda' => 50.00,
            'percentual_lucro' => 35,
            'estoque' => 15,
            'estoque_minimo' => 10,
        ]);

        Produto::create([
            'nome' => 'LUMINARIA PAPERLED 30W 220V',
            'preco_compra' => 1400.00,
            'preco_venda' => 1899.00,
            'percentual_lucro' => 35,
            'estoque' => 1,
            'estoque_minimo' => 0,
        ]);
    }
}
