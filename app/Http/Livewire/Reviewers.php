<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Reviewers as LivewireReviewers;
use App\Models\TestCase;
use App\Models\TestCaseDataRequirement;
use App\Models\TestCaseStep;
use Livewire\Component;

class Reviewers extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $show = false;
    public $comment = false;
    public $index = true;



    public $step_id;
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';
    public $result_step_no = 20;
    public $search_step = '';
    public $result_no_test_data = 20;
    public $search_test_data = '';
    public $reviewer = 1;
    public $reviewer_comment;
    public $test_case_id;
    public $status_id;
    public $test_case;


    public function resetInputFields()
    {

        $this->reviewer_comment = '';
    }
    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }


    public function newcomment($id)
    {
        $commentreviwer = TestCaseStep::where('id', $id)->first();
        $this->step_id = $commentreviwer->id;
        $this->comment = true;
        $this->show = false;
        $this->index = false;
    }

    public function addcomment()
    {
        $validateData = $this->validate([
            'reviewer_comment' => 'required|string',
        ]);
        if ($this->step_id) {

            $commentreviwer = TestCaseStep::find($this->step_id);
            $commentreviwer->update($validateData);
            $this->comment = false;
            $this->show = true;
            $this->index = false;
        }
        $this->resetInputFields();
    }



    public function statusTestCase()
    {
        $validateData = $this->validate([
            'status_id' => 'required|string',
        ]);
        if ($this->test_case_id) {

            $statusreviwer = TestCase::find($this->test_case_id);
            $statusreviwer->update($validateData);
            $this->comment = false;
            $this->show = false;
            $this->index = true;
        }
    }
    public function filterTestCase($id){
        $testcase = TestCase::where('id',$id)->first();
        $this->test_case = $testcase->id;
    }

    public function new($id)
    {
        $this->show = true;
        $this->index = false;
        if ($this->show = true) {
            $testcase = TestCase::where('id', $id)->first();
            $this->test_case_id = $testcase->id;
        }
    }

    public function render()
    {
        return view('livewire.reviewers.reviewer');
    }
}
