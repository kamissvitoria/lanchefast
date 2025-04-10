<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome' => 'Cliente 1',
            'endereco' => 'Rua exemplo, 123',
            'telefone' => '999124832',
            'cpf' => '12345678901',
            'email' => 'teste@email.com',
            'senha' => bcrypt('senha123')
        ]);

        Cliente::create([
            'nome' => 'Cliente 2',
            'endereco' => 'Rua exemplo, 123',
            'telefone' => '9813920040',
            'cpf' => '12345678910',
            'email' => 'teste2@email.com',
            'senha' => bcrypt('senha123')
        ]);

        Cliente::create([
            'nome' => 'Cliente 3',
            'endereco' => 'Rua exemplo, 123',
            'telefone' => '993241934',
            'cpf' => '12345678920',
            'email' => 'teste3@email.com',
            'senha' => bcrypt('senha123')
        ]);
    }
}
