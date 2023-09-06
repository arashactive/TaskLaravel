<?php

namespace App\Livewire\Document;

use App\Repositories\Contracts\CompanyRepositoryInterface;
use Livewire\Component;

class NewDoc extends Component
{

    public $excelRows;

    public $debitName;
    public $debitIBAN;
    public $debitBIC;
    public $offset = 0;

    public function mount(CompanyRepositoryInterface $company){
        $this->debitName = $company->first()->name;
        $this->debitIBAN = $company->first()->IBAN;
        $this->debitBIC = $company->first()->BIC;
    }


    public function render()
    {
        return view('livewire.document.new-doc');
    }

   
}
