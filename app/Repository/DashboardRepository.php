<?php 

    namespace App\Repository;

    use App\Repository\Interface\DashboardRepositoryInterface;
    use App\Models\User;

    class DashboardRepository implements DashboardRepositoryInterface
    {
        public function selectUserbyAdmin()
        {
            return User::all();
        }

        public function selectUserbyMember()
        {
            return User::where('role', 'member')->first();
        }

        public function showUserbyAdmin(int $id)
        {
            return User::findOrFail($id);
        }

        public function showUserbymember(int $id)
        {
            return User::findOrFail($id);
        }
    }