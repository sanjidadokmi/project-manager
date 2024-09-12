<?php

namespace App\Livewire;
use Livewire\Attributes\Validate;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class ProjectsComponent extends Component
{
    use WithPagination;

    #[Validate('required')] 
    public $project_name;

    #[Validate('required')] 
    public $project_description;


    public function create()
    {
        $this->validate();
        
            Project::create([
                'project_name' => $this->project_name, 
                'project_description' => $this->project_description
            ]);
    
            $this->project_name = '';
            $this->project_description = '';
    
            session()->flash('message', 'Project Created successfully!'); 
            return $this->redirect('/projects');
           
        
    }

    public function render()
    {
       $statuses = Project::getStatuses();

        return view('livewire.projects-component', [
            'projects' => Project::latest()->paginate(5),
            'statuses' => $statuses,
        ]);
    }
}
