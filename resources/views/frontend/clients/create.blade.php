@extends('frontend.layout')

@section('page-content')

    <div class="container">
        <h2 class="my-3 p-0">Cadastrar Clientes</h2>

        @if ($errors->any())
            <div class="alert alert-danger my-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="m-auto mb-5" method="POST" action="{{ route('client-save') }}">
            @csrf
            <div class="form-group d-flex justify-content-between my-3">
                <label for="conpname">Razão Social</label>
                <input type="text" name="company-name" class="form-control w-75" id="conpname">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="fantname">Nome Fantasia </label>
                <input type="text" name="fantasy-name" class="form-control w-75" id="fantname">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="cnpj">CNPJ</label>
                <input type="text" name="cnpj" class="form-control w-75" id="cnpj">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="address">Endereço</label>
                <input type="text" name="address" class="form-control w-75" id="address">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control w-75" id="email">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="phone">Telefone</label>
                <input type="text" name="phone" class="form-control w-75" id="phone">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="respname">Nome do Responsável</label>
                <input type="text" name="responsible-name" class="form-control w-75" id="respname">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" class="form-control w-75" id="cpf">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="cell">Celular</label>
                <input type="text" name="cell" class="form-control w-75" id="cell">
            </div>

            <div class="d-flex justify-content-end my-3">
                <input class="btn btn-success" type="submit" value="Cadastrar">
            </div>

        </form>
    </div>

@endsection