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
                'descricao'=> 'Ajuste de matrícula',
                'tipo_id' => 1
            ],
            [
                'descricao' => 'Cancelamento de matrícula',
                'tipo_id' => 1
            ],
            [
                'descricao' => 'Complementação de matrícula',
                'tipo_id' => 1
            ],
            [
                'descricao' => 'Declaração de matrícula ou matrícula vinculo',
                'tipo_id' => 1
            ],
            [
                'descricao' => 'Reabertura de matrícula',
                'tipo_id' => 1
            ],
            [
                'descricao' => 'Trancamento de matrícula',
                'tipo_id' => 1
            ],
            [
                'descricao' => 'Cancelamento de disciplina',
                'tipo_id' => 2
            ],
            [
                'descricao' => 'Dispensa da prática de educação física',
                'tipo_id' => 2
            ],
            [
                'descricao' => 'Declaração tramitação de diploma',
                'tipo_id' => 2
            ],
            [
                'descricao' => 'Histórico escolar',
                'tipo_id' => 2
            ],
            [
                'descricao' => 'Isenção de disciplinas cursadas',
                'tipo_id' => 2
            ],
            [
                'descricao' => 'Matriz curricular',
                'tipo_id' => 2
            ],
            [
                'descricao' => 'Admissão por transferência e análise curricular',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Autorização para cursar disciplinas em outras instituições de ensino superior',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Certificado de conclusão',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Certidão autenticidade',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Cópia xerox de documentos',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Declaração de colação de grau e tramitação de diploma',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Declaração de monitoria',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Declaração de estágio',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Ementa de disciplina',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Guia de transferência',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Justificativa de falta(s) ou prova 2º chamada',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Reintegração',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Reintegração para cursar',
                'tipo_id' => 3
            ],
            [
                'descricao' => 'Solicitação de conselho de classe',
                'tipo_id' => 3
            ]
            
        
        ]);
    }
}
