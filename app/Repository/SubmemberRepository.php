<?php

namespace App\Repository;

use App\Repository\Interface\SubmemberRepositoryInterface;
use App\Models\Submember;

class SubmemberRepository implements SubmemberRepositoryInterface
{

    public function getAllSubmembers()
    {
        return Submember::all();
    }

    public function getSubmemberById($id)
    {
        return Submember::findOrFail($id);
    }
   public function getSubmemberByUserId($userId)
    {
        return Submember::where('user_id', $userId)->get();
    }
    public function createSubmember(array $data)
    {
        return Submember::create($data);
    }

    public function updateSubmember($id, array $data)
    {
        $submember = $this->getSubmemberById($id);
        $submember->update($data);
        return $submember;
    }

    public function deleteSubmember($id)
    {
        $submember = $this->getSubmemberById($id);
        return $submember->delete();
    }

    public function searchSubmembers($query)
    {
        return Submember::where('name', 'like', "%{$query}%")
                           ->orWhere('email', 'like', "%{$query}%")
                           ->get();
    }
}