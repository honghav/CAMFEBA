<?php 

namespace App\Repository;

use App\Repository\Interface\AnotherServicesRepositoryInterface;
use App\Models\Another_Services;

class AnotherServicesRepository implements AnotherServicesRepositoryInterface
{
    public function getAllServices()
    {
        return Another_Services::all();
    }

    public function getServiceById($id)
    {
        return Another_Services::find($id);
    }

    public function createService(array $data)
    {
        return Another_Services::create($data);
    }

    public function updateService($id, array $data)
    {
        $service = Another_Services::find($id);
        if ($service) {
            $service->update($data);
            return $service;
        }
        return null;
    }

    public function deleteService($id)
    {
        $service = Another_Services::find($id);
        if ($service) {
            $service->delete();
            return true;
        }
        return false;
    }
}