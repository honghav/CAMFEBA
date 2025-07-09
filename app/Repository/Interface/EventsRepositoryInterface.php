<?php 

    namespace App\Repository\Interface;
    // use App\Repository\Interface\EventsRepositoryInterface;

    interface EventsRepositoryInterface
    {
        public function getAllEvents();
        public function getEventById($id);
    }