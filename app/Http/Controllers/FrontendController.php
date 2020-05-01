<?php

namespace App\Http\Controllers;

use App\EnjoyTheTrip\Interfaces\FrontendRepositoryInterface;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function __construct(FrontendRepositoryInterface $repository)
    {
        $this->fR = $repository;

    }
    public function index()
    {
        $objects = $this->fR->getTouristObjectsforMainPage();



        return view('frontend.index', ['objects' => $objects]); //finish here
    }

    public function article()
    {
        return view('frontend.article');
    }

    public function object()
    {
        return view('frontend.object');
    }

    public function person()
    {
        return view('frontend.person');
    }

    public function room()
    {
        return view('frontend.room');
    }

    public function roomsearch()
    {
        return view('frontend.roomsearch');
    }

}
