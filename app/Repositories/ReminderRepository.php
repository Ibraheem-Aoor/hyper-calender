<?php


namespace App\Repositories;


use App\Models\Repeat;
use Illuminate\Support\Collection;

class ReminderRepository
{
    /**
     * @return Collection
     */
    public function repeats(): Collection
    {
        return Repeat::all()->pluck('name','id');
    }
}
