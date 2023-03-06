<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['start_date','end_date','start_time','end_time','last_email_sent'];

    protected $fillable = ['user_id','title','start_date','start_time','end_date','end_time','repeat_id','guests','locations','description','last_email_sent'];

    /**
     * An event is belongs to a repeat
     * @return BelongsTo
     */
    public function repeat(): BelongsTo
    {
        return $this->belongsTo(Repeat::class);
    }

    /**
     * An event is belongs to an user
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
