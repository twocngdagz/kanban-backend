<?php

namespace App;

use App\Column;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['title', 'description', 'column_id', 'order'];

    public function column()
    {
        return $this->newBelongsTo(Column::class);
    }
}
