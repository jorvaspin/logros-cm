<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCursoIdAchiementDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasColumn('achievement_details', 'curso_id')) {
        Schema::table('achievement_details', function($table) {
            $table->dropColumn('curso_id');
        });
      }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('achievement_details', function($table) {
         $table->integer('curso_id');
      });
    }
}
