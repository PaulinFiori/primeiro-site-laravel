<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();

        $fornecedor->nome = "Fornecedor 1";
        $fornecedor->site = "fornecedor1.com.br";
        $fornecedor->uf = "MG";
        $fornecedor->email = "contato@fornecedor1.com";

        $fornecedor->save();

        Fornecedor::create([
            'nome' => "Fornecedor 2",
            'site' => "fornecedor2.com.br",
            'uf' => "SP",
            'email' => "contato@fornecedor2.com"
        ]);

        DB::table('fornecedores')->insert([
            'nome' => "Fornecedor 3",
            'site' => "fornecedor3.com.br",
            'uf' => "RJ",
            'email' => "contato@fornecedor3.com"
        ]);
    }
}
