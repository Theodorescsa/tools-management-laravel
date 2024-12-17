<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToToolsTable extends Migration
{
    public function up()
    {
        Schema::table('tools', function (Blueprint $table) {
            // Thêm cột mới
            $table->string('project_name');
            $table->string('url');
            $table->text('params');
            
        });
    }

    public function down()
    {
        Schema::table('tools', function (Blueprint $table) {
            // Xóa các cột nếu rollback migration
            $table->dropColumn(['project_name', 'url', 'params']);
        });
    }
}
