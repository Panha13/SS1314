<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $primaryKey = "pid";
    protected $fillable = [
        "pname",
        "pdesc",
        "enable",
        "pprice",
        "pimg",
        "cid",
        "quantity",
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'cid'); // 'cid' is the foreign key column in the products table
    }
}
