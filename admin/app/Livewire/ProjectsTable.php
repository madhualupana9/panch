<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = ['search', 'statusFilter'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function toggleFeatured($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            $project->update(['is_featured' => !$project->is_featured]);
            $this->dispatch('project-updated', message: 'Project featured status updated!');
        }
    }

    public function toggleActive($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            $project->update(['is_active' => !$project->is_active]);
            $this->dispatch('project-updated', message: 'Project status updated!');
        }
    }

    public function deleteProject($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $project->delete();
            $this->dispatch('project-deleted', message: 'Project deleted successfully!');
        }
    }

    public function render()
    {
        $projects = Project::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('client', 'like', '%' . $this->search . '%')
                    ->orWhere('location', 'like', '%' . $this->search . '%');
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.projects-table', [
            'projects' => $projects,
        ]);
    }
}
