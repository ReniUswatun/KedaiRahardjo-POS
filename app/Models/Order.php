<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'customer_name',
        'table_number',
        'order_note',
        'order_date',
        'order_status',
        'total_products',
        'invoice_no',
        'total_amount',
        'payment_method',
        'payment_status',
        'qris_url',
        'qris_expiration',
        'qris_transaction_id',
    ];

    public $sortable = [
        'customer_name',
        'table_number',
        'order_date',
        'total_amount',
        'payment_status',
    ];

    protected $guarded = [
        'id',
    ];

    // Relasi dengan OrderDetails
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('customer_name', 'like', '%' . $search . '%');
        });
    }
}
