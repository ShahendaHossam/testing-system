<?php

namespace App\Http\Livewire\Designers;

use App\Models\Status;
use App\Models\TestCase;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RedesignTestCase extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';
    public $statuses;
    public $ids;

    public TestCase $test_case;
    protected $rules = [
        'test_case.id' => 'nullable|integer',
        'test_case.status_id' => 'nullable|integer',
    ];


    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    //zorar el edit eli shayf el id bta3 el test case
    public function edit($id)
    {
        $this->emit('requestEdit', $id);
    }


    public function render()
    {
        // $idTest = TestCase::where('id', $test_case)->first();
        // $this->ids = $idTest;
        $this->ids = $this->test_case->id;
        $testcases = TestCase::when($this->ids, function ($query) {
            $query->where('id', $this->ids);
        })->when($this->search, function ($searchquery) {
            $searchquery->where(function ($queryx) {
                $queryx->where('test_cases.id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.title', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.project_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.module_name', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.description', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.priority_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.designer_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.created_at', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.pre_condition', 'like', '%' . $this->search . '%');
            });
        })->orderBy($this->sortField, $this->sortDirection)->paginate($this->result_no);
        return view('livewire.designers.redesign-test-case', compact('testcases'));
    }
}
