<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all(); 

        return response()->json($services);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service = new Service(); 
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save(); 

        $data = [
            'message' => 'saved service',
            'service' => $service
        ]; 

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $data = [
            'message' => 'service found',
            'service' => $service
        ]; 

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->update(); 

        $data = [
            'message' => 'saved service',
            'service' => $service
        ]; 

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete(); 

        $data = [
            'message' => 'service deleted',
            'service' => $service
        ];

        return response()->json($data); 
    }
}
