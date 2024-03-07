<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reminder extends Model {
    protected $fillable = [
        'medication_id',
        'start_date',
        'end_date',
        'interval_value',
        'interval_unit',
        'interval_count',
        'max_intervals',
        'notes',
        'status',
    ];

    protected $casts = [
        'start_date'  => 'datetime:Y-m-d H:i:s',
        'end_date' => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function medication(): BelongsTo
    {
        return $this->belongsTo(Medication::class);
    }
}
