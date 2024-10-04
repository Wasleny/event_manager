<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Conferência'],
            ['name' => 'Seminário'],
            ['name' => 'Workshop'],
            ['name' => 'Treinamento'],
            ['name' => 'Lançamento de produto'],
            ['name' => 'Feira de negócios'],
            ['name' => 'Convenção'],
            ['name' => 'Evento de networking'],
            ['name' => 'Jantar de gala'],
            ['name' => 'Festa temática'],
            ['name' => 'Festival de música'],
            ['name' => 'Exposição de arte'],
            ['name' => 'Mostra de cinema'],
            ['name' => 'Festival de teatro'],
            ['name' => 'Apresentação de dança'],
            ['name' => 'Feira literária'],
            ['name' => 'Feira gastronômica'],
            ['name' => 'Competição esportiva'],
            ['name' => 'Corrida de rua'],
            ['name' => 'Maratona e/ou triatlo'],
            ['name' => 'Torneio (futebol, tênis, etc.)'],
            ['name' => 'Competição e-sports'],
            ['name' => 'Aula e treinamento esportivo'],
            ['name' => 'Exibição esportiva'],
            ['name' => 'Palestra'],
            ['name' => 'Simpósio'],
            ['name' => 'Conferência acadêmica'],
            ['name' => 'Colóquio'],
            ['name' => 'Fórum de debate'],
            ['name' => 'Aula aberta'],
            ['name' => 'Lançamento de livro'],
            ['name' => 'Feira de ciências'],
            ['name' => 'Cerimônia de premiação acadêmica'],
            ['name' => 'Leilão de caridade'],
            ['name' => 'Jantar beneficente'],
            ['name' => 'Campanha de arrecadação'],
            ['name' => 'Maratona solidária'],
            ['name' => 'Evento de conscientização'],
            ['name' => 'Concerto beneficente'],
            ['name' => 'Campanha de doação (sangue, alimentos, etc.)'],
            ['name' => 'Culto e missa especial'],
            ['name' => 'Retiro espiritual'],
            ['name' => 'Palestra religiosa'],
            ['name' => 'Celebração de feriado religioso'],
            ['name' => 'Desfile (Carnaval, 7 de setembro, etc.)'],
            ['name' => 'Show e/ou concerto ao ar livre'],
            ['name' => 'Comício político'],
            ['name' => 'Celebração de feriado municipal e/ou nacional'],
            ['name' => 'Evento comunitário'],
            ['name' => 'Hackathon'],
            ['name' => 'Lançamento de software'],
            ['name' => 'Conferência de tecnologia'],
            ['name' => 'Encontro de startups'],
            ['name' => 'Competição de robótica'],
            ['name' => 'Feira de inovação'],
            ['name' => 'Desfile de moda'],
            ['name' => 'Lançamento de coleção'],
            ['name' => 'Sessão de fotos'],
            ['name' => 'Feira de moda'],
            ['name' => 'Evento de beleza'],
            ['name' => 'Concurso de beleza']
        ];

        Category::factory()->createMany($categories);
    }
}
