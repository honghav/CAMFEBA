<?php 

namespace App\Repository\Interface;
Interface SecretariatRepositoryInterface
{
    public function getAllSecretariats();
    public function getSecretariatById($id);
    public function createSecretariat(array $data);
    public function updateSecretariat($id, array $data);
    public function deleteSecretariat($id);
}
