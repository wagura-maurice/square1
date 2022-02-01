<?php

use App\Models\AbilityRole;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbilityRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ability_role', function (Blueprint $table) {
            // $table->id();
            $table->primary(['role_id', 'ability_id']);
            $table->foreignId('role_id')->unsigned()->constrained('roles')->onDelete('cascade');
            $table->foreignId('ability_id')->unsigned()->constrained('abilities')->onDelete('cascade');
            $table->integer('_status')->default(AbilityRole::ACTIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ability_role');
    }
}
