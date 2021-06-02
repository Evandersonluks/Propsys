<?php

namespace App\Http\Controllers\frontend;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('frontend.clients.list')
            ->with('clients', $clients);
    }

    public function create()
    {
        return view('frontend.clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company-name' => 'required',
            'fantasy-name' => 'required',
            'cnpj' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'responsible-name' => 'required',
            'cpf' => 'required',
            'cell' => 'required',
        ]);

        if( !(new ClientService)->saveClient($request->all()) ) {
            return "Erro ao inserir cliente";
        }

        return redirect()->route('clients');
    }

    public function edit(Client $client)
    {
        return view('frontend.clients.edit')
            ->with('client', $client);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company-name' => 'required',
            'fantasy-name' => 'required',
            'cnpj' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'responsible-name' => 'required',
            'cpf' => 'required',
            'cell' => 'required',
        ]);

        if( !(new ClientService)->editClient($request->all()) ) {
            return "Erro ao inserir cliente";
        }

        return redirect()->route('clients');
    }

    public function getProposals(Client $client)
    {
        $props = $client->proposals()->get();

        return view('frontend.clients.proposals')
        ->with('cname', $client->company_name)
        ->with('proposals', $props);
    }
}
