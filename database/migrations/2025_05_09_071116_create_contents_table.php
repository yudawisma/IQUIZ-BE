<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id(); // ID otomatis
            $table->string('title'); // Kolom judul konten
            $table->text('description'); // Kolom deskripsi konten
            $table->string('topic'); // Kolom topik konten
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
