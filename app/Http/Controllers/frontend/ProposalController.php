<?php

namespace App\Http\Controllers\frontend;

use App\Models\Client;
use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Services\ProposalsService;
use App\Http\Controllers\Controller;

class ProposalController extends Controller
{
    public function index()
    {
        $clientName = fn($clid) => (new ProposalsService)->getClientName($clid);

        $props = (new Proposal())->all();

        return view('frontend.proposals.list')
            ->with('clientName', $clientName)
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
            'total-value' => 'required',
            'signal' => 'required',
            'service' => 'required',
            'installments-number' => 'required',
            'installments-value' => 'required',
            'payment-start' => 'required',
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
}
