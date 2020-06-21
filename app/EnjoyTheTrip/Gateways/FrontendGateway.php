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

        $request->flash();
        if($request->input('city') != null)
        {
            $result = $this->fR->getSearchResults($request->input('city'));

            if($result)
            {
                foreach($result->rooms as $k=>$room)
                {
                    if( $request->input('room_size') > 0 )
                    {
                        if ($request->input('room_size') != $room->room_size) {
                            $result->rooms->forget($k);
                        }
                    }
                    foreach($room->reservations as $reservation)
                    {
                        if( $request->input('check_in') >= $reservation->day_in
                        && $request->input('check_in') <= $reservation->day_out)
                        {
                            $result->rooms->forget($k);
                        }
                        elseif( $request->input('check_out') >= $reservation->day_in
                        && $request->input('check_out') <= $reservation->day_out)
                        {
                            $result->rooms->forget($k);
                        }
                        elseif( $request->input('check_in') <= $reservation->day_in
                        && $request->input('check_out') >= $reservation->day_out)
                        {
                            $result->rooms->forget($k);
                        }
                    }
                }

            }
                if (count($result->rooms) > 0)
                    return $result;
                else
                    return false;
        }
        return false;
    }

}
