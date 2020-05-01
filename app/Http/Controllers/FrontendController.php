<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EnjoyTheTrip\Repositories\FrontendRepository;

class FrontendController extends Controller
{

    public function __construct(FrontendRepository $repository)
    {
        $this->fR = $repository;

    }
    public function index()
    {
        $objects = $this->fR->getTouristObjectsforMainPage();

        dd($objects);

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
