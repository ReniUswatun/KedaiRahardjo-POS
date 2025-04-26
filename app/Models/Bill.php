<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nomor_meja',
        'catatan'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}