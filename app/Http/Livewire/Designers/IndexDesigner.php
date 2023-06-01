<?php

namespace App\Http\Livewire\Designers;

use App\Models\Status;
use App\Models\TestCase;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class IndexDesigner extends Component
{

    protected $paginationTheme = 'bootstrap';
    //datatable related
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $result_no = 20;
    public $search = '';
    public $statuses;

    public $editMode = false;
public TestCase $test_case;
    public $test_case_id;
   

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


    public function edit(TestCase $test_case)
    {
        $this->test_case = $test_case;
        // sends test case step test_case to form for edit
        // $this->emit('requestEdit',$test_case);
        $this->editMode = true;
        return redirect()->route('test_case.edit', $this->test_case->id)->with('success', 'Test Case Created Successfully');
    }
    public function mount()
    {
       $this->test_case = new TestCase();
}
    public function doneRedesigne(TestCase $test_case)
    {
        $this->test_case = $test_case;
        $this->validate();
        $user = Auth::user();
            $status = Status::where('title', 'Pending Reviewal')->first();
            $this->test_case->status_id = $status?$status->id:null;
            $this->test_case->designer_id = $user->id;
            $this->test_case->save(); 
        return redirect()->route('general.testcase')->with('success','Test Case Successfully');

    }

    public function render()
    {
        // $this->test_case_id = $this->test_case->id;
        $status = Status::where('id', 2)->first();
        $this->statuses = $status ? $status->id : null;
        $testcases = TestCase::when($this->statuses, function ($query) {
            $query->where('status_id', $this->statuses);
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
        return view('livewire.designers.index-designer', compact('testcases'));
    }
}
