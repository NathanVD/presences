<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('img_path')->default("/img/molengeek.png");
            $table->string('phone')->unique()->nullable();
            $table->string('adress_road')->nullable();
            $table->string('adress_commune')->nullable();
            $table->integer('domain_id')->nullable();
            $table->string('domain_type')->nullable();
            $table->foreignId('classroom_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->boolean('confirmed')->default(0);
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
        Schema::dropIfExists('users', function (Blueprint $table) {
            $table->dropForeign(['classroom_id']);
            $table->dropColumn(['classroom_id']);
        });
    }
}
