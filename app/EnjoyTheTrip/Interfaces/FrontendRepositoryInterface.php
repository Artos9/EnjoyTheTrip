<?php

namespace App\EnjoyTheTrip\Interfaces;


interface FrontendRepositoryInterface
{
    public function getTouristObjectsforMainPage();
    public function getTouristObject($id);
}
