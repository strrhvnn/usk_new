<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    use Searchable;

    protected $fillable = ['no_booking','user_id', 'customer_name', 'phone_number', 'email','flight_id', 'airline_id', 'total_price','payment_status', 'passanger_name'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function flight(){
        return $this->belongsTo(Flight::class);
    }
    public function airline(){
        return $this->belongsTo(Airline::class);
    }

    public function toSearchableArray()
    {
        return [
            'no_booking' => $this->no_booking,
            'customer_name' => $this->customer_name,
            'passanger_name' => $this->passanger_name,
            // Tambahkan kolom lain yang ingin dicari (optional)
        ];
    }
}
