<?php

use Illuminate\Database\Seeder;

class PaperbasicTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    factory(App\Models\Paperbasics::class, 100)->create();
  }
}
