<?php 
namespace App\Repository;

use App\Repository\Interface\ProjectRepositoryInterface;
use App\Models\Project;
class ProjectRepository implements ProjectRepositoryInterface

{
    
    public function selectProjectAll()
    {
        return Project::all();
    }
    public function getProjectById(int $id)
    {
        return Project::findOrFail($id);
    }
    public function createProject(array $data)
    {
        $create = new Project($data);
        return $create->save();
    }
    public function updateProject(int $id ,array $data)
    {
        $update = $this->getProjectById($id);
        return $update->update($data);
    }
    public function deleteProject(int $id)
    {
        $delete = $this->getProjectById($id);
        
        return $delete->delete();
    }
}