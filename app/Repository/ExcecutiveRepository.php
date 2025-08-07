<?php

namespace App\Repository;

use App\Models\Executive;
use App\Repository\Interface\ExcecutiveRepositoryInterface;

class ExcecutiveRepository implements ExcecutiveRepositoryInterface
{
    public function all()
    {
        return Executive::all();
    }

    public function find($id): ?Executive
    {
        return Executive::find($id);
    }

    public function create(array $data): Executive
    {
        return Executive::create($data);
    }

    public function update($id, array $data): bool
    {
        $executive = Executive::find($id);
        return $executive ? $executive->update($data) : false;
    }

    public function delete($id): bool
    {
        $executive = Executive::find($id);
        return $executive ? $executive->delete() : false;
    }
    public function getExecutiveByrole($role)
    {
        $executive = Executive::where('role','=', $role)->firstOrFail();
        return $executive;
    }
    public function getBordMember($role)
    {
        $executive = Executive::where('role', '!=' ,  $role)->get();
        return $executive;
    }

}
