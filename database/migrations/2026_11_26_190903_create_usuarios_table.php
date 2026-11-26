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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("rol_id");
            $table->string("name",225);
            $table->string("email",225)->unique();
            $table->string("email_verified_at",225);
            $table->string("password",225);
            $table->string("remember_token",225);
            $table->timestamp("created_at");
            $table->timestamp("updated_at");

            $table->timestamp();
            $table->softDeletes();

            $table->foreign("rol_id")->references("id")->on("roles")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("usuarios");
}

};