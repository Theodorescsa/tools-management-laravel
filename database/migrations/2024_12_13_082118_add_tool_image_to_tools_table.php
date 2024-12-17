<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToolImageToToolsTable extends Migration
{
    public function up()
    {
        Schema::table('tools', function (Blueprint $table) {
            // Thêm cột tool_image để lưu tên hình ảnh
            $table->string('tool_image')->nullable();  // Cho phép là null trong trường hợp không có hình ảnh
        });
    }

    public function down()
    {
        Schema::table('tools', function (Blueprint $table) {
            // Xóa cột tool_image khi rollback migration
            $table->dropColumn('tool_image');
        });
    }
}
