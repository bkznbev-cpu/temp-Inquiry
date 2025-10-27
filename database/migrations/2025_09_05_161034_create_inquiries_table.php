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
    Schema::create('inquiries', function (Blueprint $table) {
        $table->id('UserID'); // or better: $table->bigIncrements('UserID') if you want a custom primary key
        $table->integer('seeker_id');
        $table->integer('owner_id');
        $table->text('Message');
        $table->dateTime('DateSent');
        $table->enum('Status', ['Pending', 'Replied']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
