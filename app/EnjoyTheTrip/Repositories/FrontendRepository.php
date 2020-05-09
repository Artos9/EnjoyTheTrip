<?php

namespace App\EnjoyTheTrip\Repositories;
use App\TouristObject;
use App\EnjoyTheTrip\Interfaces\FrontendRepositoryInterface;

class FrontendRepository implements FrontendRepositoryInterface
{
    public function getTouristObjectsforMainPage()
    {
        return TouristObject::with(['city','photos'])->ordered()->paginate(8);
    }

    public function getTouristObject($id)
    {
        return TouristObject::find($id);
    }
}
