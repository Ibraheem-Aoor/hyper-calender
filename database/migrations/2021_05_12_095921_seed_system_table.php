<?php

use App\Models\SystemSetting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('system_settings', function (Blueprint $table) {
            $data = [
                'logo' => 'logo.png',
                'favicon' => 'favicon.ico',
                'title' => 'Hyper Calendear',
                'date_format' => 'Y-m-d',
                'time_format' => 'h:i:s',
                'language' => 'en',
            ];

            SystemSetting::query()->create($data);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('system_settings', function (Blueprint $table) {
            //
        });
    }
}
