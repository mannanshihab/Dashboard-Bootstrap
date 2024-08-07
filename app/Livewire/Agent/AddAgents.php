<?php

namespace App\Livewire\Agent;

use App\Models\Agent;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Add Agents')]
class AddAgents extends Component
{
    use WithFileUploads;
    public $company_name = '';
    public $ceo_name = '';
    public $email = '';
    public $mobile = '';
    public $address = '';
    public $trade_license_no;
    public $nid_no;
    public $banks_details = '';

    public function addAgent()
    {

        $this->validate([
            'company_name' => 'required',
            'ceo_name'     => 'required',
            'email'        => 'required|unique:agents',
            'mobile'       => 'required',
            'address'      => 'required',
            'trade_license_no' => 'nullable|image',
            'nid_no' => 'nullable|image',
        ]);

        if ($this->trade_license_no) {
            $tradeLicensePath = $this->trade_license_no->store('uploads/Agents/tradeLicense', 'real_public');
        }
        if ($this->nid_no) {
            $nidPath = $this->nid_no->store('uploads/Agents/nid', 'real_public');
        }

        Agent::create([
            'company_name'      => $this->company_name,
            'ceo_name'          => $this->ceo_name,
            'email'             => $this->email,
            'mobile'            => $this->mobile,
            'address'           => $this->address,
            'trade_license_no'  => @$tradeLicensePath,
            'nid_no'            => @$nidPath,
            'banks_details'     => $this->banks_details
        ]);


        $this->dispatch('swal', [
            'title' => 'Agent added successfully.',
            'icon' => 'success',
            'iconColor' => 'blue',
        ]);
    }

    public function render()
    {
        return view('livewire.agent.add-agents');
    }
}
