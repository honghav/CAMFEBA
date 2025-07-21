<?php 
    namespace App\Services;
    use App\Repository\Interface\DashboardRepositoryInterface;

    class DashboardService
    {
        protected $dashboardRepository;

        public function __construct(DashboardRepositoryInterface $dashboardRepository)
        {
            $this->dashboardRepository = $dashboardRepository;
        }

        public function getAdmins()
        {
            return $this->dashboardRepository->selectUserbyAdmin();
        }

        public function getMembers()
        {
            return $this->dashboardRepository->selectUserbyMember();
        }

        public function getAdminById(int $id)
        {
            return $this->dashboardRepository->showUserbyAdmin($id);
        }

        public function getMemberById(int $id)
        {
            return $this->dashboardRepository->showUserbymember($id);
        }
    }
