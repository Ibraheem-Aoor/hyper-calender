<?php


namespace App\Repositories;


class SettingsRepository
{
    /**
     * @return string[]
     */
    public function languages(): array
    {
        return [
            'en' => 'ENGLISH'
        ];
    }

    /**
     * @return string[]
     */
    public function dateFormat(): array
    {
        return [
            'j/n/Y' => 'j/n/Y [5/9/2021]',
            'Y-m-d' => 'Y-m-d [2021-04-30]',
            'Y/m/d' => 'Y/m/d [2021/04/30]',
            'd-m-Y' => 'd-m-Y [30-04-2021]',
            'd/m/Y' => 'd/m/Y [30/04/2021]',
            'F d, Y' => 'F d, Y [April 30, 2021]'
        ];
    }

    /**
     * @return string[]
     */
    public function timeFormat(): array
    {
        return [
            'h:i:s' => 'h:i:s [09:59:59]',
            'h:i A' => 'h:i A [12:59 AM]'
        ];
    }
}
