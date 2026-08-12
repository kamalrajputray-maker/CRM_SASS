<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Deal;
use App\Models\Document;
use App\Models\Lead;
use App\Models\Setting;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Company
        |--------------------------------------------------------------------------
        */

        $company = Company::factory()->create();


        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */

        $users = User::factory(5)->create([
            'company_id' => $company->id,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Customers
        |--------------------------------------------------------------------------
        */

        $customers = Customer::factory(20)->create([
            'company_id' => $company->id,
        ]);

        foreach ($customers as $customer) {

            $customer->update([
                'assigned_to' => $users->random()->id,
                'created_by' => $users->random()->id,
                'updated_by' => $users->random()->id,
            ]);

            /*
            |--------------------------------------------------------------------------
            | Contacts
            |--------------------------------------------------------------------------
            */

            Contact::factory(fake()->numberBetween(1, 3))->create([
                'customer_id' => $customer->id,
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Leads
        |--------------------------------------------------------------------------
        */

        $leads = Lead::factory(10)->create([
            'company_id' => $company->id,
            'customer_id' => $customers->random()->id,
            'assigned_to' => $users->random()->id,
            'created_by' => $users->random()->id,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Deals
        |--------------------------------------------------------------------------
        */

        $deals = Deal::factory(10)->create([
            'company_id' => $company->id,
            'lead_id' => $leads->random()->id,
            'customer_id' => $customers->random()->id,
            'assigned_to' => $users->random()->id,
            'created_by' => $users->random()->id,
            'updated_by' => $users->random()->id,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Tasks
        |--------------------------------------------------------------------------
        */

        $tasks = Task::factory(20)->create([
            'company_id' => $company->id,
            'deal_id' => $deals->random()->id,
            'customer_id' => $customers->random()->id,
            'assigned_to' => $users->random()->id,
            'created_by' => $users->random()->id,
            'updated_by' => $users->random()->id,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Documents
        |--------------------------------------------------------------------------
        */

        Document::factory(20)->create([
            'company_id' => $company->id,
            'customer_id' => $customers->random()->id,
            'deal_id' => $deals->random()->id,
            'uploaded_by' => $users->random()->id,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Activities
        |--------------------------------------------------------------------------
        */

        foreach ($customers->take(10) as $customer) {

            Activity::factory()
                ->for($customer, 'subject')
                ->create([
                    'company_id' => $company->id,
                    'user_id' => $users->random()->id,
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

        $settings = [
            'timezone' => 'Asia/Kolkata',
            'currency' => 'INR',
            'date_format' => 'Y-m-d',
            'time_format' => 'H:i',
            'lead_auto_assignment' => 'enabled',
            'notification_email' => 'enabled',
        ];

        foreach ($settings as $key => $value) {
            Setting::factory()->create([
                'company_id' => $company->id,
                'key' => $key,
                'value' => json_encode($value),
            ]);
        }
    }
}