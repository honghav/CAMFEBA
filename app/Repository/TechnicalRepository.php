<?php 

namespace App\Repository;
use App\Repository\Interface\TechnicalRepositoryInterface;
use App\Models\Technicals;

class TechnicalRepository implements TechnicalRepositoryInterface
{
    public function getAllTechnicals($category_page)
    {
        return Technicals::where('category_page',$category_page)->get();
    }

    public function getTechnicalById($id)
    {
        return Technicals::findOrFail($id);
    }

    public function createTechnical(array $data)
    {
        return Technicals::create($data);
    }

    public function updateTechnical($id, array $data)
    {
        $technical = Technicals::findOrFail($id);
        $technical->update($data);
        return $technical;
    }

    public function deleteTechnical($id)
    {
        $technical = Technicals::findOrFail($id);
        return $technical->delete();
    }
    public function getAllTechnicalsBytype($type)
    {
        $technical = Technicals::where('category_page', $type)->get();
        return $technical;
    }
}
