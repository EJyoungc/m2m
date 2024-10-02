<?php

namespace App\View\Components;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\View\Component;

class statcards extends Component
{
    public $client_count;
    public $appointment_count;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->client_count = Patient::count();
       $this->appointment_count = Appointment::count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.statcards');
    }
}
