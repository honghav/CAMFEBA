<?php 

    namespace App\Repository\Interface;

interface QouteRepositoryInterface
{
    public function getAllQoutes();
    public function getQouteById($id);
    public function createQoute(array $data);
    public function updateQoute($id, array $data);
    public function deleteQoute($id);
    public function searchQoutes($query);
}