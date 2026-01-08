<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'product_id', 'quantity', 'total_price', 'status', 'created_at', 'updated_at'
    ];
}
