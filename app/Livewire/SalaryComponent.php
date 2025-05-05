<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class SalaryComponent extends Component
{
    #[Title('Salary Component')]
    public function render()
    {
        return view('livewire.admin.salary-component');
    }
}
