<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('customers')->insert(
            [
                'fullname' => 'João da Silva',
                'cpf' => '005.004.003-14',
                'rg' => '40214414',
                'phone' => '(16) 3341-4741',
                'cellphone' => '(16) 98814-4741',
                'address'   => 'Rua Das Margaridas, 147',
                'district'   => 'Jardim dos Bordados',
                'cep' => '14947-047',
                'city' => 'Ibitinga/SP',
                'description' => 'Cadastro Novo',
            ],
            [
                'fullname' => 'Alberto da Crelles',
                'cpf' => '078.004.003-14',
                'rg' => '41474414',
                'phone' => '(16) 3341-0041',
                'cellphone' => '(16) 99991-4741',
                'address'   => 'Avenidas Lorenço, 2104 Ap 414',
                'district'   => 'Cetro',
                'cep' => '14947-047',
                'city' => 'Araraquara/SP',
                'description' => 'Nome consta no serasa- vender somente a vista',
            ]);
    }
}
