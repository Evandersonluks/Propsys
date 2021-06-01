<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cli = Client::create([
            'company_name' => 'Comp Tech',
            'fantasy_name' => 'High Tech',
            'cnpj' => '83.475.485/0001-27',
            'address' => 'Av. Industrial',
            'email' => 'hitech@tech.com',
            'phone' => '88888888',
            'responsible_name' => 'Roberto Cruz de Menezes',
            'cpf' => '47.912.756-77',
            'cell' => '(99)999999999',
        ]);

        $cli->proposals()->create([
            'work_address' => 'Rua Projetada',
            'total_value' => 6600,
            'signal' => 3500,
            'service' => 'Troca de ACs',
            'installments_number' => 6,
            'installments_value' => 1100,
            'payment_start' => Carbon::now()->addMonth(1),
            'installments_date' => $this->generateInstallments(),
            'annex' => 'mydoc.pdf',
        ]);
    }

    private function generateInstallments()
    {
        $dates = [];
        
        for ($i=0; $i < 6; $i++) {
            array_push($dates, Carbon::now()->addMonth($i + 2));
        }

        return json_encode($dates);
    }
}
