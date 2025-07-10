<?php 

    namespace App\Repository\Interface;
    // use App\Repository\Interface\EventsRepositoryInterface;

    interface EventsRepositoryInterface
    {
        public function getAllEvents();
        public function getEventById($id);
        public function create(array $data);
        public function updateEvent($id, array $data);
        public function dropEvent($id);
    }