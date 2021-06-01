<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Proposal;
use Carbon\Carbon;

class ProposalsService
{
    public function getProposals($params = null)
    {
        return Proposal::select('proposals.*')
            ->when(isset($params['status']), function ($query) use ($params) {
                $query->where('status', $params['status']);
            })
            ->when(isset($params['client']), function ($query) use ($params) {
                $query->where('client_id', $params['client']);
            })
            ->when(isset($params['period']), function ($query) use ($params) {
                $query->whereDate('created_at', '<=', Carbon::now())
                    ->whereDate('created_at', '>=', $params['period']);
            });
    }

    public function saveProposals($data)
    {
        if(isset($data['id']) && !empty($data['id'])) {
            if(Proposal::where("id", $data['id'])->first()) {
                $props = Proposal::find($data['id']);

                $props->status = $data['status'];
            }
        } else {
            $props = new Proposal();
        }

        $props->client_id = $data['client-id'];
        $props->work_address = $data['work-address'];
        $props->total_value = $data['total-value'];
        $props->service = $data['service'];
        $props->installments_number = $data['installments-number'];
        $props->signal = $data['signal'];
        $props->installments_value = $data['installments-value'];
        $props->payment_start = $data['payment-start'];
        $props->installments_date = $this->generateInstallments($props->payment_start, $props->installments_number);
        $props->annex = $data['annex'];


        return $props->save();
    }

    public function updateStatus($data)
    {
        $props = Proposal::find($data['idprops']);
        $props->status = $data['stts'];

        return $props->save();
    }

    public function getPaymentDates($propsId)
    {
        return Proposal::select('installments_date')
            ->where('id', $propsId);
    }

    public function getClientName($clid)
    {
        return Client::select('company_name')
            ->where('id', $clid)->first();
    }

    public function generateInstallments($payStart, $numbers)
    {
        $dates = [];
        
        for ($i=1; $i <= $numbers; $i++) {
            array_push($dates, Carbon::createFromFormat("!Y-m-d", $payStart)->addMonth($i));
        }

        return json_encode($dates);
    }
}
