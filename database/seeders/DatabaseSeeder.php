<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        'password' => Hash::make('Punchbag386')

//        $table->string('name');
//        $table->string('email')->unique();
//        $table->timestamp('email_verified_at')->nullable();
//        $table->string('password');
//        $table->boolean('active')->default(false);
//        $table->foreignId('permission_id');

        $users = [
            0 => [
                'name' => 'Stuart Todd',
                'email' => 'stuarttodd444@gmail.com',
                'password' => Hash::make('vistech12345'),
                'permission_level' => 1
            ],
            1 => [
                'name' => 'James Garvey',
                'email' => 'james@garveys.co.uk',
                'password' => Hash::make('vistech12345'),
                'permission_level' => 1
            ],
            2 => [
                'name' => 'Test Form Person',
                'email' => 'stuarttodd444+test@gmail.com',
                'password' => Hash::make('vistech12345'),
                'permission_level' => 2
            ],
        ];

        // Forms
        $forms = [
            'Incident Report' => 'incident_report',
            'Alarm Response' => 'alarm_response',
            'KPI' => null,
            'Void Property Inspection' => null,
        ];

        // Types
        $types = [
            'INPUT',
            'TEXTAREA',
            'SELECT',
            'RADIO',
            'CHECKBOX',
            'CHECKBOX_OTHER',
            'DATE',
            'IMAGE'
        ];

        $allFormFields = $this->getFormFields();

        // Emails
        $emails = [
            0 => [
                'name' => 'Stuart Todd',
                'email' => 'stuarttodd444@gmail.com',
            ],
            1 => [
                'name' => 'James Garvey',
                'email' => 'james@garveys.co.uk',
            ]
        ];

        foreach ($allFormFields as $formId => $formFields) {
            foreach ($formFields as $fieldName => $formField) {
                DB::table('fields')->insert(
                    [
                        'name' => $fieldName,
                        'form_id' => $formId,
                        'nice_name' => $formField['nice_name'],
                        'field_type_id' => $formField['field_type_id'],
                        'default' => $formField['default'],
                        'options' => $formField['options'],
                        'active' => 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ],
                );
            }
        }

        foreach ($users as $user) {
            DB::table('users')->insert(
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'permission_level' => $user['permission_level'],
                    'password' => $user['password'],
                    'active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            );
        }

        foreach ($emails as $email) {
            DB::table('emails')->insert(
                [
                    'name' => $email['name'],
                    'email' => $email['email'],
                    'active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            );
        }

        foreach ($forms as $formName => $formView) {
            DB::table('forms')->insert(
                [
                    'name' => $formName,
                    'view' => $formView,
                    'active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            );
        }

        foreach ($types as $type) {
            DB::table('field_types')->insert(
                [
                    'name' => $type,
                    'active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            );
        }


    }

    /**
     * Get form fields
     *
     * @return \array[][]
     */
    private function getFormFields()
    {
        return [
            1 => [
                'site_name' => [
                    'nice_name' => 'Site Name',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'site_sin' => [
                    'nice_name' => 'Site SIN or Location/Address',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'date_of_incident' => [
                    'nice_name' => 'Date of incident',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 7,
                ],
                'type_of_incident' => [
                    'nice_name' => 'Type of incident',
                    'default' => null,
                    'options' => json_encode(
                        [
                            'Suspicious Activity',
                            'Fire',
                            'Theft',
                            'Vandalism',
                            'Fly Tipping',
                            'Damage to Property',
                            'Tress-passing',
                            'Violence',
                            'Damage to site',
                            'Alarm Activation'
                        ]
                    ),
                    'field_type_id' => 6,
                ],
                'details_of_incident' => [
                    'nice_name' => 'Details of incident',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 2,
                ],
                'actions_taken' => [
                    'nice_name' => 'What actions did you take?',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 2,
                ],
                'police_incident_number' => [
                    'nice_name' => 'Police incident number',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'supervisor_mobile_images' => [
                    'nice_name' => 'Did you take images on the supervisor mobile?',
                    'default' => null,
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'officers_surname' => [
                    'nice_name' => 'Officers surname',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'officers_forename' => [
                    'nice_name' => 'Officers forename',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'office_pin' => [
                    'nice_name' => 'Officer PIN or SIA license number',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'details_of_incident_continued' => [
                    'nice_name' => 'Details of incident continued',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 2,
                ],
                'people_informed' => [
                    'nice_name' => 'People informed',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'security_officer_signature' => [
                    'nice_name' => 'Security officer signature',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_name_1' => [
                    'nice_name' => 'Name',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_name_2' => [
                    'nice_name' => 'Name',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_date_1' => [
                    'nice_name' => 'Date',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 7,
                ],
                'witness_date_2' => [
                    'nice_name' => 'Date',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 7,
                ],
                'witness_signature_1' => [
                    'nice_name' => 'Signature',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_signature_2' => [
                    'nice_name' => 'Signature',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_statement_1_surname' => [
                    'nice_name' => 'Surname',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_statement_1_forename' => [
                    'nice_name' => 'Forename',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_statement_1_address' => [
                    'nice_name' => 'Address',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 2,
                ],
                'witness_statement_1_postcode' => [
                    'nice_name' => 'Postcode',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_statement_1_telephone' => [
                    'nice_name' => 'Telephone',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_statement_1_statement' => [
                    'nice_name' => 'Statement',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 2,
                ],
                'witness_statement_1_signature' => [
                    'nice_name' => 'Signature',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_statement_2_surname' => [
                    'nice_name' => 'Surname',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_statement_2_forename' => [
                    'nice_name' => 'Forename',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_statement_2_address' => [
                    'nice_name' => 'Address',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 2,
                ],
                'witness_statement_2_postcode' => [
                    'nice_name' => 'Postcode',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_statement_2_telephone' => [
                    'nice_name' => 'Telephone',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'witness_statement_2_statement' => [
                    'nice_name' => 'Statement',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 2,
                ],
                'witness_statement_2_signature' => [
                    'nice_name' => 'Signature',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
            ],
            2 => [
                'date_of_call_out' => [
                    'nice_name' => 'Date of Call Out',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'site_called_out_to' => [
                    'nice_name' => 'Site Called Out To',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'time_of_call_out' => [
                    'nice_name' => 'Time of Call Out',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'time_on_site' => [
                    'nice_name' => 'Time On-Site',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'time_left_site' => [
                    'nice_name' => 'Time Left Site',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'reason_for_call_out' => [
                    'nice_name' => 'Reason For Call Out',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'called_out_by' => [
                    'nice_name' => 'Called Out By',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'attending_officers_name' => [
                    'nice_name' => 'Attending Officers Name',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'attending_officers_sia_number' => [
                    'nice_name' => 'Attending Officers SIA Number',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'attending_officers_signature' => [
                    'nice_name' => 'Attending Officers Signature',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'key_pouch_seal_no_broken' => [
                    'nice_name' => 'Key Pouch Seal No Broken',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'new_key_pouch_seal_no_fitted' => [
                    'nice_name' => 'New Key Pouch Seal No Fitted',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'what_was_observed' => [
                    'nice_name' => 'What was observed / found when arrived on-site?',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 2,
                ],
                'actions_taken' => [
                    'nice_name' => 'What actions were taken on-site?',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 2,
                ],
                'police' => [
                    'nice_name' => 'Police',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'fire' => [
                    'nice_name' => 'Fire',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'ambulance' => [
                    'nice_name' => 'Ambulance',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'utilities' => [
                    'nice_name' => 'Utilties',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'boarding_up_services' => [
                    'nice_name' => 'Boarding Up Services',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'emergency_services_log_number' => [
                    'nice_name' => 'Emergency Services Log Number',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'police_crime_number' => [
                    'nice_name' => 'Police crime number',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'utility_service_called_out_number' => [
                    'nice_name' => 'Utility service called out number',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'utility_service_log_number' => [
                    'nice_name' => 'Utility service log number',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'boarding_service_called' => [
                    'nice_name' => 'Boarding service called',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'boarding_service_log_number' => [
                    'nice_name' => 'Boarding service log number',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'number_of_person_on_site' => [
                    'nice_name' => 'Number of person on site',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'company_working_for' => [
                    'nice_name' => 'Company working for',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'contact_details' => [
                    'nice_name' => 'Contact details',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
            ],
            3 => [
                'security_officer' => [
                    'nice_name' => 'Security Officer',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'supervisor' => [
                    'nice_name' => 'Supervisor',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'customer' => [
                    'nice_name' => 'Customer',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'date' => [
                    'nice_name' => 'Date',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 7,
                ],
                'time' => [
                    'nice_name' => 'Time',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'sin' => [
                    'nice_name' => 'Sin?',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'site' => [
                    'nice_name' => 'Site',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'tdr_completed_fpr_specific_site' => [
                    'nice_name' => 'TDR Completed for specific site?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'full_uniform' => [
                    'nice_name' => 'Full Uniform? If not please state what is needed and side.',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'vistech_id_badge' => [
                    'nice_name' => 'Vistech ID Badge? If not please take photo',
                    'default' => 'No',
                    'options' => null,
                    'field_type_id' => 4,
                ],
                'sia_badge_on_display' => [
                    'nice_name' => 'SIA Badge on display?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'sia_license_number' => [
                    'nice_name' => 'SIA License Number',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'sia_expiry_date' => [
                    'nice_name' => 'SIA Expiry Date',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 7,
                ],
                'understanding_pf_patrols_windows_padlocks_alarms' => [
                    'nice_name' => 'Understanding of patrols, windows, padlocks and alarms?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'access_to_clean_water' => [
                    'nice_name' => 'Access to clean water?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'access_to_hot_water_soap' => [
                    'nice_name' => 'Access to hot water and soap or hand sanitiser?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'facilities_in_an_acceptable_state' => [
                    'nice_name' => 'Facilities in an acceptable state?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'site_phone_in_good_condition' => [
                    'nice_name' => 'Site phone in good condition?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'known_patrol_routes' => [
                    'nice_name' => 'Known Patrol Routes, if applicable',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'check_point_locations' => [
                    'nice_name' => 'Check point locations, if applicable',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'access_policy' => [
                    'nice_name' => 'Access policy, if applicable',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'check_calls_recorded' => [
                    'nice_name' => 'Check calls recorded??',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'patrols_recorded' => [
                    'nice_name' => 'Patrols recorded?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'who_to_contact_if_concerns' => [
                    'nice_name' => 'Do you know how and who to contact if you have any concerns at work?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'assignment_instructions_on_site' => [
                    'nice_name' => 'Assignment instructions on site?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'risk_assessment_on_site' => [
                    'nice_name' => 'Risk assessment on-site?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'additional_comments' => [
                    'nice_name' => 'Additional Comments?',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 2,
                ],
                'officer_signature' => [
                    'nice_name' => 'Officer Signature',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
            ],
            4 => [
                'site_inspected' => [
                    'nice_name' => 'Site Inspected?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'date_of_inspection' => [
                    'nice_name' => 'Date of Inspection',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 7,
                ],
                'time_on_site' => [
                    'nice_name' => 'Time On Site',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'time_off_site' => [
                    'nice_name' => 'Time Off Site',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'attending_officers_name' => [
                    'nice_name' => 'Attending Officers Name',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'attending_officers_sia_license' => [
                    'nice_name' => 'Attending Officers SIA License',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'general_condition' => [
                    'nice_name' => 'General Condition',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 1,
                ],
                'debris_and_litter' => [
                    'nice_name' => 'Debris and Litter?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'warning_boards_and_signage' => [
                    'nice_name' => 'Warning Boards and Signage?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'leaks' => [
                    'nice_name' => 'Leaks?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'damp' => [
                    'nice_name' => 'Damp?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'mould' => [
                    'nice_name' => 'Mould?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'floor' => [
                    'nice_name' => 'Floor?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'walls' => [
                    'nice_name' => 'Walls?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'ceiling' => [
                    'nice_name' => 'Ceiling?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'building_secure' => [
                    'nice_name' => 'Building Secure?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'fire_doors' => [
                    'nice_name' => 'Fire Doors?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'shutters' => [
                    'nice_name' => 'Shutters?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'main_access_point' => [
                    'nice_name' => 'Main Access Point?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'exterior_walls_window_frames' => [
                    'nice_name' => 'Exterior Walls / Window Frames?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'fences_gates' => [
                    'nice_name' => 'Fences / Gates?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'mailbox' => [
                    'nice_name' => 'Mailbox?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'outside_lights' => [
                    'nice_name' => 'Outside Lights?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'security_system' => [
                    'nice_name' => 'Security System?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'fire_system' => [
                    'nice_name' => 'Fire System?',
                    'default' => 'No',
                    'options' => json_encode(['Yes', 'No']),
                    'field_type_id' => 4,
                ],
                'site_picture_1' => [
                    'nice_name' => 'Please take a picture of the site',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 8,
                ],
                'site_picture_2' => [
                    'nice_name' => 'Please take a picture of the site',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 8,
                ],
                'site_picture_3' => [
                    'nice_name' => 'Please take a picture of the site',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 8,
                ],
                'site_picture_4' => [
                    'nice_name' => 'Please take a picture of the site',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 8,
                ],
                'site_picture_5' => [
                    'nice_name' => 'Please take a picture of the site',
                    'default' => null,
                    'options' => null,
                    'field_type_id' => 8,
                ],

            ]
        ];
    }
}
