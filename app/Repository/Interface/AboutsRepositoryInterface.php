<?php

    namespace App\Repository\Interface;

    interface AboutsRepositoryInterface 
    {
        public function getAllAbout();
        public function createAbout(array $data);
        public function getAboutById(int $id);
        public function updateAbout(int $id, array $data);
        public function deleteAboutById(int $id);
        public function selectAboutHome();
    }