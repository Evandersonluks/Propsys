@extends('frontend.layout')

@section('page-content')

    <div class="container">
        <h2 class="my-3 p-0">Editar Proposta</h2>

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
            <input type="hidden" name="id" value="{{ $proposal->id }}">
            <div class="form-group d-flex justify-content-between my-3">
                <label for="exampleFormControlSelect1">Clientes</label>
                <select class="w-50" name="client-id" id="clientid">
                    <option value="{{ $proposal->client_id }}" selected>{{ $clientName($proposal->client_id)->company_name }}</option>

                    @if ($clients)
                        @foreach ($clients as $client)

                            @if ($client->company_name != $clientName($proposal->client_id)->company_name)
                                <option value="{{ $client->id }}">{{ $client->company_name }}</option>
                            @endif
                            
                        @endforeach
                    @endif

                </select>
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="waddress">Endereço da Obra</label>
                <input type="text" name="work-address" class="form-control w-75" value="{{ $proposal->work_address }}" id="waddress">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="signal">Sinal</label>
                <input type="text" name="signal" class="form-control w-25" value="{{ $proposal->signal }}" id="signal">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="totalvalue">Valor Total</label>
                <input type="text" name="total-value" class="form-control w-25" value="{{ $proposal->total_value }}" id="totalvalue">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="service">Serviço</label>
                <input type="text" name="service" class="form-control w-75" value="{{ $proposal->service }}" id="service">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="installnumbers">Número de Parcelas</label>
                <input type="text" name="installments-number" class="form-control w-25" value="{{ $proposal->installments_number }}" id="installnumbers">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="installvalue">Valor das Parcelas</label>
                <input type="text" name="installments-value" class="form-control w-25" value="{{ $proposal->installments_value }}" id="installvalue">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="paystart">Início do Pagamento</label>
                @php 
                    $startp = new DateTime($proposal->payment_start);
                    $startp = $startp->format('Y-m-d');
                @endphp
                <input type="date" name="payment-start" class="form-control w-50" value="{{ $startp }}" id="paystart">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="annex">Anexo</label>
                <input type="file" name="annex" class="form-control w-75" value="{{ $proposal->annex }}" id="annex">
            </div>
            <div class="form-group d-flex justify-content-between my-3">
                <label for="status">Status</label>
                <select class="status w-50" name="status" id="status">
                    <option value="{{ ($proposal->status == 0) ? 0 : 1 }}">{{ ($proposal->status == 0) ? 'Aberta' : 'Aprovada' }}</option>
                    <option value="{{ ($proposal->status == 0) ? 1 : 0 }}">{{ ($proposal->status == 0) ? 'Aprovada' : 'Aberta' }}</option>
                </select>
            </div>

            <div class="d-flex justify-content-end my-3">
                <input class="btn btn-success" type="submit" value="Salvar Edição">
            </div>

        </form>
    </div>

@endsection