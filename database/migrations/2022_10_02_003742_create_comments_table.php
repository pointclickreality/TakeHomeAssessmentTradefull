<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            //$table->string('uuid', 255)->unique();
            $table->text('body');
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            // foreign keys
            $table->string('comment_id')->nullable();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
