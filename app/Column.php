<?php

namespace App;

use App\Card;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    protected $fillable = ['name'];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
