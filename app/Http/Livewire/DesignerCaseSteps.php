<?php

namespace App\Http\Livewire;

use App\Models\TestCase;
use App\Models\TestCaseStep;
use App\Models\TestCaseDataRequirement;
use Livewire\Component;

class DesignerCaseSteps extends Component
{
    public $ids;
    public $test_case_step_id;
    public $title;
    public $description;
    public $expected_result;
    public $designer_comment;
    public $field_name;
    public $old_value;
    public $new_value;
    public $step_id;
    public $isOpen = false;
    public $test_case_id;



    protected $listeners = ['editSteps'];

    protected $paginationTheme = 'bootstrap';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm ='';
    public $search = '';

    public function sortBy($field){
        
        $this->sortField = $field;
    }


    public function resetInputFields(){
        $this->title = '';
        $this->description = '';
        $this->expected_result = '';
        $this->designer_comment = '';

    }

    // public function open(){
    //     $this->isOpen = true;

    // }

    public function store(){
        $validateData = $this->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'expected_result' => 'required|string',
            'designer_comment' => 'required|string',

        ]);
        $testcase = TestCaseStep::create($validateData);
        $this->test_case_id = $testcase->id;
        session()->flash('message' , 'Interests Added Successfully!');
        $this->resetInputFields();
        $this->emit('itemsAdded');
    }


    public function filter($id){
        $designerdatarequirments = TestCaseStep::where('id',$id)->first();
        $this->test_case_step_id = $designerdatarequirments->id;
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
    }

    public function editTestData($id){

        $designerdatarequirments = TestCaseDataRequirement::where('id',$id)->first();
        $this->test_case_step_id = $designerdatarequirments->id;
        $this->field_name = $designerdatarequirments->field_name;
        $this->new_value = $designerdatarequirments->old_value;
        $this->resetInputFields();
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

    public function testCase($id)
    {
        // $interestplans = InterestPlan::where('interest_id',$id)->first();
        $testcase = TestCase::where('id',$id)->first();
        $this->test_case_id = $testcase->id;
    }

    public function render()
    {
        $testcases = TestCase::all();
        $designersteps = TestCaseStep::all();
        $testdatadetails = TestCaseDataRequirement::all();
        return view('livewire.designercasesteps.step',compact(['testcases' , 'testdatadetails','designersteps']));
    }
}
