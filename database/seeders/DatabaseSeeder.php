<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Page;
use App\Models\User;
use App\Models\Nurse;
use App\Models\Category;
use App\Models\Firm;
use App\Models\Provider;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\NotificationSetting;
use App\Models\Worker;

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
            'name'          => 'Test Worker',
            'username'      => 'worker',
            'password'      => bcrypt('123456'),
            'email'         => 'shahzadwaris81@gmail.com',
            'status'        => 'active',
            'type'          => '1',
            'stripeAccount' => 'acct_1JkeDy2cuEnjZMsD',
        ]);
        Worker::create([
            'user_id'         => '2',
        ]);
        Firm::create([
            'user_id'         => '3',
        ]);
        User::create([
            'name'          => 'Test Firm',
            'username'      => 'firm',
            'password'      => bcrypt('123456'),
            'email'         => 'firm@admin.com',
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
        $categories = 'Personal Injury,Criminal,Estate,Family,Contracts,Litigation,Tax,Admiralty,Maritime,Banking or Finance,Civil Rights,Constitutional,Corporate,Employment or Labor,Real Estate,Immigration,Patent,Intellectual Property,Bankruptcy or Debt Collection,Health
        ';
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
