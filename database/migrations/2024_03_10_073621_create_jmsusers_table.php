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
        Schema::create('jmsusers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->nullable(); // Use nullable() instead of default('null')
            $table->text('address')->nullable(); // Use nullable() instead of default('null')
            $table->integer('roles')->comment('1: Author, 2: Editor, 3: Associate Editor, 4: Reviewer, 5: Publisher');
            $table->integer('status')->default('1')->comment('1: Active, 2: Inactive');
            $table->string('password');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jmsusers');
    }
};
