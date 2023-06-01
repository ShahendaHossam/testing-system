<?php

namespace App\Http\Livewire\Designers;

use App\Models\Priority;
use App\Models\Project;
use App\Models\Status;
use App\Models\TestCase;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class CreateDesigner extends Component
{
    public TestCase $test_case;

    public $projects;
    public $dependencies;
    public $statuses;
    public $priorities;
    public $editMode = false;
    public $createMode = false;
    public $edit = false;


    protected $rules = [
        'test_case.id' => 'nullable|integer',
        'test_case.title' => 'nullable|max:255',
        'test_case.module_name' => 'nullable|max:255',
        'test_case.project_id' => 'nullable|integer',
        'test_case.description' => 'nullable|max:255',
        'test_case.dependency_id' => 'nullable|integer',
        'test_case.priority_id' => 'nullable|integer',
        'test_case.status_id' => 'nullable|integer',
        'test_case.pre_condition' => 'nullable|max:255',
        'test_case.designer_id' => 'nullable|integer',
        'test_case.designer_comment' => 'nullable|max:255',
    ];

    public function store()
    {
        $this->validate();   
        $user = Auth::user();
        $status = Status::where('title', 'Pending Reviewal')->first();

        $this->test_case->status_id = $status?$status->id:null;
        $this->test_case->designer_id = $user->id;

        $this->test_case->save();
        if($this->createMode = true){
            $this->emit('createButton');
        }
        
        return redirect()->route('test_case.steps',$this->test_case->id)->with('success','Test Case Created Successfully');
    }
    public function requestEdit(TestCase $test_case)
    {
        $this->test_case = $test_case;

        $this->editMode = true;
    }
    public function update(){
        $this->validate();
        
        $this->test_case->save();
 

        return redirect()->route('test_case.steps' , $this->test_case->id);
    }

    public function mount()
    {
        $this->projects = Project::all();
        $this->dependencies = TestCase::all();
        $this->statuses = Status::all();
        $this->priorities = Priority::all();
        //test case init
        if(isset($this->test_case->id)){
        $this->editMode = true;

        }else{
            $this->test_case = new TestCase();

        }
    }

    public function render()
    {
        return view('livewire.designers.create-designer');
    }
}
