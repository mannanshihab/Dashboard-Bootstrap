<?php

namespace App\Livewire;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Invoice;
use Livewire\Attributes\Title;

#[Title('Add Invoice')]
class AddInvoice extends Component
{

    public $agents;
    public $customers;
    public $mandatory;
    public $html;



    public $work_type;
    public $customer_id;
    public $date_of_birth;
    public $package_name;
    public $passport_no;
    public $web_file_no;
    public $token_no;
    public $ticket_no;
    public $pnr_no;
    public $member_id;
    public $appoinment_date;
    public $rcv_date;
    public $delivery_date;
    public $status;
    public $agent_id;
    public $amount;
    public $qty;
    public $total_amount;
    public $costing;
    public $visa_fee;
    public $service_charge;



    public function addInvoice()
    {
        dd($this);
        $data = $this->validate([
            'customer_id' => 'required',
            'agent_id' => 'required',
            'date_of_birth' => 'required',
            'passport_no' => 'required',
            'web_file_no' => 'required',
            'token_no' => 'required',
            'member_id' => 'required',
            'work_type' => 'required',
            'rcv_date' => 'required',
            'delivery_date' => 'required',
            'status' => 'required',
            'amount' => 'required',
            'qty' => 'required',
            'total_amount' => 'required',
            'costing' => 'required',
            'visa_fee' => 'required',
            'service_charge' => 'required',
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['invoice'] = rand(100000, 999999);
        Invoice::create($data);


        $this->dispatch('swal', [
            'title' => 'Invoice added successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }


    public function getCustomerDetails()
    {
        $customer = Customer::find($this->customer_id);
        $this->date_of_birth = $customer->date_of_birth;
        $this->passport_no = $customer->passport;
        $this->member_id = $customer->member_id;
    }


    public function render()
    {

        
        $customers = Customer::get();
        if ($this->work_type == 'visa') {
            $this->html = view('livewire.invoice-of-visa', ['customers' => $customers])->render();
            $this->customer_id = '';
        }elseif($this->work_type == 'air ticket'){
            $this->html = view('livewire.invoice-of-air-ticket', ['customers' => $customers])->render();
            $this->customer_id = '';
        }elseif($this->work_type == 'tour package'){
            $this->html = view('livewire.invoice-of-tour', ['customers' => $customers])->render();
            $this->customer_id = '';
        }

        return view('livewire.add-invoice');
    }

    public function mount()
    {
        $this->customers = Customer::get();
        $this->agents = Agent::get();
    }

}
