<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reminder extends Model
{
    use HasFactory;

    protected $dates = ['date','time','last_email_sent'];

    protected $fillable = ['user_id','title','date','time','repeat_id','is_all_day','last_email_sent','is_done'];

    /**
     * A reminder is belongs to a repeat
     * @return BelongsTo
     */
    public function repeat(): BelongsTo
    {
        return $this->belongsTo(Repeat::class);
    }

    /**
     * A reminder is belongs to an user
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
