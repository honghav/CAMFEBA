<?php
namespace App\Repository\Interface;

use App\Models\Executive;

interface ExcecutiveRepositoryInterface
{
    public function all();
    public function find($id): ?Executive;
    public function create(array $data): Executive;
    public function update($id, array $data): bool;
    public function delete($id): bool;
    public function getExecutiveByrole($role);
    public function getBordMember($role);

}
