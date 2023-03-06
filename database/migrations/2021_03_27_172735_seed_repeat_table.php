<?php

use App\Models\Repeat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedRepeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repeats', function (Blueprint $table) {
            $data = [
                [
                    'name' => 'Daily',
                    'interval' => 1,
                    'is_active' => 1
                ],
                [
                    'name' => 'Weekly',
                    'interval' => 7,
                    'is_active' => 1
                ],
                [
                    'name' => 'Monthly',
                    'interval' => 30,
                    'is_active' => 1
                ],
                [
                    'name' => 'Annually',
                    'interval' => 365,
                    'is_active' => 1
                ],
                [
                    'name' => 'Every weekday (Monday to Friday)',
                    'interval' => 5,
                    'is_active' => 1
                ]
            ];

            foreach($data as $d){
                Repeat::query()->create($d);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repeats', function (Blueprint $table) {
            //
        });
    }
}
