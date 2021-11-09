<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Page;
use App\Models\User;
use App\Models\Nurse;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\NotificationSetting;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'         => 'Admin',
            'username'     => 'admin',
            'password'     => bcrypt('123456'),
            'email'        => 'admin@admin.com',
            'status'       => 'active',
            'type'         => '3',
        ]);
        User::create([
            'name'          => 'Test Nurse',
            'username'      => 'nurse',
            'password'      => bcrypt('123456'),
            'email'         => 'shahzadwaris81@gmail.com',
            'status'        => 'active',
            'type'          => '1',
            'stripeAccount' => 'acct_1JkeDy2cuEnjZMsD',
        ]);
        Nurse::create([
            'user_id'         => '2',
        ]);
        Provider::create([
            'user_id'         => '3',
        ]);
        User::create([
            'name'          => 'Test Provider',
            'username'      => 'provider',
            'password'      => bcrypt('123456'),
            'email'         => 'provider@admin.com',
            'status'        => 'active',
            'type'          => '2',
            'stripeAccount' => 'cus_KPknv7L7EAfsWR',
        ]);
        for ($i=0; $i < 5; $i++) {
            Page::create([
                'contents' => null,
            ]);
        }
        NotificationSetting::create([
            'user_id'   => 1,
            'email'     => 1,
            'marketing' => 1,
        ]);
        NotificationSetting::create([
            'user_id'   => 2,
            'email'     => 1,
            'marketing' => 1,
        ]);
        $categories = ' Physician, Registered Nurse, Nurse Practitioner, Physician Assistant,Phlebotomist,Therapists,Technicians';
        $categories = explode(',', $categories);
        foreach ($categories as $category) {
            Category::create([
                'title' => $category,
                'slug'  => Str::slug($category),
            ]);
        }
        Job::factory(10)->create();
    }
}
