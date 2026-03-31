<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'service_type',
        'session_start',
        'session_end',
        'duration',
        'participants',
        'project_details',
        'status',
        'total_amount',
        'deposit_paid',
        'payment_status',
    ];

    protected $casts = [
        // 'session_start' => 'datetime',
        'total_amount' => 'decimal:2',
        'deposit_paid' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getServiceTypeLabelAttribute()
    {
        $labels = [
            'live_production' => 'Live Production',
            'broadcast' => 'Broadcast Services',
            'live_streaming' => 'Live Streaming',
            'audio_recording' => 'Audio Recording',
            'post_production' => 'Post-Production',
        ];

        return $labels[$this->service_type] ?? ucfirst(str_replace('_', ' ', $this->service_type));
    }

    public function getStatusLabelAttribute()
    {
        $labels = [
            'pending' => 'Pending',
            'confirmed' => 'Confirmed',
            'cancelled' => 'Cancelled',
            'completed' => 'Completed',
        ];

        return $labels[$this->status] ?? ucfirst($this->status);
    }

    public function getStatusColorAttribute()
    {
        $colors = [
            'pending' => '#FFD700',
            'confirmed' => '#FF8F20',
            'cancelled' => '#DC2626',
            'completed' => '#10B981',
        ];

        return $colors[$this->status] ?? '#6B7280';
    }
}
