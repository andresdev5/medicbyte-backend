<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model {
    protected $fillable = ['name', 'dosage', 'unit', 'image', 'description'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function reminders() {
        return $this->hasMany(Reminder::class);
    }

    public function getDosageAttribute($value) {
        return number_format($value, 2);
    }
}
