<?php

namespace App\Services\ProfiCash;

class TransactionObject
{
    public $end2end, $iban, $bic, $recipient, $reference, $amount;

    public function setEnd2End($end2end)
    {
        $this->end2end = $end2end;
    }

    public function setIban($iban)
    {
        $this->iban = str_replace(' ', '', $iban);
    }

    public function setBic($bic)
    {
        $this->bic = $bic;
    }

    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    function setAmount($amount)
    {
        $this->amount = $amount;
    }
}
