<?php
namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function index()
    {
        $comptes = Compte::all();
        return response()->json($comptes);
    }

    public function show($id)
    {
        $compte = Compte::findOrFail($id);
        return response()->json($compte);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'numeroCompte' => 'required|string|unique:comptes',
            'solde' => 'required|numeric',
            'fournisseur' => 'required|string',
            'client_id' => 'required|exists:clients,id',
        ]);

        $compte = Compte::create($data);
        return response()->json($compte, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'numeroCompte' => 'required|string|unique:comptes,numeroCompte,' . $id,
            'solde' => 'required|numeric',
            'fournisseur' => 'required|string',
            'client_id' => 'required|exists:clients,id',
        ]);

        $compte = Compte::findOrFail($id);
        $compte->update($data);
        return response()->json($compte, 200);
    }

    public function destroy($id)
    {
        $compte = Compte::findOrFail($id);
        $compte->delete();
        return response()->json(null, 204);
    }
}
