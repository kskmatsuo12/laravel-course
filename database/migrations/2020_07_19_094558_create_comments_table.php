
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateCommentsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("comments", function (Blueprint $table) {

						$table->increments('id');
						$table->integer('user_id')->nullable();
						$table->integer('post_id')->nullable();
						$table->integer('content')->nullable();
						$table->timestamps();
						$table->softDeletes();

                });
            }

            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists("comments");
            }
        }
    