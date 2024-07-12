<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all(); 
        $array = []; 
        foreach($clients as $client){
            $array[] = [
                'id' => $client->id,
                'name' => $client->name,
                'email' => $client->email,
                'phone' => $client->phone,
                'addres'=> $client->addres,
                'service' => $client->services,
            ];
        }

        return response()->json($array); 
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
        $client = new Client(); 
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->addres = $request->addres;
        $client->save(); 

        $data = [
            'message' => 'client saved', 
            'client' => $client
        ]; 

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $data = [
            'message' => 'Client found',
            'client' => $client
        ]; 

        return response()->json($data); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->addres = $request->addres;
        $client->update(); 

        $data = [
            'message' => 'client updated', 
            'client' => $client
        ]; 

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete(); 

        $data = [
            'message' => 'Client deleted', 
            'client' => $client
        ]; 

        return response()->json($data); 
    }

    public function attach(Request $request, Client $client)
    {
        $client->services()->attach($request->service_id); 

        $data = [
            'message' => 'service attched',
            'client' => $client,
        ]; 

        return response()->json($data);

    }

    public function unAttach(Request $request, Client $client)
    {
        $client->services()->detach($request->service_id); 

        $data = [
            'message' => 'service desatached', 
            'client' => $client,
        ]; 

        return response()->json($data); 
    }
}
