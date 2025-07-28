<?php 

namespace App\Repository;

use App\Repository\Interface\SecretariatRepositoryInterface;
use App\Models\Secretariat;

class SecretariatRepository implements SecretariatRepositoryInterface
{
    public function getAllSecretariats()
    {
        return Secretariat::all();
    }

    public function getSecretariatById($id)
    {
        return Secretariat::findOrFail($id);
    }

    public function createSecretariat(array $data)
    {
        return Secretariat::create($data);
    }

    public function updateSecretariat($id, array $data)
    {
        $secretariat = Secretariat::findOrFail($id);
        $secretariat->update($data);
        return $secretariat;
    }

    public function deleteSecretariat($id)
    {
        $secretariat = Secretariat::findOrFail($id);
        return $secretariat->delete();
    }
}