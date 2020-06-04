<?php

namespace App\EnjoyTheTrip\Repositories;
use App\EnjoyTheTrip\Interfaces\FrontendRepositoryInterface;
use App\{TouristObject, City};


class FrontendRepository implements FrontendRepositoryInterface
{
    public function getTouristObjectsforMainPage()
    {
        return TouristObject::with(['city','photos'])->ordered()->paginate(8);
    }

    public function getTouristObject($id)
    {
        return TouristObject::with(['city','photos','addresses','users.photos','comments.user','articles.user','rooms.object.city'])->find($id);
    }

    public function getSearchCities(string $term)
    {
        return City::where('name','LIKE',$term.'%')->get();
    }
}
