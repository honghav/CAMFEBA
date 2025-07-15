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
        public function requestEvent($request)
        {
            $data = $request->only([
                'title',
                'description',
                'cover',
                'start_date',
                'location',
                'price',
                'start_time',
                'end_time',
                'register_link',
                'end_register'
            ]); 
            return $data;
        }
        public function setNewsEvent($request)
        {
            // $data = $this->requestEvent($request);

            $setNewsEvent = $this->eventRepository->create($request);
            return $setNewsEvent;
        }
        
    }