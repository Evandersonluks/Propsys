<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    public function saveClient($data)
    {
        if(isset($data['id']) && !empty($data['id'])) {

            if(Client::where("id", $data['id'])->first()) {
                $client = Client::find($data['id']);
            }
            
        } else {
            $client = new Client();
        }

        $client->company_name = $data['company-name'];
        $client->fantasy_name = $data['fantasy-name'];
        $client->cnpj = $data['cnpj'];
        $client->address = $data['address'];
        $client->email = $data['email'];
        $client->phone = $data['phone'];
        $client->responsible_name = $data['responsible-name'];
        $client->cpf = $data['cpf'];
        $client->cell = $data['cell'];

        return $client->save();
    }

    public function editClient($data)
    {
        $client = Client::find($data['id']);

        $client->company_name = $data['company-name'];
        $client->fantasy_name = $data['fantasy-name'];
        $client->cnpj = $data['cnpj'];
        $client->address = $data['address'];
        $client->email = $data['email'];
        $client->phone = $data['phone'];
        $client->responsible_name = $data['responsible-name'];
        $client->cpf = $data['cpf'];
        $client->cell = $data['cell'];

        return $client->save();
    }
}
