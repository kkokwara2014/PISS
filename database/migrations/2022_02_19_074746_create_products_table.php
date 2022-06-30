<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('code')->unique()->nullable();
            $table->text('name');
            $table->text('slug')->nullable();
            $table->string('unitprice')->nullable();
            $table->string('sellingprice')->nullable();
            $table->string('quantity')->nullable();
            $table->string('expirydate');
            $table->string('reorderlevel')->nullable()->default('10');
            $table->tinyInteger('isavailable')->default('1');
            
            $table->bigInteger('category_id')->index()->unsigned()->nullable();
            $table->bigInteger('brand_id')->index()->unsigned()->nullable();
            $table->bigInteger('branch_id')->index()->unsigned()->nullable();
            $table->bigInteger('user_id')->index()->unsigned()->nullable();
            $table->bigInteger('supplier_id')->index()->unsigned()->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
