<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typestructures', function (Blueprint $table) {
            $table->increments('id', true);
            $table->text('name')->unique();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('name_abr')->nullable();
            $table->text('description')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->string('logo')->nullable();
            $table->string('created_by')->nullable();
            $table->string('edited_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('validated_by')->nullable();
            $table->timestamp('validated_at')->nullable();
            $table->integer('status')->default(1)	;
            $table->integer('order')->nullable()->default(1)	;
            $table->integer('level')->nullable()->default(1)	;
            $table->softDeletes();
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
        Schema::dropIfExists('typestructures');
    }
};
