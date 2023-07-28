<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $table = 'comptes';

    protected $fillable = ['numeroCompte', 'solde', 'fournisseur', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function transactionsEnvoyees()
    {
        return $this->hasMany(Transaction::class, 'compteSource_id');
    }

    public function transactionsRecues()
    {
        return $this->hasMany(Transaction::class, 'compteDestination_id');
    }
}
