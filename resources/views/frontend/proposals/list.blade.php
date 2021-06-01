@extends('frontend.layout')

@section('page-content')

    <div class="container">
        <h2 class="my-3 p-0">Propostas</h2>
        <div class="d-flex justify-content-between align-items-center my-1">
            <div>
                <a class="btn btn-success" href="{{ route('props-register') }}">Cadastrar Propostas</a>
            </div>

            <form class="d-flex align-items-center border px-2" action="">
                <div class="d-flex flex-column mx-2" style="font-size: 0.8rem">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="">Todos</option>
                        @foreach ($filters as $fill)
                        <option value="{{ $fill->status }}">{{ ($fill->status == 0) ? 'Aberta' : 'Aprovada' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex flex-column mx-2" style="font-size: 0.8rem">
                    <label for="status">Clientes</label>
                    <select name="client" id="client">
                        <option value="" selected>Todos</option>
                        @foreach ($filters as $fill)
                            <option value="{{ $fill->client_id }}">{{ $clientName($fill->client_id)->company_name }}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="d-flex flex-column mx-2" style="font-size: 0.8rem">
                    <label for="status">Periodo</label>
                    <select name="period" id="client">
                        <option value="" selected>Todos</option>
                        <option value="{{ date('Y-m-d H:i:s', strtotime('-24 hour', strtotime(date('Y-m-d H:i:s')))) }}">Último Dia</option>
                        <option value="{{ date('Y-m-d H:i:s', strtotime('-7 day', strtotime(date('Y-m-d H:i:s')))) }}">Última Semana</option>
                        <option value="{{ date('Y-m-d H:i:s', strtotime('-1 month', strtotime(date('Y-m-d H:i:s')))) }}">Último Mês</option>
                    </select>
                </div>

                <input class="btn btn-secondary px-4" type="submit" value="Filtrar">
            </form>

            <div>
                <a class="btn btn-primary editp disabled">Editar Proposta</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                    <th class="text-nowrap" scope="col">Cliente</th>
                    <th class="text-nowrap" scope="col">Data da Proposta</th>
                    <th class="text-nowrap" scope="col">Endereço da Proposta</th>
                    <th class="text-nowrap" scope="col">Inicio do Pgto.</th>
                    <th class="text-nowrap" scope="col">Serviços</th>
                    <th class="text-nowrap" scope="col">Sinal</th>
                    <th class="text-nowrap" scope="col">Valor Parcela</th>
                    <th class="text-nowrap" scope="col">Total</th>
                    <th class="text-nowrap" scope="col">Qtd. Parcelas</th>
                    <th class="text-nowrap" scope="col">Datas Parcelas</th>
                    <th class="text-nowrap" scope="col">anexos</th>
                    <th class="text-nowrap" scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($proposals as $props)
    
                        <tr class="line" data-line="{{ $props->id }}">
                            <td class="text-nowrap">{{ $clientName($props->client_id)->company_name }}</td>
                            <td class="text-nowrap">{{ $props->created_at->format('d-m-Y') }}</td>
                            <td class="text-nowrap">{{ $props->work_address }}</td>
                            <td class="text-nowrap">@php $startp = new DateTime($props->payment_start); @endphp {{ $startp->format('d-m-Y') }}</td>
                            <td class="text-nowrap">{{ $props->service }}</td>
                            <td class="text-nowrap">{{ number_format($props->signal, 2, ',', '.') }}</td>
                            <td class="text-nowrap">{{ number_format($props->installments_value, 2, ',', '.') }}</td>
                            <td class="text-nowrap">{{ number_format($props->total_value, 2, ',', '.') }}</td>
                            <td class="text-nowrap text-center">{{ $props->installments_number }}</td>
                            <td class="text-nowrap text-info installments" style="z-index: 99" data-idprops="{{ $props->id }}">Ver Parcelas</td>
                            <td class="text-nowrap">{{ $props->annex }}</td>
                            <td class="text-nowrap">
                                <select class="status" data-id="{{ $props->id }}">
                                    <option value="{{ ($props->status == 0) ? 0 : 1 }}">{{ ($props->status == 0) ? 'Aberta' : 'Aprovada' }}</option>
                                    <option value="{{ ($props->status == 0) ? 1 : 0 }}">{{ ($props->status == 0) ? 'Aprovada' : 'Aberta' }}</option>
                                </select>
                            </td>
                        </tr>
                        
                    @empty
    
                        <tr>
                            <h3 class="text-center">Não há dados</h3>
                        </tr>
                        
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success mt-4" href="{{ route('export') }}">Exportar para Excel</a>
        </div>
    </div>

    <div class="modal fade" id="inst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Parcelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="d-flex flex-xl-column justify-content-center align-items-center my-2">
                        <div id="paydate"></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@endsection