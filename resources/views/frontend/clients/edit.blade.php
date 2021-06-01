@extends('frontend.layout')

@section('page-content')

    <div class="container">
        <h2 class="my-3 p-0">Editar Cliente</h2>

        @if ($errors->any())
            <div class="alert alert-danger my-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="m-auto mb-5" method="POST" action="{{ route('client-save-edit') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $client->id }}">
            <div class="form-group d-flex justify-content-between my-3">
                <label for="conpname">Razão Social</label>
                <input type="text" name="company-name" class="form-control w-75" value="{{ $client->company_name }}" id="conpname">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="fantname">Nome Fantasia </label>
                <input type="text" name="fantasy-name" class="form-control w-75" value="{{ $client->fantasy_name }}" id="fantname">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="cnpj">CNPJ</label>
                <input type="text" name="cnpj" class="form-control w-75" value="{{ $client->cnpj }}" id="cnpj">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="address">Endereço</label>
                <input type="text" name="address" class="form-control w-75" value="{{ $client->address }}" id="address">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control w-75" value="{{ $client->email }}" id="email">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="phone">Telefone</label>
                <input type="text" name="phone" class="form-control w-75" value="{{ $client->phone }}" id="phone">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="respname">Nome do Responsável</label>
                <input type="text" name="responsible-name" class="form-control w-75" value="{{ $client->responsible_name }}" id="respname">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" class="form-control w-75" value="{{ $client->cpf }}" id="cpf">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="cell">Celular</label>
                <input type="text" name="cell" class="form-control w-75" value="{{ $client->cell }}" id="cell">
            </div>

            <div class="d-flex justify-content-end my-3">
                <input class="btn btn-success" type="submit" value="Salvar Edição">
            </div>

        </form>
    </div>

@endsection