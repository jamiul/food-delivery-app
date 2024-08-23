<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\RiderLocation;
use App\Http\Requests\StoreRiderLocationRequest;
use App\Interfaces\RiderLocationRepositoryInterface;

class RiderLocationController extends Controller
{
    private RiderLocationRepositoryInterface $riderLocationRepository;

    public function __construct(RiderLocationRepositoryInterface $riderLocationRepository)
    {
        $this->riderLocationRepository = $riderLocationRepository;
    }

    public function store(StoreRiderLocationRequest $request)
    {
        $input = $request->all();

        $location = $this->riderLocationRepository->createRiderLocation($input);

        return $location;
    }

    public function getNearestRiders(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);

        $restaurant = Restaurant::find($request->restaurant_id);
        $latitude = $restaurant->latitude;
        $longitude = $restaurant->longitude;

        $current_time = now();
        $five_minutes_ago = $current_time->subMinutes(5);

        $nearestRiders = RiderLocation::select('rider_id', 'lat', 'long')
            ->where('capture_time', '>=', $five_minutes_ago)
            ->get()
            ->map(function ($location) use ($latitude, $longitude) {
                $location->distance = $this->calculateDistance(
                    $latitude,
                    $longitude,
                    $location->latitude,
                    $location->longitude
                );
                return $location;
            })
            ->sortBy('distance')
            ->take(2);

        return response()->json($nearestRiders);
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        return $miles * 1.609344; // Return distance in kilometers
    }
}
