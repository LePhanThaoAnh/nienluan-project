<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // if(!Schema::hasColumn('cart_products','cart_id'))
        // Schema::table('cart_products',function(Blueprint $table){
        //     $table->foreignIdFor(Cart::class,'cart_id')->constrained()->onDelete('cascade');
        // });

        // if(Schema::hasColumn('cart_products','user_id'))
        // Schema::table('cart_products',function(Blueprint $table){
        //     $table->dropColumn('user_id');
        // });

        // if(Schema::hasColumn('cart_products','product_color'))
        // Schema::table('cart_products',function(Blueprint $table){
        //     $table->dropColumn('product_color');
        // });
        Schema::create('cart_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_size');
            $table->string('product_color');
            $table->smallInteger('product_quatity');
            $table->double('product_price');

            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // if(Schema::hasColumn('cart_products','cart_id'))
        // Schema::table('cart_products',function(Blueprint $table){
        //     $table->dropColumn('cart_id');
        // });

        // if(!Schema::hasColumn('cart_products','user_id'))
        // Schema::table('cart_products',function(Blueprint $table){
        //     $table->foreignIdFor(Cart::class);
        // });

        // if(!Schema::hasColumn('cart_products','product_color'))
        // Schema::table('cart_products',function(Blueprint $table){
        //     $table->string('product_color');
        // });
        Schema::dropIfExists('cart_products');
    }
};
