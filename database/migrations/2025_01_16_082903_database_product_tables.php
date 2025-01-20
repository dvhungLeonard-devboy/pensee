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
        // Create Categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Tự động thêm cột 'id' (BIGINT, tự tăng)
            $table->string('name', 255); // Tên danh mục (VARCHAR(255))
            $table->string('slug', 255); // Đường dẫn tĩnh (slug)
            $table->text('description')->nullable(); // Mô tả, cho phép NULL
            $table->unsignedBigInteger('parent_id')->nullable(); // Danh mục cha, nullable
            $table->timestamps(); // Tự động thêm 'created_at' và 'updated_at'
    
            // Khóa ngoại (liên kết với chính bảng categories)
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });

        // Create Products table
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // BIGINT, primary key, auto-increment
            $table->string('name', 255); // VARCHAR(255), product name
            $table->string('slug', 255); // VARCHAR(255), product slug
            $table->text('description')->nullable(); // TEXT, product description
            $table->decimal('price', 10, 2); // DECIMAL(10,2), current product price
            $table->decimal('original_price', 10, 2); // DECIMAL(10,2), original price
            $table->decimal('sale_price', 10, 2)->nullable(); // DECIMAL(10,2), sale price
            $table->json('tags')->nullable(); // JSON, product tags
            $table->integer('stock_quantity'); // INT, stock quantity
            $table->enum('status', ['active', 'inactive'])->default('active'); // ENUM, product status
            $table->timestamps(); // created_at and updated_at columns
        });

        // Create Product Variants table
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id(); // BIGINT, primary key, auto-increment
            $table->unsignedBigInteger('product_id'); // BIGINT, foreign key from products
            $table->string('name', 255); // VARCHAR(255), variant name
            $table->string('sku', 255); // VARCHAR(255), SKU code
            $table->decimal('price', 10, 2); // DECIMAL(10,2), variant price
            $table->integer('stock_quantity'); // INT, stock quantity
            $table->timestamps(); // created_at and updated_at columns

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        // Create Product Groups table
        Schema::create('product_groups', function (Blueprint $table) {
            $table->id(); // BIGINT, primary key, auto-increment
            $table->string('name', 255); // VARCHAR(255), group name
            $table->string('slug', 255); // VARCHAR(255), slug
            $table->text('description')->nullable(); // TEXT, group description
            $table->timestamps(); // created_at and updated_at columns
        });

        // Create Product Group Mappings table
        Schema::create('product_group_mappings', function (Blueprint $table) {
            $table->id(); // BIGINT, primary key, auto-increment
            $table->unsignedBigInteger('group_id'); // BIGINT, foreign key from product_groups
            $table->unsignedBigInteger('product_id'); // BIGINT, foreign key from products
            $table->timestamps(); // created_at and updated_at columns
            
            $table->foreign('group_id')->references('id')->on('product_groups')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        // Create Product Categories table
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id(); // BIGINT, primary key, auto-increment
            $table->unsignedBigInteger('product_id'); // BIGINT, foreign key from products
            $table->unsignedBigInteger('category_id'); // BIGINT, foreign key from categories

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        // Create Product Discounts table
        Schema::create('product_discounts', function (Blueprint $table) {
            $table->id(); // BIGINT, primary key, auto-increment
            $table->unsignedBigInteger('product_id'); // BIGINT, foreign key from products
            $table->enum('discount_type', ['percentage', 'fixed_amount']); // ENUM, discount type
            $table->decimal('discount_value', 10, 2); // DECIMAL(10,2), discount value
            $table->timestamp('start_date'); // TIMESTAMP, start date
            $table->timestamp('end_date')->nullable(); // TIMESTAMP, end date
            $table->timestamps(); // created_at and updated_at columns

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_discounts');
        Schema::dropIfExists('product_categories');
        Schema::dropIfExists('product_group_mappings');
        Schema::dropIfExists('product_groups');
        Schema::dropIfExists('product_variants');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};
