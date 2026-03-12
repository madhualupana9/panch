<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContentSection;

class HomepageContentSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Hero Section
        ContentSection::updateOrCreate(
            ['section_key' => 'hero'],
            [
                'title' => 'Building Tomorrow\'s Infrastructure',
                'subtitle' => 'Paanchajanya Reality - Your trusted partner in Civil, Electrical, Mechanical, Design, Engineering and Construction excellence.',
                'data' => [
                    'badge_text' => 'Established 2010 • Special Class Contractor',
                    'heading_line1' => 'Building',
                    'heading_line2' => 'Tomorrow\'s',
                    'heading_line3' => 'Infrastructure',
                    'features' => [
                        ['text' => 'Infrastructure Excellence'],
                        ['text' => 'Innovative Solutions'],
                        ['text' => 'Quality Assured'],
                    ],
                    'cta_buttons' => [
                        ['text' => 'Explore Projects', 'link' => '#projects', 'type' => 'primary'],
                        ['text' => 'Contact Us', 'link' => '#contact', 'type' => 'secondary'],
                    ],
                    'floating_cards' => [
                        ['title' => 'Special Class', 'subtitle' => 'Civil Contractor'],
                        ['title' => 'Grade-A', 'subtitle' => 'Electrical License'],
                    ]
                ],
                'is_active' => true,
            ]
        );

        // About Section
        ContentSection::updateOrCreate(
            ['section_key' => 'about'],
            [
                'title' => 'Building Excellence Since 2010',
                'subtitle' => 'Your trusted partner in comprehensive construction solutions',
                'content' => 'Paanchajanya Reality Private Limited is a company established in 2010 as a Civil, Electrical, Mechanical, Design, Engineering and Construction company. The operations of the company commenced from FY2017 and presently involved in diverse construction activities.',
                'data' => [
                    'company_name' => 'Paanchajanya Reality Private Limited',
                    'paragraphs' => [
    'Paanchajanya Reality Private Limited, established in 2010, began with a vision to deliver excellence across Civil, Electrical, Mechanical, Design, Engineering, and Construction services. Although founded in 2010, full-scale operations commenced in FY2017, marking the beginning of a strong and impactful journey in diverse construction activities.',
    
    'From the very first year of operations, the company proudly secured significant work orders from reputed clients. JOSHITHA was founded through the shared vision of its promoters—to contribute to the industry through skilled and experienced engineering professionals committed to quality and innovation.',
    
    'As we continue executing various projects, we consistently develop our infrastructure, expand our skilled team, and enhance our capabilities to take on forthcoming works of any scale. Over time, we have accumulated the resources, expertise, and technical strength required to handle projects of any magnitude with confidence and efficiency.'
],

                    'certifications' => [
                        'Special Class Civil Contractor - Telangana State (COT/TG/SP1815/2025)',
                        'Special Class Civil Contractor - Andhra Pradesh (COT/AP/SP/1085/2025)',
                        'Grade \'A\' Electrical License - Telangana (All Voltages exceeding 132 KV)',
                        'Grade \'A\' Electrical License - Andhra Pradesh (All Voltages exceeding 33 KV)',
                        'GST Registered (Telangana, AP, Karnataka)'
                    ],
                    'highlights' => [
                        ['title' => 'Special Class Contractor', 'description' => 'Telangana & Andhra Pradesh'],
                        ['title' => '150+ Professionals', 'description' => 'Skilled Engineering Team'],
                        ['title' => '₹221+ Crores', 'description' => 'Current Works on Hand'],
                        ['title' => 'Since 2010', 'description' => 'Operations commenced FY2017']
                    ],
                    'directors' => [
                        [
                            'name' => 'Budarapu Manohar',
                            'title' => 'Managing Director',
                            'initials' => 'MB',
                            'image' => '/images/directors/Budarapu Manohar.JPG',
                            'experience' => '40+ Years',
                            'expertise' => 'Civil, Electrical, Infrastructure & Project Management',
                            'short_bio' => 'A visionary leader with over three decades of experience in engineering and project execution across power, infrastructure, and institutional sectors.',
                            'full_bio' => 'Budarapu Manohar, the Director of Paanchajanya Reality Pvt. Ltd., is a seasoned industry leader with over 40 years of rich and diverse experience spanning project implementation, engineering, construction, and business development. A visionary entrepreneur and strategic professional, he is known for his smart management, technical depth, and adaptive leadership in executing complex infrastructure projects across India.

A graduate in B.Tech (Civil Engineering) from Siddhartha Engineering College, Vijayawada (1986), Manohar began his professional journey with leading organizations such as BHEL ISG Group and Progressive Constructions Ltd., where he worked on major industrial and infrastructure developments including the Visakhapatnam Steel Plant.

In 1996, he founded Pulsar Projects Pvt. Ltd., successfully leading various power, real estate, residential, and commercial projects. His entrepreneurial success led him to join the LANCO Group in 2005, where he held key leadership roles, including Director – LANCO Property Management Company Pvt. Ltd. and later Chief Operating Officer – LANCO Infratech Ltd.

During his tenure at LANCO (2005–2018), he was responsible for strategic planning, construction execution, and business development across a wide range of projects — including power plants, metro terminal buildings, high-rise structures, institutional buildings, industrial complexes, transmission lines, water pipelines, and road infrastructure. He also played a pivotal role in domestic and international business expansion initiatives for the company.

Under his leadership, Paanchajanya Reality Pvt. Ltd. has successfully collaborated with numerous prestigious clients and government bodies, including:
• Hindustan Petroleum Corporation (HPCL) – Green R&D Centre, Bangalore
• Telangana State Education & Welfare Infrastructure Development Corporation (TSEWIDC)
• Telangana State Medical Services & Infrastructure Development Corporation (TSMSIDC)
• The Singareni Collieries Company Ltd.
• NTPC Ltd.
• NBCC India Ltd.
• Public Health and Municipal Engineering Department (PHMED)
• Roads & Buildings Department, Telangana
• Prestige Estates Projects Ltd., Aparna Constructions, DSR Builders, and Vasavi Constructions LLP

With a strong foundation in civil, electrical, and infrastructure development, Manohar\'s expertise encompasses industrial and institutional buildings, power projects, project management consultancy, and large-scale earthworks and mining operations.

His forward-looking approach, technical excellence, and commitment to quality continue to guide Paanchajanya Reality Pvt. Ltd. toward sustained growth, innovation, and engineering excellence.'
                        ],
                        [
                            'name' => 'Srinivas Bikkina',
                            'title' => 'Head of Projects – Civil Works',
                            'initials' => 'SB',
                            'image' => '/images/directors/Srinivas Bikkina.JPG',
                            'experience' => '30+ Years',
                            'expertise' => 'Civil Construction & Project Execution',
                            'short_bio' => 'With over three decades in civil engineering, Bikkina brings unmatched expertise in government, institutional, and infrastructure projects.',
                            'full_bio' => 'Srinivas Bikkina is a seasoned civil engineering professional with over three decades of experience in executing large-scale infrastructure and institutional projects across Andhra Pradesh and Telangana.

His career began with the Breakwater Project at Kakinada Port (1995–1996), followed by major institutional developments such as 11 academic blocks at JNTU Kakinada (1997–2004) and the Kakinada Government General Hospital (2005–2009).

Between 2009 and 2016, he played a key role in multiple government and institutional projects including the Nidadavolu 30-Bedded Government Hospital, Tanuku MCH Block, Volluturu ITI College, Eluru Drug Stores, RIMS Ongole, and IIIT Basara.

From 2016 to 2021, he led the Integrated Finance Building project in Ongole under the Government of Andhra Pradesh. Since 2021, Bikkina has overseen several landmark developments including the Delhi Public School, Khajaguda, MCH Hospital, Narayanpet, National Public School, Kompally, and the Clubhouse at The Marquise by Sri Sreenivasa Infra.

With extensive hands-on expertise in civil execution, project management, and on-site coordination, Srinivas ensures quality-driven, timely, and cost-efficient project delivery from concept to completion.'
                        ],
                        [
                            'name' => 'Narendra Rao Manikonda',
                            'title' => 'Head of Projects, Procurement and Finance',
                            'initials' => 'NM',
                            'image' => '/images/directors/Narendra Rao Manikonda.jpg',
                            'experience' => '20+ Years',
                            'expertise' => 'Civil & Electrical Infrastructure',
                            'short_bio' => 'Narendra Rao has led complex civil and electrical projects across premier institutions and industrial sites nationwide.',
                            'full_bio' => 'Narendra Rao Manikonda brings over two decades of proven expertise in civil and electrical project execution, spanning large-scale institutional, industrial, and residential developments across India.

Beginning his career with the IIT Guwahati Sports and Commercial Complex, he has since contributed to landmark projects such as Hyderabad Central University, Varanasi Airport, RIMS Ongole, and the HPCL Green R&D Project, Bangalore. His portfolio also includes major assignments with Prestige IVY League, DSR Projects, NTPC, and Singareni Collieries.

With hands-on experience in both civil and electrical domains, he oversees end-to-end project delivery, from procurement and finance to site coordination and operations. His leadership ensures timely, high-quality execution and adherence to the highest industry standards.'
                        ],
                        [
                            'name' => 'Aakarsh Budarapu',
                            'title' => 'Head of Projects & Business Development',
                            'initials' => 'AB',
                            'image' => '/images/directors/Aakarsh Budarapu.JPG',
                            'experience' => '9+ Years',
                            'expertise' => 'Design Engineering, Transportation & Construction Management',
                            'short_bio' => 'An internationally trained civil engineer with U.S. project experience, blending global design expertise with on-ground execution.',
                            'full_bio' => 'Aakarsh Budarapu is a highly qualified civil engineer with international experience in design engineering, transportation, and construction management. He holds a Bachelor\'s degree in Civil Engineering from Karunya University, Coimbatore (2014) and a Master\'s degree in Civil Engineering with a specialization in Transportation and Construction Management (2016).

Between 2016 and 2025, Aakarsh worked in the United States as a Design Engineer on several major infrastructure and public works projects. His experience includes:

• NYSTA (New York State Thruway Authority): Led highway geometry and work-zone design; key contributor in the transition from cash to cashless tolling systems.

• NYSDOT (New York State Department of Transportation): Contributed to the Kew Gardens Interchange project through street lighting and utility design; conducted traffic studies, collision data analysis, and design recommendations for safety improvements.

• NYSDOT – Syracuse Bridges: Involved in the replacement and redesign of existing bridges, including substructure, utility, and standard civil design.

• NYCDEP (New York City Department of Environmental Protection): Managed contracts and construction audits under the project management division.

In 2025, after returning to India, Aakarsh joined the family business, bringing global design expertise and project management skills into on-ground execution. He currently oversees major civil works including the National Public School, Kompally, MCH Hospital, Narayanpet, and the Clubhouse at The Marquise by Sri Sreenivasa Infra.

With a strong foundation in both international design principles and local construction management, Aakarsh plays a key role in driving efficiency, quality, and innovation across all ongoing projects.'
                        ],

 [
    'name' => 'Boyapati Kishore',
    'title' => 'Head Of Projects - Electrical Works',
    'initials' => 'BK',
    'image' => '/images/directors/Boyapati-Kishore.jpg',
    'experience' => '21+ Years',
    'expertise' => 'Electrical Engineering, MEP Systems, Project Planning & Execution',
    'short_bio' => 'A senior electrical engineering professional with 21+ years of experience in executing large-scale MEP, infrastructure, and construction projects with high precision and quality.',
    'full_bio' => 'Boyapati Kishore is an accomplished Electrical Engineer with over 21 years of extensive experience in construction, infrastructure development, and large-scale MEP project execution. He has deep expertise in electrical system design, estimation, costing, project planning, testing & commissioning, and end-to-end site management.

Throughout his career, he has successfully led electrical works across Airports, Data Centers, high-rise residential towers, commercial complexes, institutional campuses, and other critical infrastructure projects. 

At Paanchajanya Reality Pvt. Ltd., Kishore has managed multiple multi-crore electrical projects, handling internal and external electrification, HT/LT system installations, fire alarm & safety systems, and full-site coordination with clients, consultants, and contractors.

His earlier roles with reputed infrastructure and EPC companies strengthened his skills in tendering, cost estimation, MEP coordination, material planning, and contractor management.

Known for his analytical thinking, technical clarity, and strong leadership, Kishore consistently ensures timely delivery while maintaining the highest safety and quality standards. His ability to manage complex project challenges and drive efficient execution makes him a highly respected leader in the electrical engineering and construction domain.'
]

                    ]
                ],
                'is_active' => true,
            ]
        );

        // Stats Section
        ContentSection::updateOrCreate(
            ['section_key' => 'stats'],
            [
                'title' => 'Our Achievements',
                'subtitle' => 'Numbers that speak for themselves',
                'data' => [
                    'stats' => [
                        ['value' => 48, 'suffix' => '+', 'label' => 'Projects Completed', 'color' => 'from-blue-500 to-cyan-500'],
                        ['value' => 221, 'suffix' => '+', 'label' => 'Crores Works on Hand', 'color' => 'from-purple-500 to-pink-500'],
                        ['value' => 150, 'suffix' => '+', 'label' => 'Skilled Professionals', 'color' => 'from-orange-500 to-red-500'],
                        ['value' => 15, 'suffix' => '+', 'label' => 'Years of Excellence', 'color' => 'from-green-500 to-emerald-500'],
                    ]
                ],
                'is_active' => true,
            ]
        );

        // Business Sectors Section
        ContentSection::updateOrCreate(
            ['section_key' => 'business_sectors'],
            [
                'title' => 'Areas of Specialization',
                'subtitle' => 'Comprehensive construction solutions across multiple sectors',
                'data' => [
                    'sectors' => [
                        [
                            'title' => 'Civil Works',
                            'description' => 'Comprehensive civil construction including roads, bridges, buildings, and infrastructure development projects.',
                            'gradient' => 'from-blue-500 to-cyan-500',
                        ],
                        [
                            'title' => 'Electrical Works',
                            'description' => 'High voltage electrical systems up to 765KV, building electrification, power distribution, and UPS systems.',
                            'gradient' => 'from-purple-500 to-pink-500',
                        ],
                        [
                            'title' => 'Infrastructure Development',
                            'description' => 'Transmission & distribution lines, metro rail infrastructure, water pipelines, and storm water drains.',
                            'gradient' => 'from-orange-500 to-red-500',
                        ],
                        [
                            'title' => 'Industrial & Institutional Buildings',
                            'description' => 'Educational institutions, hospitals, government buildings, and industrial facilities with modern amenities.',
                            'gradient' => 'from-green-500 to-emerald-500',
                        ],
                        [
                            'title' => 'Industrial Structures',
                            'description' => 'Power plant structures, steel structure erection, cooling towers, pipe racks, and industrial buildings.',
                            'gradient' => 'from-yellow-500 to-orange-500',
                        ],
                        [
                            'title' => 'Power Projects',
                            'description' => 'Power generation projects, electrical infrastructure, and power plant civil/mechanical/electrical works.',
                            'gradient' => 'from-indigo-500 to-purple-500',
                        ],
                        [
                            'title' => 'Project Management Consultancy',
                            'description' => 'End-to-end project management, design & engineering, quality assurance, and safety management services.',
                            'gradient' => 'from-pink-500 to-rose-500',
                        ],
                        [
                            'title' => 'Earth Works & Mining',
                            'description' => 'Excavation, earth moving, mining infrastructure, and related construction activities.',
                            'gradient' => 'from-teal-500 to-cyan-500',
                        ],
                    ]
                ],
                'is_active' => true,
            ]
        );

        $this->command->info('Homepage content sections seeded successfully!');
    }
}

