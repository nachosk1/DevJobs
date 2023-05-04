<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vancants', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('salary_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('company');
            $table->date('last_date');
            $table->text('description');
            $table->string('image');
            $table->integer('public')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cavants', function (Blueprint $table){
            $table->dropForeign('vancants_salary_id_foreign');
            $table->dropForeign('vancants_category_id_foreign');
            $table->dropForeign('vancants_user_id_foreign');
        });
        Schema::dropIfExists('vancants');
        
    }
};
