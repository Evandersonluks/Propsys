@extends('frontend.layout')

@section('page-content')

    <div class="container">
        <h2 class="my-3 p-0">Propostas para: {{ $cname }}</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
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
    
                        <tr data-line="{{ $props->id }}">
                            <td class="text-nowrap">{{ $props->created_at->format('d-m-Y') }}</td>
                            <td class="text-nowrap">{{ $props->work_address }}</td>
                            <td class="text-nowrap">@php $startp = new DateTime($props->payment_start); @endphp {{ $startp->format('d-m-Y') }}</td>
                            <td class="text-nowrap">{{ $props->service }}</td>
                            <td class="text-nowrap">{{ number_format($props->signal, 2, ',', '.') }}</td>
                            <td class="text-nowrap">{{ number_format($props->installments_value, 2, ',', '.') }}</td>
                            <td class="text-nowrap">{{ number_format($props->total_value, 2, ',', '.') }}</td>
                            <td class="text-nowrap text-center">{{ $props->installments_number }}</td>
                            <td class="text-nowrap text-info installments" data-idprops="{{ $props->id }}">Ver Parcelas</td>
                            <td class="text-nowrap">{{ $props->annex }}</td>
                            <td class="text-nowrap">{{ ($props->status == 0) ? 'Aberta' : 'Aprovada' }}</td>
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