<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActiveTableAchievementDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('achievement_details', function (Blueprint $table) {
          $table->boolean('active')->nullable()->default(1)->after('secret');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('achievement_details', function (Blueprint $table) {
          $table->dropColumn('active');
      });
    }
}
