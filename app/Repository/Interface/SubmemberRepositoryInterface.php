<?php 

    namespace App\Repository\Interface;

    interface SubmemberRepositoryInterface
    {
        public function getAllSubmembers();
        public function getSubmemberById($id);
        public function getSubmemberByUserId($userId);
        public function createSubmember(array $data);
        public function updateSubmember($id, array $data);
        public function deleteSubmember($id);
        public function searchSubmembers($query);
    }