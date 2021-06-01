@extends('frontend.layout')

@section('page-content')

    <div class="container">
        <h2 class="my-3 p-0">Cadastrar Propostas</h2>

        @if ($errors->any())
            <div class="alert alert-danger my-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="m-auto mb-5" method="POST" action="{{ route('props-save') }}">
            @csrf
            <div class="form-group d-flex justify-content-between my-3">
                <label for="exampleFormControlSelect1">Clientes</label>
                <select class="w-50" name="client-id" id="clientid">
                    <option value=""></option>
                    @if ($clients)
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->company_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="waddress">Endereço da Obra</label>
                <input type="text" name="work-address" class="form-control w-75" id="waddress">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="signal">Sinal</label>
                <input type="text" name="signal" class="form-control w-25" id="signal">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="totalvalue">Valor Total</label>
                <input type="text" name="total-value" class="form-control w-25" id="totalvalue">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="waddress">Serviço</label>
                <input type="text" name="service" class="form-control w-75" id="service">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="installnumbers">Número de Parcelas</label>
                <input type="text" name="installments-number" class="form-control w-25" id="installnumbers">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="installvalue">Valor das Parcelas</label>
                <input type="text" name="installments-value" class="form-control w-25" id="installvalue">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="paystart">Início do Pagamento</label>
                <input type="date" name="payment-start" class="form-control w-50" id="paystart">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="annex">Anexo</label>
                <input type="file" name="annex" class="form-control w-75" id="annex">
            </div>

            <div class="d-flex justify-content-end my-3">
                <input class="btn btn-success" type="submit" value="Cadastrar">
            </div>

        </form>
    </div>

@endsection