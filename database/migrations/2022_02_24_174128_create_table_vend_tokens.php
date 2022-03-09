<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVendTokens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vend_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->text('access_token');
            $table->string('token_type')->nullable();
            $table->string('expires');
            $table->string('expires_in')->nullable();
            $table->string('refresh_token')->nullable();
            $table->string('domain_prefix');
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
        Schema::dropIfExists('vend_tokens');
    }
}
