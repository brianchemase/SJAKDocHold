<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmittionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submittions', function (Blueprint $table) {
            $table->id();
            $table->string('title');  // Title of the document           
            $table->decimal('amount', 10, 2);  // Amount field, assuming 2 decimal places
            $table->string('ref')->unique();  // Reference number (should be unique)
            $table->string('status');  // Title of the document
            $table->text('description');  // Description of the document
            $table->timestamp('upload_time')->nullable();  // Upload time
            $table->string('uploaded_by');  // User who uploaded the document
            $table->string('uploaderid');  // User who uploaded the document id
            $table->string('document_file');  // File name of the uploaded document
            $table->string('department');  // Department field
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
        Schema::dropIfExists('submittions');
    }
}
