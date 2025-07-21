<?php 

    namespace App\Repository\Interface;
    use App\Models\User;

    interface DashboardRepositoryInterface
    {
        public function selectUserbyAdmin();
        public function selectUserbyMember();
        // public function createUserbyAdmin(array $data);
        // public function createUserbyMember(array $data);
        public function showUserbyAdmin(int $id);
        public function showUserbymember(int $id);
    }