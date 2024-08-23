# Senior PHP Developer - Project Task

Food Delivery App

-   Run the app
    - `cd docker && docker compose -p food up -d && cd ..`

-   Stop the app
    - `cd docker && docker compose -p food down && cd ..`


using postman

 Step:01 - register as a new user
    `http://localhost/api/register`

{
    "name": "Alam",
    "email": "alam2@gmail.com",
    "password": "pass1234",
    "password_confirmation": "pass1234",
}

 Step:02 - login as a user
 `http://localhost/api/login`

{
    "email": "alam2@gmail.com",
    "password": "pass1234",
}

you will get token
using token store rider location
`http://localhost/api/rider/location/`
{
    "rider_id": "1",
    "service_name": "restaurant",
    "lat": "41.118491",
    "long": "25.404509",
    "capture_time": "2024-08-23 14:30:00",
}


- Fetch nearest rider
`http://localhost/api/restaurant/nearest-riders?restaurant_id=1&latitude=40.712776&longitude=-74.005974`