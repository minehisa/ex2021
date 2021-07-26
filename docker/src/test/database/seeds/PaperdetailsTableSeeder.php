<?php

use Illuminate\Database\Seeder;

class PaperdetailsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    factory(App\Models\Paperdetail::class, 100)->create();
  }
}
