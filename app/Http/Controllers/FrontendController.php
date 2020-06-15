<?php

namespace App\Http\Controllers;

use App\EnjoyTheTrip\Interfaces\FrontendRepositoryInterface;
use App\EnjoyTheTrip\Gateways\FrontendGateway;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function __construct(FrontendRepositoryInterface $fR, FrontendGateway $fG)
    {
        $this->fR = $fR;
        $this->fG = $fG;

    }
    public function index()
    {
        $objects = $this->fR->getTouristObjectsforMainPage();

        //dd($objects);

        return view('frontend.index', ['objects' => $objects]); //finish here
    }

    public function article()
    {
        return view('frontend.article');
    }

    public function object($id)
    {
        $object = $this->fR->getTouristObject($id);

        return view('frontend.object', ['object' => $object]);
    }

    public function person()
    {
        return view('frontend.person');
    }

    public function room()
    {
        return view('frontend.room');
    }

    public function roomsearch(Request $request)
    {
        if ($city = $this->fG->getSearchResults($request))
        {
            dd($city);
            return view('frontend.roomsearch',['city' => $city]);
        }
        else
        {
            if(!$request->ajax()())
            return redirect('/')->with('norooms','No offers were found matching the criteria');
        }



    }

    public function searchCities(Request $request)
    {

        $results = $this->fG->serachCities($request);

        return response()->json($results);
    }

}
