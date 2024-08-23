<?php

namespace App\Repositories;

use App\Interfaces\RiderLocationRepositoryInterface;
use App\Models\RiderLocation;

class RiderLocationRepository implements RiderLocationRepositoryInterface
{
    public function createRiderLocation(array $location): object
    {
        return RiderLocation::create($location);
    }
}
