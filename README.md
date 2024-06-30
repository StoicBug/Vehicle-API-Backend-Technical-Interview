# Vehicle API Project

## Backend Technical Interview

This project is a technical interview task for a backend developer position. It implements a Symfony-based API that serves vehicle data from a JSON file and includes a filtering endpoint.

## Overview

This project is a technical interview task for a backend developer position. It implements a Symfony-based API that serves vehicle data from a JSON file and includes a filtering endpoint.

## Features

- Endpoint to retrieve all vehicles
- Filtering endpoint to search vehicles based on various criteria
- Data sourced from a local JSON file

## Technical Stack

- PHP 7.4+
- Symfony 5.4+
- JSON for data storage

## Setup and Running the Project

1. **Clone the repository:**
    
```bash
git clone [repository-url]
cd [project-directory]
```

2. **Install dependencies:**

```bash
composer install
```

3. **Run the server:**

```bash
symfony server:start
```


## Access the API

- All vehicles: `GET http://localhost:8000/api/vehicles`
- Filtered vehicles: `GET http://localhost:8000/api/vehicles/filter?[parameters]`

## API Endpoints

- `GET /api/vehicles`
- Returns all vehicles from the JSON file

- `GET /api/vehicles/filter`
- Accepts query parameters for filtering:
 - `brand`: Filter by vehicle brand
 - `model`: Filter by vehicle model
 - `fuel_type`: Filter by fuel type
 - `transmission_type`: Filter by transmission type
 - `min_power`: Filter by minimum power (in hp)
 - `max_price`: Filter by maximum price
 - `year`: Filter by year

Example: `/api/vehicles/filter?brand=Nissan&fuel_type=Essence&min_power=100&max_price=25000`

## Project Structure

- `src/Controller/VehicleController.php`: Contains the main logic for serving and filtering vehicle data
- `vehicles.json`: Source data file (should be placed in the project root)

## Notes for Reviewers

- The project demonstrates handling of JSON data in PHP
- Implements basic filtering logic without using a database
- Shows understanding of Symfony controller and routing concepts
- Considers performance by reading the JSON file only once per request
