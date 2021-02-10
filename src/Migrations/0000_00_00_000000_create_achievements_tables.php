<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAchievementsTables
 */
class CreateAchievementsTables extends Migration
{
    public $achievementDetailsTableName;
    public $achievementProgressTableName;

    /**
     * CreateAchievementsTables constructor.
     */
    public function __construct()
    {
        $this->achievementDetailsTableName = 'achievement_details';
        $this->achievementProgressTableName = 'achievement_progress';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            $this->achievementDetailsTableName,
            static function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('image')->nullable();
                $table->integer('civipoints')->nullable();
                $table->string('description');
                $table->date('date_start')->nullable();
                $table->date('date_end')->nullable();
                $table->unsignedInteger('points')->default(1);
                $table->boolean('secret')->default(false);
                $table->string('class_name');
                $table->timestamps();
            }
        );
        Schema::create(
            $this->achievementProgressTableName,
            function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->unsignedInteger('achievement_id');
                $table->unsignedInteger('curso_id');
                $table->morphs('achiever');
                $table->integer('civipoints')->nullable();
                $table->unsignedInteger('points')->default(0);
                $table->timestamp('unlocked_at')->nullable()->default(null);
                $table->timestamps();

                $table->foreign('achievement_id')->references('id')->on($this->achievementDetailsTableName);
                $table->foreign('curso_id')->references('id')->on('sb_colegios_cursos');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists($this->achievementProgressTableName);
        Schema::dropIfExists($this->achievementDetailsTableName);
    }
}
