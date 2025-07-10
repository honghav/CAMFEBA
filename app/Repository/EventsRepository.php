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
        public function create(array $data)
        {
            return Events::create($data);
        }
        public function updateEvent($id, array $data)
        {
            $findData = $this->getEventById($id);

            return $findData->update($data);
        }
        public function dropEvent($id)
        {
            $findData = $this->getEventById($id);
            return $findData->delete();
        }
    }
