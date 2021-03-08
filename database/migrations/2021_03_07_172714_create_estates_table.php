<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->enum('location', ['commercial', 'residential']);
            $table->foreignId('user_id');
            $table->string('slug')->unique();
            $table->string('address1');            
            $table->string('address2');
            $table->string('city');
            $table->string('country')->default('zimbabwe');
            $table->text('description');
            $table->double('price', 10, 2);
            $table->integer('area');
            $table->boolean('approved')->default(false);
            $table->boolean('sold')->default(false);
            $table->enum('visibility', ['private','unlisted','public'])->default('private');
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
        Schema::dropIfExists('estates');
    }
}
