
## Senior PHP Developer - Project Task

## Food Delivery App


## Deployment

To run the project

```bash
  cd docker && docker compose -p food up -d && cd ..
```

To stop the project

```bash
  cd docker && docker compose -p food down && cd ..
```

## Running Tests
- Using postman /  Step:01 - register as a new user

```bash
  http://localhost/api/register
```


## Usage/Examples

```json
{
    "name": "Alam",
    "email": "alam2@gmail.com",
    "password": "pass1234",
    "password_confirmation": "pass1234",
}
```


 Step:02 - login as a user
 `http://localhost/api/login`

 ```json
{
    "email": "alam2@gmail.com",
    "password": "pass1234",
}
```

## login a user
 ```json
{
    "email": "alam2@gmail.com",
    "password": "pass1234",
}
```

## store rider location
using token store rider location
`http://localhost/api/rider/location/`

 ```json
{
   "rider_id": "1",
    "service_name": "restaurant",
    "lat": "41.118491",
    "long": "25.404509",
    "capture_time": "2024-08-23 14:30:00",
}
```


## Fetch nearest rider

`http://localhost/api/restaurant/nearest-riders`

```json
    {
        "restaurant_id": 1,
        "latitude": "41.1184910",
        "longitude": "25.4045090",
    },
```

## Run test
`docker exec -it php bash`

`php artisan test`