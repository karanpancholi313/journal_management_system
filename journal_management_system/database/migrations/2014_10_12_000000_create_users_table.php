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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->nullable(); // Use nullable() instead of default('null')
            $table->text('address')->nullable(); // Use nullable() instead of default('null')
            $table->integer('roles')->comment('1: Super Admin, 2: Admin, 3: Author, 4: Editor, 5: Associate Editor, 6: Reviewer, 7: Publisher');
            $table->integer('status')->default('1')->comment('1: Active, 2: Inactive');
            $table->string('password');
            $table->string('image')->nullable(); // Use nullable() instead of default('null')
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
