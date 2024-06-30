<?php

namespace App\Controller;

use PHPUnit\Util\Json;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class VehicleController extends AbstractController
{
    #[Route('/api/vehicles', name: 'app_vehicle', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $projectDir = $this->getParameter('kernel.project_dir');
        $jsonFilePath = $projectDir . '/vehicles.json';
        $jsonContent = file_get_contents($jsonFilePath);
        $vehicles = json_decode($jsonContent, true);

        return $this->json($vehicles);
    }


    #[Route('/api/vehicles/filter', name: 'app_vehicle_filter', methods: ['GET'])]
    public function filter(Request $request): JsonResponse
    {

        $vehicles = $this->getVehiclesData();

        $brand = $request->query->get('brand');
        $model = $request->query->get('model');
        $fuelType = $request->query->get('fuel_type');
        $transmissionType = $request->query->get('transmission_type');
        $minPower = $request->query->get('min_power');
        $maxPrice = $request->query->get('max_price');
        $year = $request->query->get('year');

        $filteredVehicles = array_filter($vehicles, function($vehicle) use ($brand, $model, $fuelType, $transmissionType, $minPower, $maxPrice, $year) {
            if ($brand && strtolower($vehicle['brand']) !== strtolower($brand)) return false;
            if ($model && strtolower($vehicle['model']) !== strtolower($model)) return false;
            if ($fuelType && strtolower($vehicle['fuel_type']) !== strtolower($fuelType)) return false;
            if ($transmissionType && strtolower($vehicle['transmission_type']) !== strtolower($transmissionType)) return false;
            if ($minPower && $vehicle['power_in_hp'] < $minPower) return false;
            if ($maxPrice && $vehicle['gross_price'] > $maxPrice) return false;
            if ($year && $vehicle['year'] !== $year) return false;
            return true;
        });

        return $this->json(array_values($filteredVehicles));
    }

    private function getVehiclesData(): array
        {
            $projectDir = $this->getParameter('kernel.project_dir');
            $jsonFilePath = $projectDir . '/vehicles.json';
            $jsonContent = file_get_contents($jsonFilePath);
            $vehicles = json_decode($jsonContent, true);

            return $vehicles;
        }

}
