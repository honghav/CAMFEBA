<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LayoutsService;
class HomeController extends Controller
{
    protected $layoutsService;
    public function __construct(LayoutsService $layoutsService)
    {
        $this->layoutsService = $layoutsService;        
    }
    public function index()
    {
        $namepage1 = 'home1'; 
        $namepage2 = 'home2'; 
        $namepage3 = 'home3'; 
        $l1 = $this->layoutsService->selectLayoutByPage($namepage1);
        $l2= $this->layoutsService->selectLayoutByPage($namepage2);
        $l3 = $this->layoutsService->selectLayoutByPage($namepage3);
        return view('Homepage.mainhome' ,compact('l1', 'l2', 'l3'));
    }
}
