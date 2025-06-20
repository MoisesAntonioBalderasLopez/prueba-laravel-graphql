<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    /*Execute the migration to graph of the categories table / categorias*/
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    /*Deletes existing migrations from chart in this case categories / categorias */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
