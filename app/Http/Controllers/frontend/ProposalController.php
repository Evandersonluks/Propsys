<?php

namespace App\Http\Controllers\frontend;

use App\Models\Client;
use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Exports\ProposalsExport;
use App\Services\ProposalsService;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ProposalController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();

        $filters = (new Proposal)->select('client_id', 'status', 'created_at')->get();

        $clientName = fn($clid) => (new ProposalsService)->getClientName($clid);

        $props = (new ProposalsService)->getProposals($params)->get();

        return view('frontend.proposals.list')
            ->with('clientName', $clientName)
            ->with('filters', $filters)
            ->with('proposals', $props);
    }

    public function create()
    {
        $clients = Client::all();
        return view('frontend.proposals.create')
            ->with('clients', $clients);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client-id' => 'required',
            'work-address' => 'required',
            'total-value' => 'required|numeric',
            'signal' => 'required|numeric',
            'service' => 'required',
            'installments-number' => 'required|numeric|max:12',
            'installments-value' => 'required|numeric',
            'payment-start' => 'required|date|after_or_equal:today',
        ]);

        if( !(new ProposalsService)->saveProposals($request->all()) ) {
            return "Erro ao inserir proposta";
        }
        

        return redirect()->route('home');
    }

    public function getPaymentDates($id)
    {
        $dates = (new ProposalsService)->getPaymentDates($id)->first();

        if(!$dates) return 'Não há parcelas para o pagamento informado';

        return json_encode($dates);
    }

    public function setStatus(Request $request)
    {
        if( (new ProposalsService)->updateStatus($request->all()) ) return true;
        return false;
    }

    public function edit(Proposal $proposal)
    {
        $clientName = fn($clid) => (new ProposalsService)->getClientName($clid);
        $clients = Client::all();

        return view('frontend.proposals.edit')
            ->with('clientName', $clientName)
            ->with('clients', $clients)
            ->with('proposal', $proposal);
    }

    public function exports()
    {
        return Excel::download(new ProposalsExport, 'Propostas.xlsx');
    }
}
