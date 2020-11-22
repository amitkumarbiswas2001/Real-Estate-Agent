<?php

return [
    'userManagement'     => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'         => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'               => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'               => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'name'                         => 'Name',
            'name_helper'                  => ' ',
            'email'                        => 'Email',
            'email_helper'                 => ' ',
            'email_verified_at'            => 'Email verified at',
            'email_verified_at_helper'     => ' ',
            'password'                     => 'Password',
            'password_helper'              => ' ',
            'roles'                        => 'Roles',
            'roles_helper'                 => ' ',
            'remember_token'               => 'Remember Token',
            'remember_token_helper'        => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'two_factor'                   => 'Two-Factor Auth',
            'two_factor_helper'            => ' ',
            'two_factor_code'              => 'Two-factor code',
            'two_factor_code_helper'       => ' ',
            'two_factor_expires_at'        => 'Two-factor expires at',
            'two_factor_expires_at_helper' => ' ',
            'gender'                       => 'Gender',
            'gender_helper'                => ' ',
            'date_of_birth'                => 'Date of Birth',
            'date_of_birth_helper'         => ' ',
            'phone'                        => 'Phone',
            'phone_helper'                 => ' ',
            'verified'                     => 'Verified',
            'verified_helper'              => ' ',
            'photo'                        => 'Photo',
            'photo_helper'                 => ' ',
        ],
    ],
    'userAlert'          => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'auditLog'           => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'propertyManagement' => [
        'title'          => 'Property Management',
        'title_singular' => 'Property Management',
    ],
    'location'           => [
        'title'          => 'Locations',
        'title_singular' => 'Location',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'slug'               => 'Slug',
            'slug_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'featured'           => 'Featured',
            'featured_helper'    => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'currency'           => 'Currency',
            'currency_helper'    => ' ',
            'country'            => 'Country',
            'country_helper'     => ' ',
        ],
    ],
    'property'           => [
        'title'          => 'Properties / Venues',
        'title_singular' => 'Properties / Venue',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'photo'                     => 'Photo',
            'photo_helper'              => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'slug'                      => 'Slug',
            'slug_helper'               => ' ',
            'price'                     => 'Price',
            'price_helper'              => ' ',
            'tax'                       => 'Tax',
            'tax_helper'                => ' ',
            'beds'                      => 'Beds',
            'beds_helper'               => ' ',
            'baths'                     => 'Baths',
            'baths_helper'              => ' ',
            'sqft'                      => 'Sqft',
            'sqft_helper'               => 'Square Foot',
            'location'                  => 'Location',
            'location_helper'           => ' ',
            'address'                   => 'Address',
            'address_helper'            => ' ',
            'city'                      => 'City',
            'city_helper'               => ' ',
            'state'                     => 'State',
            'state_helper'              => ' ',
            'pincode'                   => 'Pincode',
            'pincode_helper'            => ' ',
            'featured'                  => 'Featured',
            'featured_helper'           => ' ',
            'notes'                     => 'Notes',
            'notes_helper'              => ' ',
            'other_informations'        => 'Other Informations',
            'other_informations_helper' => ' ',
            'gallery'                   => 'Gallery',
            'gallery_helper'            => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'description'               => 'Description',
            'description_helper'        => ' ',
            'lankmark'                  => 'Lankmark',
            'lankmark_helper'           => ' ',
            'category'                  => 'Category',
            'category_helper'           => ' ',
        ],
    ],
    'siteManagement'     => [
        'title'          => 'Site Management',
        'title_singular' => 'Site Management',
    ],
    'country'            => [
        'title'          => 'Countries',
        'title_singular' => 'Country',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'short_code'        => 'Short Code',
            'short_code_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'currency'           => [
        'title'          => 'Currencies',
        'title_singular' => 'Currency',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'code'              => 'Code',
            'code_helper'       => ' ',
            'country'           => 'Country',
            'country_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'booking'            => [
        'title'          => 'Bookings',
        'title_singular' => 'Booking',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'customer'                 => 'Customer',
            'customer_helper'          => ' ',
            'property'                 => 'Property',
            'property_helper'          => ' ',
            'amount'                   => 'Amount',
            'amount_helper'            => ' ',
            'type'                     => 'Type',
            'type_helper'              => ' ',
            'paid_amount'              => 'Paid Amount',
            'paid_amount_helper'       => ' ',
            'payable_amount'           => 'Payable Amount',
            'payable_amount_helper'    => ' ',
            'booking_until'            => 'Booking Until',
            'booking_until_helper'     => ' ',
            'booking_status'           => 'Booking Status',
            'booking_status_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'booking_form'             => 'Booking Form',
            'booking_form_helper'      => ' ',
            'document_number'          => 'Document Number (For Verification)',
            'document_number_helper'   => ' ',
            'document'                 => 'Document (For Verification)',
            'document_helper'          => ' ',
            'document_verified'        => 'Document Verified',
            'document_verified_helper' => ' ',
        ],
    ],
    'salesManagement'    => [
        'title'          => 'Sales Management',
        'title_singular' => 'Sales Management',
    ],
    'transaction'        => [
        'title'          => 'Transactions',
        'title_singular' => 'Transaction',
        'fields'         => [
            'id'                              => 'ID',
            'id_helper'                       => ' ',
            'booking'                         => 'Booking',
            'booking_helper'                  => ' ',
            'amount'                          => 'Amount',
            'amount_helper'                   => ' ',
            'payment_status'                  => 'Payment Status',
            'payment_status_helper'           => ' ',
            'payment_method'                  => 'Payment Method',
            'payment_method_helper'           => ' ',
            'payment_type'                    => 'Payment Type',
            'payment_type_helper'             => ' ',
            'payment_reference_number'        => 'Payment Reference Number',
            'payment_reference_number_helper' => ' ',
            'refund_reference_number'         => 'Refund Reference Number',
            'refund_reference_number_helper'  => ' ',
            'notes'                           => 'Notes',
            'notes_helper'                    => ' ',
            'created_at'                      => 'Created at',
            'created_at_helper'               => ' ',
            'updated_at'                      => 'Updated at',
            'updated_at_helper'               => ' ',
            'deleted_at'                      => 'Deleted at',
            'deleted_at_helper'               => ' ',
        ],
    ],
    'propertyComment'    => [
        'title'          => 'Comments',
        'title_singular' => 'Comment',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'rate'              => 'Rate',
            'rate_helper'       => ' ',
            'comment'           => 'Comment',
            'comment_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'faqManagement'      => [
        'title'          => 'FAQ Management',
        'title_singular' => 'FAQ Management',
    ],
    'faqCategory'        => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'category'           => 'Category',
            'category_helper'    => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
            'slug'               => 'Slug',
            'slug_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'featured'           => 'Featured',
            'featured_helper'    => ' ',
        ],
    ],
    'faqQuestion'        => [
        'title'          => 'Questions',
        'title_singular' => 'Question',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'question'          => 'Question',
            'question_helper'   => ' ',
            'answer'            => 'Answer',
            'answer_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'featured'          => 'Featured',
            'featured_helper'   => ' ',
        ],
    ],
    'propertyCategory'   => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'category'           => 'Category',
            'category_helper'    => ' ',
            'slug'               => 'Slug',
            'slug_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
            'featured'           => 'Featured',
            'featured_helper'    => ' ',
        ],
    ],
];