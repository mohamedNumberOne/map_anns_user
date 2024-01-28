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
        Schema::create('structures', function (Blueprint $table) {
            $table->increments('id', true);
            $table->text('name')->unique();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->text('description')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable(); 
            $table->bigInteger('wilaya')->nullable();
            $table->bigInteger('commune')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('adresse')->nullable();
            $table->text('adresse_ar')->nullable();
            $table->text('adresse_en')->nullable();
            $table->string('effectif')->nullable();
            $table->string('type_structure')->nullable();
            $table->string('email')->nullable();
            $table->string('siteweb')->nullable();
            $table->string('telfix')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('responsable')->nullable();
            $table->string('logo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('viber')->nullable();
            $table->string('created_by')->nullable();
            $table->string('edited_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('validated_by')->nullable();
            $table->timestamp('validated_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->integer('status')->default(1)	;
            $table->integer('order')->nullable()->default(1)	;
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('structures');
    }
};
