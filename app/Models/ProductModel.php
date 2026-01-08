<?php


namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'slug','category_id', 'description', 'price', 'stock', 'image', 'created_at', 'updated_at'
    ];
}
?>
