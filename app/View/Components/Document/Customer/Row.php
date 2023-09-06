<?php

namespace App\View\Components\Document\Customer;

use Illuminate\View\Component;

class Row extends Component
{
    public $row;
    public $key;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $key, array $row = [])
    {
        $this->key = $key;
        $this->row = $row;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.document.customer.row');
    }
}
