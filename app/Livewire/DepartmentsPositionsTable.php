<?php

namespace App\Livewire;

use App\Models\Position;
use Livewire\Attributes\On;
use Livewire\Component;

class DepartmentsPositionsTable extends Component
{
    public $positions = [];
    public $selectedPositionId = "";

    public function mount()
    {
        $this->getDataTable();
    }
    public function render()
    {
        return view('livewire.admin.departments-positions-table');
    }
    #[On('added-position')]
    public function getDataTable()
    {
        $postionDataWithDepartment = Position::with('department')->get();
        $this->positions = $postionDataWithDepartment;
    }
    public function showModalDelete($positionId)
    {
        $this->selectedPositionId = $positionId;
        // $this->modal('delete-position')->show();
    }

    public function deletePosition($positionId)
    {
        $position = Position::find($positionId);
        if ($position) {
            $position->delete();
            $this->dispatch('deleted-position');
            $this->modal('delete-position')->close();
        }
    }
}
