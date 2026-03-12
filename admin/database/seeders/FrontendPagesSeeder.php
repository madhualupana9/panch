<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Technology;
use App\Models\Client;
use App\Models\Career;

class FrontendPagesSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        Service::truncate();
        Technology::truncate();
        Client::truncate();

        // Seed Services - Based on Company Profile
        $services = [
            [
                'title' => 'Civil Works',
                'slug' => 'civil-works',
                'description' => 'Comprehensive civil construction including roads, bridges, buildings, and infrastructure development projects',
                'features' => [
                    'Road Construction & Maintenance',
                    'Bridge & Flyover Construction',
                    'Building Construction (Residential, Commercial, Institutional)',
                    'Storm Water Drains & Sewerage Systems',
                    'Compound Walls & Security Buildings',
                    'CC Roads & Pavements'
                ],
                'icon' => 'building',
                'order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Electrical Works',
                'slug' => 'electrical-works',
                'description' => 'High voltage electrical systems up to 765KV, building electrification, power distribution, and UPS systems',
                'features' => [
                    'High Voltage Systems (up to 765KV)',
                    'Building Electrification (Internal & External)',
                    'Power Distribution Systems',
                    'UPS & Backup Power Systems',
                    'Electrical Maintenance (Annual Rate Contracts)',
                    'Transformer & Switchgear Installation',
                    'DG Sets & Silencers',
                    'High Mast Lighting Systems'
                ],
                'icon' => 'bolt',
                'order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'Infrastructure Development',
                'slug' => 'infrastructure-development',
                'description' => 'Transmission & distribution lines, metro rail infrastructure, water pipelines, and storm water drains',
                'features' => [
                    'Transmission & Distribution Lines (up to 765KV)',
                    'Metro Rail Infrastructure',
                    'Airport Terminal Buildings',
                    'Water Pipelines & Supply Systems',
                    'Storm Water Drainage Systems',
                    'Urban Infrastructure Development'
                ],
                'icon' => 'network',
                'order' => 3,
                'is_active' => true
            ],
            [
                'title' => 'Industrial & Institutional Buildings',
                'slug' => 'industrial-institutional-buildings',
                'description' => 'Educational institutions, hospitals, government buildings, and industrial facilities with modern amenities',
                'features' => [
                    'Educational Institutions (Schools, Colleges)',
                    'Hospital Buildings & Healthcare Facilities',
                    'Government Buildings & Offices',
                    'Industrial Buildings & Facilities',
                    'Auditoriums & Community Centers',
                    'Shopping Complexes & Municipal Offices'
                ],
                'icon' => 'home',
                'order' => 4,
                'is_active' => true
            ],
            [
                'title' => 'Industrial Structures',
                'slug' => 'industrial-structures',
                'description' => 'Power plant structures, steel structure erection, cooling towers, pipe racks, and industrial buildings',
                'features' => [
                    'Power Plant Structures',
                    'Steel Structure Erection',
                    'Cooling Towers & Sumps',
                    'Pipe Racks & Grating',
                    'Dumper Maintenance Sheds',
                    'Industrial Workshops & Service Rooms'
                ],
                'icon' => 'industry',
                'order' => 5,
                'is_active' => true
            ],
            [
                'title' => 'Power Projects',
                'slug' => 'power-projects',
                'description' => 'Power generation projects, electrical infrastructure, and power plant civil/mechanical/electrical works',
                'features' => [
                    'Power Plant Construction (Civil/Mechanical/Electrical)',
                    'Electrical Infrastructure for Power Projects',
                    'Substation Construction',
                    'AVR (Automatic Voltage Regulator) Systems',
                    'Power Distribution Networks',
                    'Gate Complexes for Power Plants'
                ],
                'icon' => 'plug',
                'order' => 6,
                'is_active' => true
            ],
            [
                'title' => 'Project Management Consultancy',
                'slug' => 'project-management-consultancy',
                'description' => 'End-to-end project management, design & engineering, quality assurance, and safety management services',
                'features' => [
                    'Project Planning & Execution',
                    'Design & Engineering Services',
                    'Quality Assurance & Control',
                    'Safety Management',
                    'Contract Management',
                    'Cost Management & Budgeting'
                ],
                'icon' => 'tasks',
                'order' => 7,
                'is_active' => true
            ],
            [
                'title' => 'Earth Works & Mining',
                'slug' => 'earth-works-mining',
                'description' => 'Excavation, earth moving, mining infrastructure, and related construction activities',
                'features' => [
                    'Excavation & Earth Moving',
                    'Mining Infrastructure Development',
                    'Site Enabling Works',
                    'Land Development & Grading',
                    'Fly Ash Brick Manufacturing',
                    'Material Handling & Transportation'
                ],
                'icon' => 'mountain',
                'order' => 8,
                'is_active' => true
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Seed Technologies
        $technologies = [
            [
                'title' => 'Safety First Culture',
                'slug' => 'safety-first-culture',
                'category' => 'HSE',
                'description' => 'Comprehensive safety protocols and training programs',
                'features' => [
                    'Regular safety training and awareness programs',
                    'Personal Protective Equipment (PPE) compliance',
                    'Emergency response procedures',
                    'Incident reporting and investigation'
                ],
                'icon' => 'shield-alt',
                'order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Environmental Protection',
                'slug' => 'environmental-protection',
                'category' => 'HSE',
                'description' => 'Sustainable practices for environmental conservation',
                'features' => [
                    'Waste management and recycling',
                    'Pollution control measures',
                    'Energy conservation initiatives',
                    'Environmental impact assessments'
                ],
                'icon' => 'leaf',
                'order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'Quality Standards',
                'slug' => 'quality-standards',
                'category' => 'QA/QC',
                'description' => 'Adherence to international quality standards',
                'features' => [
                    'ISO 9001:2015 certified processes',
                    'Regular quality audits and inspections',
                    'Material testing and certification',
                    'Continuous improvement programs'
                ],
                'icon' => 'check-circle',
                'order' => 3,
                'is_active' => true
            ],
            [
                'title' => 'Advanced Technology',
                'slug' => 'advanced-technology',
                'category' => 'Technology',
                'description' => 'Cutting-edge construction technology and equipment',
                'features' => [
                    'BIM (Building Information Modeling)',
                    'GPS-guided machinery',
                    'Automated quality control systems',
                    'Digital project management tools'
                ],
                'icon' => 'microchip',
                'order' => 4,
                'is_active' => true
            ]
        ];

        foreach ($technologies as $technology) {
            Technology::create($technology);
        }

        // Seed Clients - Based on Company Profile
        $clients = [
            [
                'name' => 'HPCL',
                'full_name' => 'Hindustan Petroleum Corporation Limited, Green R&D Centre Bangalore',
                'sector' => 'Oil & Gas',
                'projects_count' => '15+',
                'project_value' => '₹50+ Cr',
                'description' => 'Leading oil refining and marketing company in India with Green R&D Centre',
                'color' => 'from-blue-500 to-cyan-500',
                'order' => 1,
                'is_active' => true
            ],
            [
                'name' => 'TSEWIDC',
                'full_name' => 'Telangana State Education & Welfare Infrastructure Development Corporation',
                'sector' => 'Government - Education',
                'projects_count' => '10+',
                'project_value' => '₹30+ Cr',
                'description' => 'State government corporation for educational infrastructure development',
                'color' => 'from-green-500 to-emerald-500',
                'order' => 2,
                'is_active' => true
            ],
            [
                'name' => 'SCCL',
                'full_name' => 'The Singareni Collieries Company Limited',
                'sector' => 'Mining',
                'projects_count' => '5+',
                'project_value' => '₹15+ Cr',
                'description' => 'Major coal mining company in Telangana',
                'color' => 'from-orange-500 to-red-500',
                'order' => 3,
                'is_active' => true
            ],
            [
                'name' => 'TSMSIDC',
                'full_name' => 'Telangana State Medical Services & Infrastructure Development Corporation',
                'sector' => 'Government - Healthcare',
                'projects_count' => '3+',
                'project_value' => '₹32+ Cr',
                'description' => 'State government corporation for medical infrastructure development',
                'color' => 'from-indigo-500 to-purple-500',
                'order' => 4,
                'is_active' => true
            ],
            [
                'name' => 'NTPC',
                'full_name' => 'NTPC Limited',
                'sector' => 'Power Generation',
                'projects_count' => '8+',
                'project_value' => '₹35+ Cr',
                'description' => 'India\'s largest power generation company',
                'color' => 'from-green-500 to-teal-500',
                'order' => 5,
                'is_active' => true
            ],
            [
                'name' => 'NBCC',
                'full_name' => 'NBCC India Limited',
                'sector' => 'Construction',
                'projects_count' => '2+',
                'project_value' => '₹1.62+ Cr',
                'description' => 'Government of India enterprise in construction',
                'color' => 'from-yellow-500 to-orange-500',
                'order' => 6,
                'is_active' => true
            ],
            [
                'name' => 'DSR Builders',
                'full_name' => 'DSR Builders & Developers',
                'sector' => 'Real Estate',
                'projects_count' => '5+',
                'project_value' => '₹20+ Cr',
                'description' => 'Leading real estate developer in Hyderabad',
                'color' => 'from-purple-500 to-pink-500',
                'order' => 7,
                'is_active' => true
            ],
            [
                'name' => 'Aparna Constructions',
                'full_name' => 'Aparna Constructions & Estates Pvt Ltd',
                'sector' => 'Real Estate',
                'projects_count' => '3+',
                'project_value' => '₹18+ Cr',
                'description' => 'Premium real estate developer',
                'color' => 'from-blue-500 to-indigo-500',
                'order' => 8,
                'is_active' => true
            ],
            [
                'name' => 'Vasavi Constructions',
                'full_name' => 'Vasavi Constructions LLP',
                'sector' => 'Real Estate',
                'projects_count' => '2+',
                'project_value' => '₹23+ Cr',
                'description' => 'Trusted name in residential construction',
                'color' => 'from-teal-500 to-cyan-500',
                'order' => 9,
                'is_active' => true
            ],
            [
                'name' => 'Prestige Estates',
                'full_name' => 'Prestige Estates Projects Limited',
                'sector' => 'Real Estate',
                'projects_count' => '3+',
                'project_value' => '₹9+ Cr',
                'description' => 'Leading real estate developer in South India',
                'color' => 'from-rose-500 to-pink-500',
                'order' => 10,
                'is_active' => true
            ],
            [
                'name' => 'ISGEC',
                'full_name' => 'ISGEC Heavy Engineering Limited, Noida',
                'sector' => 'Engineering',
                'projects_count' => '1+',
                'project_value' => '₹2.36+ Cr',
                'description' => 'Heavy engineering and equipment manufacturer',
                'color' => 'from-gray-500 to-slate-500',
                'order' => 11,
                'is_active' => true
            ],
            [
                'name' => 'GVS Projects',
                'full_name' => 'GVS Projects Pvt. Ltd.',
                'sector' => 'Construction',
                'projects_count' => '5+',
                'project_value' => '₹4+ Cr',
                'description' => 'Infrastructure and construction company',
                'color' => 'from-emerald-500 to-green-500',
                'order' => 12,
                'is_active' => true
            ]
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }

        $this->command->info('All frontend pages data seeded successfully!');
    }
}
