<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  const BORRADOR  = 1;
  const PUBLICADO = 2;

  protected $guarded = ['id', 'created_at', 'updated_at'];

  /* Change empty values to null */
  public static function booted(): void
  {
    static::updating(function (Product $product) {
      foreach ($product->attributes as $key => $value) {
        $product->{$key} = empty($value) ? null : $value;
      }
    });
  }

  //Accesor
  public function getStockAttribute()
  {
    if ($this->subcategory->size) {
      return ColorSize::whereHas('size.product', function (Builder $query) {
        $query->where('id', $this->id);
      })->sum('quantity');
    } else if ($this->subcategory->color) {
      return ColorProduct::whereHas('product', function (Builder $query) {
        $query->where('id', $this->id);
      })->sum('quantity');
    } else {
      return $this->quantity;
    }
  }

  public function brand()
  {
    return $this->belongsTo(Brand::class);
  }

  public function subcategory()
  {
    return $this->belongsTo(Subcategory::class);
  }

  public function colors()
  {
    return $this->belongsToMany(Color::class)->withPivot('quantity');
  }

  public function sizes()
  {
    return $this->hasMany(Size::class);
  }

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }

  // Url Amigable
  public function getRouteKeyName()
  {
    return 'slug';
  }
}
