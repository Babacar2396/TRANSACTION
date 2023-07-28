<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    protected $fillable = ['type', 'montant', 'dateTransaction', 'statut', 'compteSource_id', 'compteDestination_id', 'code'];

    public function compteSource()
    {
        return $this->belongsTo(Compte::class, 'compteSource_id');
    }

    public function compteDestination()
    {
        return $this->belongsTo(Compte::class, 'compteDestination_id');
    }
}
