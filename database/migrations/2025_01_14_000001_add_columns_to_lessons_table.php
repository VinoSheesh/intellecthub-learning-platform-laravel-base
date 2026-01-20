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
        Schema::table('lessons', function (Blueprint $table) {
            // Add columns if they don't exist
            if (!Schema::hasColumn('lessons', 'content_type')) {
                $table->string('content_type')->default('video')->after('content');
            }
            if (!Schema::hasColumn('lessons', 'description')) {
                $table->longText('description')->nullable()->after('content_type');
            }
            if (!Schema::hasColumn('lessons', 'duration')) {
                $table->integer('duration')->default(5)->after('description');
            }
            if (!Schema::hasColumn('lessons', 'section_name')) {
                $table->string('section_name')->nullable()->after('duration');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn(['content_type', 'description', 'duration', 'section_name']);
        });
    }
};
