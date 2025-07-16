<?php 

namespace App\Repository;

use App\Models\Abouts;
use App\Repository\Interface\AboutsRepositoryInterface;

class AboutsRepository implements AboutsRepositoryInterface
{
        public function getAllAbout()
        {
            return Abouts::all();
        }
        public function createAbout(array $data)
        {
            $aboutUS = new Abouts($data);
            return $aboutUS->save();
        }
        public function getAboutById(int $id)
        {
            return Abouts::findOrFail($id);
        }
        public function updateAbout(int $id, array $data)
        {
            $getAbout = $this->getAboutById($id);
            $getAbout->update($data);
            return $getAbout; 

        }
        public function deleteAboutById(int $id)
        {
            $getAbout = $this->getAboutById($id);
            return $getAbout->delete();
        }
}