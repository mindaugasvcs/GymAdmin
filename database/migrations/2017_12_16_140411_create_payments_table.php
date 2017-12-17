<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            // The customer whose balance the payment is being applied to. This is a foreign key reference to the members table.
            $table->unsignedInteger('member_id');
            // The staff member who processed the payment. This is a foreign key reference to the users table.
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('membership_id');
            $table->unsignedDecimal('amount', 6, 2);
            $table->date('active_since');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('membership_id')->references('id')->on('memberships');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
