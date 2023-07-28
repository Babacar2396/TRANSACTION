<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json($transactions);
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return response()->json($transaction);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string|in:depot,retrait,transfert',
            'montant' => 'required|numeric',
            'dateTransaction' => 'required|date',
            'statut' => 'required|string|in:valide,en_attente,annule',
            'compteSource_id' => 'required|exists:comptes,id',
            'compteDestination_id' => 'required_if:type,transfert|exists:comptes,id',
            'code' => 'required_if:type,retrait|string',
        ]);

        $transaction = Transaction::create($data);
        return response()->json($transaction, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'type' => 'required|string|in:depot,retrait,transfert',
            'montant' => 'required|numeric',
            'dateTransaction' => 'required|date',
            'statut' => 'required|string|in:valide,en_attente,annule',
            'compteSource_id' => 'required|exists:comptes,id',
            'compteDestination_id' => 'required_if:type,transfert|exists:comptes,id',
            'code' => 'required_if:type,retrait|string',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($data);
        return response()->json($transaction, 200);
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return response()->json(null, 204);
    }
}
