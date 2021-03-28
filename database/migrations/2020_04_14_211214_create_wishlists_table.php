<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('product_id')->nullable();
                $table->unsignedInteger('user_id')->nullable();
                $table->timestamps();

                $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade');
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wishlists',function (Blueprint $table){
            $table->dropForeign('wishlists_product_id_foreign');
            $table->dropColumn('product_id');
        });
           Schema::table('wishlists',function (Blueprint $table) {
                $table->dropForeign('wishlists_user_id_foreign');
                $table->dropColumn('user_id');
            });
        Schema::dropIfExists('wishlists');
    }
}
