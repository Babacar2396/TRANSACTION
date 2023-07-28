<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    public function show($id)
    {
        $client = Client::find($id);
        return response()->json($client);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'telephone' => 'required|string',
        ]);

        $client = Client::create($data);
        return response()->json($client, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'telephone' => 'required|string',
        ]);

        $client = Client::findOrFail($id);
        $client->update($data);
        return response()->json($client, 200);
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return response()->json(null, 204);
    }
}

