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
        // Create Users table
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // BIGINT, primary key, auto-increment
            $table->string('name', 255); // VARCHAR(255), user name
            $table->string('email', 255)->unique(); // VARCHAR(255), unique email
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255); // VARCHAR(255), encrypted password
            $table->enum('role', ['admin', 'customer', 'editor'])->default('customer'); // ENUM, user role
            $table->rememberToken();
            $table->timestamps(); // created_at and updated_at columns
        });

        // Create Customers table
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // BIGINT, primary key, auto-increment
            $table->string('name', 255); // VARCHAR(255), customer name
            $table->string('email', 255); // VARCHAR(255), customer email
            $table->string('phone', 15); // VARCHAR(15), customer phone number
            $table->text('address')->nullable(); // TEXT, customer address
            $table->timestamps(); // created_at and updated_at columns
        });

        // Create Orders table
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // BIGINT, primary key, auto-increment
            $table->unsignedBigInteger('customer_id'); // BIGINT, foreign key from customers
            $table->decimal('total_price', 10, 2); // DECIMAL(10,2), total order price
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending'); // ENUM, order status
            $table->timestamps(); // created_at and updated_at columns

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });

        // Create Order Items table
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // BIGINT, primary key, auto-increment
            $table->unsignedBigInteger('order_id'); // BIGINT, foreign key from orders
            $table->unsignedBigInteger('product_variant_id'); // BIGINT, foreign key from product_variants
            $table->integer('quantity'); // INT, product quantity
            $table->decimal('price', 10, 2); // DECIMAL(10,2), product price in the order

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_variant_id')->references('id')->on('product_variants')->onDelete('cascade');
        });

        // Create Payments table
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // BIGINT, primary key, auto-increment
            $table->unsignedBigInteger('order_id'); // BIGINT, foreign key from orders
            $table->enum('payment_method', ['credit_card', 'paypal', 'bank_transfer']); // ENUM, payment method
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending'); // ENUM, payment status
            $table->decimal('amount', 10, 2); // DECIMAL(10,2), amount paid
            $table->timestamp('created_at')->useCurrent(); // TIMESTAMP, payment time

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['product_variant_id']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });

        Schema::dropIfExists('payments');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('users');
    }
};
