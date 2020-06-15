<?php

namespace App\EnjoyTheTrip\Gateways;
use App\EnjoyTheTrip\Interfaces\FrontendRepositoryInterface;

class FrontendGateway
{

    public function __construct(FrontendRepositoryInterface $fR)
    {
        $this->fR = $fR;
    }


    public function serachCities($request)
    {
        $term = $request->input('term');
        $result = [];
        $queries = $this->fR->getSearchCities($term);

        foreach($queries as $query)
        {
            $result[] = ['id' =>$query->id,'value'=>$query->name];
        }

        return $result;
    }


    public function getSearchResults($request)
    {
        if($request->input('city') != null)
        {
            $result = $this->fR->getSearchResults($request->input('city'));

            if($result)
            {
                //to do ...

                return $result;
            }
        }
        return false;
    }

}
