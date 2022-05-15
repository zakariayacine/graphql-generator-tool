<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Column extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function table() : BelongsTo {
        return $this->belongsTo(Table::class);
    }
}
