<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Career;
use Illuminate\Support\Facades\DB;

class CareersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing careers (disable foreign key checks temporarily)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('careers')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $careers = [
            [
                'title' => 'Senior Civil Engineer',
                'department' => 'Engineering',
                'location' => 'Hyderabad, Telangana',
                'type' => 'Full-time',
                'experience' => '5-8 years',
                'description' => 'Lead civil engineering projects from conception to completion. Manage project teams and ensure quality standards.',
                'requirements' => [
                    'Bachelor\'s degree in Civil Engineering',
                    '5+ years of experience in infrastructure projects',
                    'Strong project management skills',
                    'Knowledge of AutoCAD and project management software',
                    'Excellent communication and leadership abilities'
                ],
                'responsibilities' => [
                    'Design and oversee construction projects',
                    'Manage project timelines and budgets',
                    'Coordinate with clients and stakeholders',
                    'Ensure compliance with safety standards',
                    'Lead and mentor junior engineers'
                ],
                'order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Electrical Systems Engineer',
                'department' => 'Electrical',
                'location' => 'Bangalore, Karnataka',
                'type' => 'Full-time',
                'experience' => '3-6 years',
                'description' => 'Design and implement electrical systems for industrial and infrastructure projects.',
                'requirements' => [
                    'Bachelor\'s degree in Electrical Engineering',
                    '3+ years of experience in electrical systems',
                    'Knowledge of high voltage systems',
                    'Familiarity with electrical design software',
                    'Understanding of electrical codes and standards'
                ],
                'responsibilities' => [
                    'Design electrical systems and circuits',
                    'Conduct system testing and commissioning',
                    'Prepare technical documentation',
                    'Collaborate with multidisciplinary teams',
                    'Troubleshoot electrical issues'
                ],
                'order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'Project Manager',
                'department' => 'Management',
                'location' => 'Hyderabad, Telangana',
                'type' => 'Full-time',
                'experience' => '7-10 years',
                'description' => 'Oversee multiple construction projects and ensure successful delivery within scope, time, and budget.',
                'requirements' => [
                    'Bachelor\'s degree in Engineering or Management',
                    '7+ years of project management experience',
                    'PMP certification preferred',
                    'Strong leadership and communication skills',
                    'Experience with construction management software'
                ],
                'responsibilities' => [
                    'Plan and execute project strategies',
                    'Manage project resources and budgets',
                    'Monitor project progress and quality',
                    'Lead cross-functional project teams',
                    'Communicate with stakeholders and clients'
                ],
                'order' => 3,
                'is_active' => true
            ],
            [
                'title' => 'Safety Officer',
                'department' => 'HSE',
                'location' => 'Multiple Locations',
                'type' => 'Full-time',
                'experience' => '2-5 years',
                'description' => 'Ensure workplace safety and compliance with HSE standards across all project sites.',
                'requirements' => [
                    'Diploma/Degree in Safety Engineering',
                    '2+ years of experience in construction safety',
                    'NEBOSH certification preferred',
                    'Knowledge of safety regulations and standards',
                    'Strong observation and reporting skills'
                ],
                'responsibilities' => [
                    'Conduct safety inspections and audits',
                    'Develop and implement safety procedures',
                    'Provide safety training to workers',
                    'Investigate incidents and prepare reports',
                    'Ensure compliance with HSE regulations'
                ],
                'order' => 4,
                'is_active' => true
            ],
            [
                'title' => 'Structural Engineer',
                'department' => 'Engineering',
                'location' => 'Mumbai, Maharashtra',
                'type' => 'Full-time',
                'experience' => '4-7 years',
                'description' => 'Design and analyze structural systems for buildings and infrastructure projects.',
                'requirements' => [
                    'Bachelor\'s/Master\'s degree in Structural Engineering',
                    '4+ years of experience in structural design',
                    'Proficiency in STAAD Pro, ETABS, or similar software',
                    'Knowledge of IS codes and design standards',
                    'Strong analytical and problem-solving skills'
                ],
                'responsibilities' => [
                    'Perform structural analysis and design',
                    'Prepare detailed structural drawings',
                    'Review and approve construction drawings',
                    'Conduct site inspections',
                    'Coordinate with architects and contractors'
                ],
                'order' => 5,
                'is_active' => true
            ],
            [
                'title' => 'Quality Control Engineer',
                'department' => 'Quality Assurance',
                'location' => 'Pune, Maharashtra',
                'type' => 'Full-time',
                'experience' => '3-5 years',
                'description' => 'Monitor and ensure quality standards in construction projects through inspections and testing.',
                'requirements' => [
                    'Bachelor\'s degree in Civil Engineering',
                    '3+ years of experience in quality control',
                    'Knowledge of quality testing procedures',
                    'Familiarity with ISO standards',
                    'Attention to detail and documentation skills'
                ],
                'responsibilities' => [
                    'Conduct quality inspections and tests',
                    'Prepare quality control reports',
                    'Ensure compliance with specifications',
                    'Identify and resolve quality issues',
                    'Maintain quality documentation'
                ],
                'order' => 6,
                'is_active' => true
            ],
            [
                'title' => 'Site Supervisor',
                'department' => 'Operations',
                'location' => 'Chennai, Tamil Nadu',
                'type' => 'Full-time',
                'experience' => '5-8 years',
                'description' => 'Supervise daily construction activities and coordinate with contractors and workers on site.',
                'requirements' => [
                    'Diploma/Degree in Civil Engineering',
                    '5+ years of site supervision experience',
                    'Strong leadership and coordination skills',
                    'Knowledge of construction methods and materials',
                    'Ability to read and interpret drawings'
                ],
                'responsibilities' => [
                    'Supervise construction activities on site',
                    'Coordinate with contractors and subcontractors',
                    'Monitor work progress and quality',
                    'Ensure safety compliance on site',
                    'Prepare daily progress reports'
                ],
                'order' => 7,
                'is_active' => true
            ],
            [
                'title' => 'Quantity Surveyor',
                'department' => 'Estimation',
                'location' => 'Hyderabad, Telangana',
                'type' => 'Full-time',
                'experience' => '3-6 years',
                'description' => 'Prepare cost estimates, manage budgets, and handle contract administration for projects.',
                'requirements' => [
                    'Bachelor\'s degree in Civil Engineering or Quantity Surveying',
                    '3+ years of experience in quantity surveying',
                    'Proficiency in estimation software',
                    'Knowledge of contract management',
                    'Strong numerical and analytical skills'
                ],
                'responsibilities' => [
                    'Prepare detailed cost estimates',
                    'Measure and quantify work done',
                    'Prepare bills of quantities',
                    'Manage project budgets',
                    'Handle contract variations and claims'
                ],
                'order' => 8,
                'is_active' => true
            ]
        ];

        foreach ($careers as $career) {
            Career::create($career);
        }

        $this->command->info('✅ Created ' . count($careers) . ' career openings successfully!');
    }
}

