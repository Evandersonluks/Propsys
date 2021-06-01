@extends('frontend.layout')

@section('page-content')

    <div class="container">
        <h2 class="my-3 p-0">Clientes</h2>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a class="btn btn-success" href="{{ route('clients-register') }}">Cadastrar Clientes</a>
            </div>
            <div>
                <a class="btn btn-primary editc disabled">Editar Cliente</a>
                <a class="btn btn-danger propsc disabled">Ver Propostas</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                    <th class="text-nowrap" scope="col">Razão Social</th>
                    <th class="text-nowrap" scope="col">Nome Fantasia</th>
                    <th class="text-nowrap" scope="col">CNPJ</th>
                    <th class="text-nowrap" scope="col">Endereço</th>
                    <th class="text-nowrap" scope="col">Email</th>
                    <th class="text-nowrap" scope="col">Telefone</th>
                    <th class="text-nowrap" scope="col">Nome do Responsável</th>
                    <th class="text-nowrap" scope="col">CPF</th>
                    <th class="text-nowrap" scope="col">Celular</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($clients as $client)
    
                        <tr class="client-line" data-line="{{ $client->id }}">
                            <td class="text-nowrap">{{ $client->company_name }}</td>
                            <td class="text-nowrap">{{ $client->fantasy_name }}</td>
                            <td class="text-nowrap">{{ $client->cnpj }}</td>
                            <td class="text-nowrap">{{ $client->address }}</td>
                            <td class="text-nowrap">{{ $client->email }}</td>
                            <td class="text-nowrap">{{ $client->phone }}</td>
                            <td class="text-nowrap">{{ $client->responsible_name }}</td>
                            <td class="text-nowrap">{{ $client->cpf }}</td>
                            <td class="text-nowrap">{{ $client->cell }}</td>
                        </tr>
                        
                    @empty
    
                        <tr>
                            <h3 class="text-center">Não há dados</h3>
                        </tr>
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection