<?php

class PastesTableSeeder extends Seeder {

  public function run() {
    $faker = Faker\Factory::create();

    foreach (User::all() as $user) {
      for ($i=0; $i<10; $i++) {
        Paste::create(array(
          'name' => $faker->sentence(),
          'paste' => $faker->paragraph($nbSentences=$i),
          'public' => $i % 2,
          'user_id' => $user->id,
        ));
      }
    }
  }
}
