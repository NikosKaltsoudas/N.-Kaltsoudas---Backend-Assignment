## Backend Assignment
- Inside the project's directory, run
	> docker-compose up -d
	
- After that, to run commands in the app container, run
	> docker-compose exec marine_traffic bash
	
- To run the migrations and seed the table, run
	> php artisan migrate:fresh --seed
	
- Finally, for the application to be able to access the log file, run
	> chmod -R ugo+rw storage 

By making either a post request on the endpoint

	localhost:8000/api/shipPosition
(the app runs on port 8000 by default)

with the following parameters

    "min_latitude" (required, float -90 to 90)
    "max_latitude" (required, float -90 to 90)
    "min_longtitude" (required, float -180 to 180)
    "max_longtitude" (required, float -180 to 180)
    "time_from" (required, integer)
    "time_to" (required, integer)
    "mmsi" (single integer value or array of integers)

e.g

    {"min_latitude" : "-42.1333500",
    "max_latitude" : "42.7517800",
    "min_longtitude" : "-180.4415000",
    "max_longtitude" : "16.2518200",
    "time_from" : "1372700220",
    "time_to": "1372700460",
    "mmsi" : "247039300"}
    
the app returns a JSON response which includes all ships included within the given coordinates, in the given time frame

To run the tests, in the app container, run
> php artisan test


