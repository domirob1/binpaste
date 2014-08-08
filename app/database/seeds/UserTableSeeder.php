<?php
 
class UserTableSeeder extends Seeder {
 
  public function run()
  {
    User::create(array(
      'email' => 'foo@bar.com',
      'password' => 'baz',
      'remember_token' => 1,
    ));

    $faker = Faker\Factory::create();
    for ($i = 0; $i<10; $i++) {
      User::create(array(
        'email' => $faker->safeEmail,
        'password' => 'baz',
        'remember_token' => 1,
      ));
    }
  }
 
}
