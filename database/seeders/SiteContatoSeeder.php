<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;
use Illuminate\Support\Facades\DB;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$contato = new SiteContato();

        $contato->nome = "Paulo";
        $contato->telefone = "(34) 99660-5050";
        $contato->email = "paulofiori34@gmail.com";
        $contato->motivo = 1;
        $contato->mensagem = "Como mudo a cor do site?";

        $contato->save();

        SiteContato::create([
            'nome' => "Jorge",
            'telefone' => "(11) 99660-6060",
            'email' => "jorge@gmail.com",
            'motivo' => 2,
            'mensagem' => "Estou adorandando o site, continuem assim."
        ]);

        DB::table('site_contatos')->insert([
            'nome' => "Gabriel",
            'telefone' => "(34) 99660-1010",
            'email' => "gabriel@gmail.com",
            'motivo' => 3,
            'mensagem' => "Site muito difícil de mexer, não estou gostando."
        ]);*/

       SiteContato::factory()->count(100)->create();
    }
}
