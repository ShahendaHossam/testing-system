<?php

namespace App\Http\Livewire;

use App\Models\TestCaseStep;
use App\Models\TestCase;
use App\Models\TestCaseDataRequirement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Designers extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $status_id;
    public $status = 2;
    public $field_name;
    public $old_value;
    public $new_value;
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';
    public $create = false;
    public $index = true;
    public $step = false;
    public $edit = false;
    public $title;
    public $module_name;
    public $project_id;
    public $description;
    public $dependency_id;
    public $pre_condition;
    public $priority_id;
    public $test_case_id;
    public $title_step;
    public $description_step;
    public $expected_result;
    public $designer_comment;
    public $testdata = false;
    public $history = false;
    public $edittestdata = false;




    public function resetInputFields(){
        $this->title_step = '';
        $this->description_step = '';
        $this->expected_result = '';
        $this->designer_comment = '';
    }


    public function sortBy($field)
    {
        if($this->sortDirection == 'asc')
        {
            $this->sortDirection = 'desc';
        }
        else
        {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function new()
    {
        $this->create = true;
        $this->history =false;
        $this->index = false;
    }
    public function history()
    {
        $this->history =true;
        $this->create = false;
        $this->index = false;
        $this->step = false;
        $this->edit = false;
    }

    public function store()
    {
        $user = auth::user();
        $validateData = $this->validate([
            'title'=>'nullable|string',
            'module_name' => 'nullable|string',
            'project_id' => 'nullable|integer',
            'description' => 'nullable|string',
            'dependency_id' => 'nullable|integer',
            'priority_id' => 'nullable|integer',
            'status_id' => 'nullable|integer',
            'pre_condition'=> 'nullable|string',
        ]);
        $validateData['designer_id'] = $user->id;
        $testcase = TestCase::create($validateData);
        $this->create = false;
        if($this->step = true){
            $this->test_case_id = $testcase->id;
        }
        $this->index = false;
        $this->edit = false;
        $this->resetInputFields();
    }

    public function storeStep(){
        $validateData = $this->validate([
            'test_case_id' =>'required|integer',
            'title' => 'required|string',
            'description' => 'required|string',
            'expected_result' => 'required|string',
            'designer_comment' => 'required|string',

        ]);
        TestCaseStep::create($validateData);
        session()->flash('message' , 'Interests Added Successfully!');
        $this->resetInputFields();
        $this->emit('itemsAdded');
    }
    public function filter($id){
        $designerdatarequirments = TestCaseStep::where('id',$id)->first();
        $this->test_case_step_id = $designerdatarequirments->id;
        $this->testdata = true;
        $this->step = false;
    }

    
    public function editTestData($id){

        $designerdatarequirments = TestCaseDataRequirement::where('id',$id)->first();
        $this->test_case_step_id = $designerdatarequirments->id;
        $this->field_name = $designerdatarequirments->field_name;
        $this->new_value = $designerdatarequirments->old_value;
        $this->resetInputFields();
        $this->testdata = false;
        $this->edittestdata = true;
    }

    public function storedesignerdatarequirments(){

        $validateData = $this->validate([
            'test_case_step_id' => 'required|integer',
            'field_name' => 'required|string',
            'old_value' => 'required|string',
        ]);
        TestCaseDataRequirement::create($validateData);
        $this->resetInputFields();
    }

    public function edittestdatarequirments($id){
        $designerdatarequirments = TestCaseDataRequirement::where('test_case_step_id',$id)->first();
        $this->test_case_step_id = $designerdatarequirments->test_case_step_id;
        // $this->field_name = $designerdatarequirments->field_name;
        // $this->new_value = $designerdatarequirments->old_value;
    }

    public function edit($id){
        $designerdatarequirments = TestCaseStep::where('id',$id)->first();
        $this->ids = $designerdatarequirments->id;
        // $this->field_name = $designerdatarequirments->field_name;
        // $this->new_value = $designerdatarequirments->old_value;
    }
    public function update(){
        $data = $this->validate([
            'new_value' => 'required|string',
        ]);
        if($this->test_case_step_id){
            $designerdatarequirments = TestCaseDataRequirement::find($this->test_case_step_id);
            $designerdatarequirments->update($data);         
        }
        $this->testdata = true;
    }

   
    public function editSteps($id){
        // $this->isOpen = true;

        $datasteps = TestCaseStep::where('id',$id)->first();
        $this->step_id = $datasteps->id;
        $this->title = $datasteps->title;
        $this->description = $datasteps->description;
        $this->expected_result = $datasteps->expected_result;
        $this->designer_comment = $datasteps->designer_comment;
    }

    public function show($id){
        $datasteps = TestCaseStep::where('id',$id)->first();
        $this->step_id = $datasteps->id;
        $this->title = $datasteps->title;
        $this->description = $datasteps->description;
        $this->expected_result = $datasteps->expected_result;
        $this->designer_comment = $datasteps->designer_comment;
        $this->filter($id);
    }


    public function render()
    {
        $testcases = TestCase::all();
        $designersteps = TestCaseStep::all();
        $testdatadetails = TestCaseDataRequirement::all();
        return view('livewire.designers.designer',compact('testcases','testdatadetails','designersteps'));
    }
}
