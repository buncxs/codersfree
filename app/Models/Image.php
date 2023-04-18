<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     *  Get the parent imageable model (product)
     */

    public function imageable()
    {
        return $this->morphTo();
    }


}
