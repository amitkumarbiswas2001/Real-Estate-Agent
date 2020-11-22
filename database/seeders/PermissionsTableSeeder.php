<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 22,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 23,
                'title' => 'property_management_access',
            ],
            [
                'id'    => 24,
                'title' => 'location_create',
            ],
            [
                'id'    => 25,
                'title' => 'location_edit',
            ],
            [
                'id'    => 26,
                'title' => 'location_show',
            ],
            [
                'id'    => 27,
                'title' => 'location_delete',
            ],
            [
                'id'    => 28,
                'title' => 'location_access',
            ],
            [
                'id'    => 29,
                'title' => 'property_create',
            ],
            [
                'id'    => 30,
                'title' => 'property_edit',
            ],
            [
                'id'    => 31,
                'title' => 'property_show',
            ],
            [
                'id'    => 32,
                'title' => 'property_delete',
            ],
            [
                'id'    => 33,
                'title' => 'property_access',
            ],
            [
                'id'    => 34,
                'title' => 'site_management_access',
            ],
            [
                'id'    => 35,
                'title' => 'country_create',
            ],
            [
                'id'    => 36,
                'title' => 'country_edit',
            ],
            [
                'id'    => 37,
                'title' => 'country_show',
            ],
            [
                'id'    => 38,
                'title' => 'country_delete',
            ],
            [
                'id'    => 39,
                'title' => 'country_access',
            ],
            [
                'id'    => 40,
                'title' => 'currency_create',
            ],
            [
                'id'    => 41,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 42,
                'title' => 'currency_show',
            ],
            [
                'id'    => 43,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 44,
                'title' => 'currency_access',
            ],
            [
                'id'    => 45,
                'title' => 'booking_create',
            ],
            [
                'id'    => 46,
                'title' => 'booking_edit',
            ],
            [
                'id'    => 47,
                'title' => 'booking_show',
            ],
            [
                'id'    => 48,
                'title' => 'booking_delete',
            ],
            [
                'id'    => 49,
                'title' => 'booking_access',
            ],
            [
                'id'    => 50,
                'title' => 'sales_management_access',
            ],
            [
                'id'    => 51,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 52,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 53,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 54,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 55,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 56,
                'title' => 'property_comment_create',
            ],
            [
                'id'    => 57,
                'title' => 'property_comment_edit',
            ],
            [
                'id'    => 58,
                'title' => 'property_comment_show',
            ],
            [
                'id'    => 59,
                'title' => 'property_comment_delete',
            ],
            [
                'id'    => 60,
                'title' => 'property_comment_access',
            ],
            [
                'id'    => 61,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 62,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 63,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 64,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 65,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 66,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 67,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 68,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 69,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 70,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 71,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 72,
                'title' => 'property_category_create',
            ],
            [
                'id'    => 73,
                'title' => 'property_category_edit',
            ],
            [
                'id'    => 74,
                'title' => 'property_category_show',
            ],
            [
                'id'    => 75,
                'title' => 'property_category_delete',
            ],
            [
                'id'    => 76,
                'title' => 'property_category_access',
            ],
            [
                'id'    => 77,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
