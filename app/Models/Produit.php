<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'published',
    ];

    public function imageUrl(): string {
       return Storage::disk('public')->url($this->image);
    }
}
