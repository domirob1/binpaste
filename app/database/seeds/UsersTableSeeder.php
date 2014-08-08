<?php
 
class UsersTableSeeder extends Seeder {
 
  public function run()
  {
    $faker = Faker\Factory::create();

    User::create(array(
      'email' => 'foo@bar.com',
      'password' => Hash::make('baz'),
      'remember_token' => 1,
    ));

    for ($i = 0; $i<10; $i++) {
      User::create(array(
        'email' => $faker->safeEmail,
        'password' => Hash::make('baz'),
        'remember_token' => 1,
      ));
    }
  }
 
}
