<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function columns() : HasMany {
        return $this->hasMany(Column::class);
    }
    
    public function project() : BelongsTo {
        return $this->belongsTo(Project::class, 'id','project_id');
    }

}
