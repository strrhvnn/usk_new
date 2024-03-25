<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Flight extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['no_flight', 'departure_city', 'departure_date', 'departure_time', 'arrival_date', 'arrival_time', 'arrival_city','seat','price', 'airline_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function transacation(){
        return $this->belongsTo(Transaction::class);
    }
    public function airline(){
        return $this->belongsTo(Airline::class);
    }

    public function toSearchableArray()
    {
        return [
            'departure_city' => $this->departure_city,
            'no_flight' => $this->no_flight,
            // Tambahkan kolom lain yang ingin dicari (optional)
        ];
    }
}
