<?php

namespace App\Observers;

use App\Models\Column;
use App\Models\Table;

class TableObserver
{
    /**
     * Handle the Table "created" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function created(Table $table)
    {
        //
    }

    /**
     * Handle the Table "updated" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function updated(Table $table)
    {
        //
    }

    /**
     * Handle the Table "deleted" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function deleted(Table $table)
    {
        $column = Column::where('table_id',$table->id);
        $column->delete();
    }

    /**
     * Handle the Table "restored" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function restored(Table $table)
    {
        //
    }

    /**
     * Handle the Table "force deleted" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function forceDeleted(Table $table)
    {
        //
    }
}
