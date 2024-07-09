<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'name',
        'price',
        'quantity',
        'image',
        'owner',
    ];

    public function imageUrl(): string {
       return Storage::disk('public')->url($this->image);
    }
}
