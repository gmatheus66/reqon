<?php

use Illuminate\Database\Seeder;

class SubtiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subtipos')->insert([
            [
                'descricao'=> 'Ajuste de Matrícula',
                'tipo_id' => 1
            ],
            [
                'descricao' => 'Cancelamento de Matrícula',
                'tipo_id' => 1
            ],
            [
                'descricao' => 'Complementação de Matrícula',
                'tipo_id' => 1
            ],
            [
                'descricao' => 'Declaração de Matrícula ou Matrícula Vinculo',
                'tipo_id' => 1
            ],
            [
                'descricao' => 'Reabertura de Matrícula',
                'tipo_id' => 1
            ],
            [
                'descricao' => 'Trancamento de Matrícula',
                'tipo_id' => 1
            ],
            [
                'descricao' => 'Cancelamento de Disciplina',
                'tipo_id' => 2
            ],
            [
                'descricao' => 'Dispensa da prática de Educação Física',
                'tipo_id' => 2
            ],
            [
                'descricao' => 'Declaração Tramitação de Diploma',
                'tipo_id' => 2
            ],
            [
                'descricao' => 'Historico Escolar',
                'tipo_id' => 2
            ],
            [
                'descricao' => 'Inseção de Disciplinas Cursadas',
                'tipo_id' => 2
            ],
            [
                'descricao' => 'Matriz Curricular',
                'tipo_id' => 2
            ],
            [
                'descricao' => 'Admissão por Transferência e Análise Curricular',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Autorização para cursar disciplinas em outras Instituições de Ensino Superior',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Certificado de Conclusão',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Certidão Autenticidade',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Cópia Xerox de Documentos',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Declaração de Colação de grau e Tramitação de Diploma',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Declaração de Monitoria',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Declaração de Estágio',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Ementa de Disciplina',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Guia de Transferencia',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Justificativa de Falta(s) ou Prova 2º chamada',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Reintegração',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Reintegração para Cursar',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Solicitação de Conselho de Classe',
                'tipo_id' => 3
            ]
            
        
        ]);
    }
}
