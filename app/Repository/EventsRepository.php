<?php
    namespace App\Repository;

use App\Repository\Interface\EventsRepositoryInterface;
use App\Models\Events;
    class EventsRepository implements EventsRepositoryInterface
    {
        public function getAllEvents()
        {
            return Events::all();
        }
        public function getEventById($id)
        {
            return Events::where('id' , $id)->first();
        }
    }
