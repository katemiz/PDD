<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\Meeting;
use App\Models\Moc;
use App\Models\Poc;
use App\Models\Project;
use App\Models\Requirement;
use App\Models\Witness;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Project::class);
            $table->foreignIdFor(Requirement::class);
            $table->foreignIdFor(Meeting::class);
            $table->foreignIdFor(Moc::class);
            $table->foreignIdFor(Poc::class);
            $table->foreignIdFor(Witness::class);
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};
