<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $table ="labels";

    protected $fillable =[

        'name',
        'status',
        'color'

    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
