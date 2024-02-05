<?php

// database/migrations/YYYY_MM_DD_HHmmSS_add_user_id_to_orders_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToOrdersTable extends Migration
{
    public function up()
    {
        // Check if the column exists before adding it
        if (!Schema::hasColumn('orders', 'user_id')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->index();
            });
        }
    }

    public function down()
    {
        // Drop the column if it exists
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}



