<?php

    namespace App\Services;

    use App\Repository\Interface\EventsRepositoryInterface;

    class EventsService 
    {
        protected $eventRepository;

        public function __construct(EventsRepositoryInterface $eventRepository)
        {
            $this->eventRepository = $eventRepository;
        }

        public function getAllEvent()
        {
            return $this->eventRepository->getAllEvents();
        }

        public function getEventById($id)
        {
            return $this->eventRepository->getEventById($id);
        }
    }