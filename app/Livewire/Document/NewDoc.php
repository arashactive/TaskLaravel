<?php

namespace App\Livewire\Document;

use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Services\FileService;
use App\Services\ProfiCash\TransactionObject;
use App\Services\ProfiCash\XmlCreator;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class NewDoc extends Component
{
    /**
     * @var array
     */
    public $excelRows;

    /**
     * @var string
     */
    public $excelPath;

    /**
     * @var string
     */
    public $debitName;

    /**
     * @var string
     */
    public $debitIBAN;

    /**
     * @var string
     */
    public $debitBIC;

    /**
     * @var int
     */
    public $offset = 0;

    /**
     * @var string
     */
    public $xml;

    /**
     * NewDoc constructor.
     *
     * @param CompanyRepositoryInterface $company
     */
    public function mount(CompanyRepositoryInterface $company)
    {
        $this->debitName = $company->first()->name;
        $this->debitIBAN = $company->first()->IBAN;
        $this->debitBIC = $company->first()->BIC;
    }

    /**
     * Generate an XML document based on the provided data.
     */
    public function generateXML()
    {
        $xmlCreator = new XmlCreator();
        $xmlCreator->setDebitorValues($this->debitName, $this->debitIBAN, $this->debitBIC);
        $xmlCreator->setExecutionOffset($this->offset);

        for ($i = 1; $i < count($this->excelRows); $i++) {
            // Create a new transfer
            $transaction = new TransactionObject();
            // Amount
            $transaction->setAmount($this->excelRows[$i][3]);
            // End2end reference (OPTIONAL)
            $transaction->setEnd2End('ID-00002');
            // Recipient BIC
            $transaction->setBic($this->excelRows[$i][2]);
            // Recipient name
            $transaction->setRecipient($this->excelRows[$i][0]);
            // Recipient IBAN
            $transaction->setIban($this->excelRows[$i][1]);
            // Reference (OPTIONAL)
            $transaction->setReference('Test Buchung');
            // Add transaction
            $xmlCreator->addTransaction($transaction);
        }

        $this->xml =  $xmlCreator->domBuilder();

        $xmlService = App::make(FileService::class);
        $file = $xmlService->toDatabase($this->excelPath,  $xmlCreator->getPath());
        $xmlService->storeRefundsInDatabase($file->id, $this->excelRows);

        return redirect()->route('panel.xml.show', $file->id);
    }

    public function render()
    {
        return view('livewire.document.new-doc');
    }
}