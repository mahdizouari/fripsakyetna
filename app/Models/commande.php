<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    // Disable timestamps
    public $timestamps = false;

    // Define fillable fields
    protected $fillable = [
        'nom_de_produit',
        'nom_de_client',
        'numero_de_client',
        'adresse',
        'prix',
        'date'
    ];
}
