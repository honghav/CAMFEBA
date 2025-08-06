<?php 

namespace App\Repository;

use App\Repository\Interface\LayoutsRepositoryInterface;
use App\Models\Layouts;

class LayoutsRepository implements LayoutsRepositoryInterface
{
    public function getAllLayouts()
    {
        return Layouts::all();
    }

    public function getLayoutById($id)
    {
        return Layouts::find($id);
    }
    public function createLayout(array $data)
    {
        return Layouts::create($data);
    }
    public function updateLayout($id, array $data)
    {
        $update = $this->getLayoutById($id);
        return $update->update($data);
    }
    public function deleteLayout($id)
    {
        $layout = Layouts::find($id);
        if ($layout) {
            $layout->delete();
            return true;
        }
        return false;
    }
    public function getLayoutByPage($page)
    {
        return Layouts::select('file_path' , 'name')->where('type', $page)->first();
    }
}