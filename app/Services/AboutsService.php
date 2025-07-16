<?php

namespace App\Services;

use App\Repository\AboutsRepository;
use App\Repository\Interface\AboutsRepositoryInterface;
use App\Models\Abouts;

class AboutsService 
{
    public $aboutsRepository;

    public function __construct(AboutsRepositoryInterface $aboutsRepository)
    {
        $this->aboutsRepository = $aboutsRepository;
    }

    public function selectAbout()
    {
        return $this->aboutsRepository->getAllAbout();
    }
    public function createAbout(array $data)
    {
        return $this->aboutsRepository->createAbout($data);
    }
    public function selectAboutById($id)
    {
        return $this->aboutsRepository->getAboutById($id);
    }

    public function updateAboutById($id , array $data)
    {
        // $request = $this->aboutsRepository->getAboutById($id);
        // return $this->aboutsRepository->updateAbout($id, $request);

        $about = Abouts::findOrFail($id);
            $about->update($data);
            return $about;
    }

    public function deleteAboutById($id)
    {
        return $this->aboutsRepository->deleteAboutById($id);
    }

    
    
}