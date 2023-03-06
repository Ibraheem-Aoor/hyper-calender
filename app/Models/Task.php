<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $dates = ['date','time','last_email_sent'];

    protected $fillable = ['user_id','title','date','time','description','is_all_day','last_email_sent','is_done'];

    /**
     * A task is belongs to a repeat
     *
     * @return BelongsTo
     */
    public function repeat(): BelongsTo
    {
        return $this->belongsTo(Repeat::class);
    }

    /**
     * A task is belongs to an user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
