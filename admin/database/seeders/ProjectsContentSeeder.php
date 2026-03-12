<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsContentSeeder extends Seeder
{
    public function run()
    {
        $projectsContent = [
            // Project 1: HPCL Bangalore Terminal Infrastructure
            [
                'id' => 1,
                'full_description' => '<h2>Project Overview</h2>
<p>The HPCL Bangalore Terminal Infrastructure project represents a landmark achievement in petroleum infrastructure development. This comprehensive project involved the design, construction, and commissioning of a state-of-the-art petroleum storage and distribution terminal facility in Bangalore, Karnataka.</p>

<h3>Scope of Work</h3>
<p>Our team successfully executed a multi-faceted project encompassing civil, mechanical, and electrical works. The project included the construction of large-capacity storage tanks with advanced safety systems, installation of sophisticated pipeline networks for product transfer, and implementation of comprehensive electrical and instrumentation systems for terminal automation.</p>

<p>The terminal features multiple storage tanks with a combined capacity of over 50,000 kiloliters, designed to handle various petroleum products including diesel, petrol, and aviation fuel. Each tank is equipped with advanced level monitoring systems, temperature sensors, and automated fire suppression systems to ensure maximum safety and operational efficiency.</p>

<h3>Technical Excellence</h3>
<p>The project demanded exceptional technical expertise in handling hazardous materials and implementing stringent safety protocols. Our engineering team designed and installed a comprehensive pipeline network spanning over 5 kilometers, incorporating advanced leak detection systems and automated shut-off valves. The electrical systems include redundant power supply arrangements, sophisticated SCADA systems for remote monitoring, and emergency backup systems.</p>

<p>Special attention was given to environmental protection measures, including secondary containment systems, vapor recovery units, and effluent treatment facilities. The terminal is designed to meet and exceed all environmental regulations and industry best practices.</p>

<h3>Project Challenges and Solutions</h3>
<p>One of the major challenges was executing the project in an operational environment without disrupting existing HPCL operations. Our team developed a phased construction approach that allowed continuous operation of adjacent facilities while ensuring safety and quality standards. We implemented advanced project management techniques and maintained close coordination with HPCL stakeholders throughout the project lifecycle.</p>

<h3>Quality and Safety</h3>
<p>Safety was paramount throughout the project execution. We maintained a zero-accident record by implementing comprehensive safety training programs, regular safety audits, and strict adherence to safety protocols. All construction activities were conducted in compliance with OISD (Oil Industry Safety Directorate) standards and international best practices.</p>

<p>Quality assurance was ensured through rigorous testing and inspection procedures at every stage of construction. All materials and equipment were sourced from approved vendors and subjected to stringent quality checks before installation.</p>

<h3>Project Impact</h3>
<p>The successful completion of this project has significantly enhanced HPCL\'s storage and distribution capabilities in the Bangalore region. The modern terminal infrastructure supports efficient petroleum product distribution, contributing to energy security and economic development in Karnataka. The project has also created employment opportunities and demonstrated our capability to execute complex infrastructure projects in the petroleum sector.</p>'
            ],

            // Project 2: NTPC Power Plant Electrical Systems
            [
                'id' => 2,
                'full_description' => '<h2>Project Overview</h2>
<p>The NTPC Power Plant Electrical Systems project showcases our expertise in high-voltage electrical engineering and power plant infrastructure. This prestigious project involved the design, supply, installation, and commissioning of comprehensive electrical systems for a thermal power generation facility in Telangana.</p>

<h3>Technical Scope</h3>
<p>Our scope of work encompassed the complete electrical infrastructure for the power plant, including 220kV and 132kV switchyards, auxiliary power distribution systems, control and instrumentation systems, and emergency power backup arrangements. The project required handling of high-voltage equipment, sophisticated protection systems, and integration with the existing power grid.</p>

<p>The switchyard installation included circuit breakers, isolators, power transformers, current transformers, potential transformers, and associated control panels. We installed over 50 kilometers of high-voltage cables, implemented comprehensive earthing and lightning protection systems, and established a state-of-the-art control room with SCADA integration.</p>

<h3>Engineering Excellence</h3>
<p>The project demanded exceptional engineering capabilities in power system design and analysis. Our team conducted detailed load flow studies, short circuit analysis, and protection coordination studies to ensure optimal system performance and reliability. We designed redundant systems for critical equipment to ensure uninterrupted power plant operation.</p>

<p>Special emphasis was placed on implementing advanced protection schemes including differential protection, distance protection, and backup protection systems. The control systems feature sophisticated automation with remote monitoring and control capabilities, enabling efficient power plant operation and maintenance.</p>

<h3>Safety and Compliance</h3>
<p>Working with high-voltage electrical systems requires stringent safety measures. Our team implemented comprehensive safety protocols including permit-to-work systems, lockout-tagout procedures, and regular safety training. All work was conducted in compliance with Central Electricity Authority (CEA) regulations and Indian Electricity Rules.</p>

<p>We maintained an exemplary safety record throughout the project duration, with zero lost-time accidents. Regular safety audits and toolbox talks ensured that all personnel were aware of potential hazards and safety procedures.</p>

<h3>Testing and Commissioning</h3>
<p>The commissioning phase involved extensive testing of all electrical equipment and systems. We conducted high-voltage testing, protection relay testing, transformer testing, and integrated system testing to ensure proper functioning and coordination. All test results were documented and submitted to NTPC for approval.</p>

<p>The successful commissioning of the electrical systems enabled the power plant to commence commercial operation on schedule, contributing to the national power grid and supporting economic development.</p>

<h3>Project Achievements</h3>
<p>This project demonstrated our capability to execute large-scale electrical infrastructure projects for the power sector. The successful completion within the stipulated timeline and budget, while maintaining the highest quality and safety standards, has strengthened our relationship with NTPC and established our credentials as a reliable electrical contractor for power projects.</p>'
            ],

            // Project 3: L&T Industrial Complex
            [
                'id' => 3,
                'full_description' => '<h2>Project Overview</h2>
<p>The L&T Industrial Complex project represents a comprehensive industrial infrastructure development undertaken for Larsen & Toubro Limited in Hyderabad. This project involved the construction of a modern manufacturing facility with advanced industrial infrastructure, incorporating civil, structural, mechanical, and electrical works.</p>

<h3>Project Scope</h3>
<p>The project encompassed the construction of multiple industrial buildings totaling over 100,000 square feet of built-up area. Our scope included site development, foundation works, structural steel fabrication and erection, building construction, installation of heavy machinery foundations, and complete electrical and mechanical services.</p>

<p>The facility features high-bay manufacturing areas with overhead crane systems, administrative buildings, quality control laboratories, warehouse facilities, and utility buildings. We implemented advanced building management systems, fire protection systems, and environmental control systems to ensure optimal working conditions.</p>

<h3>Structural Engineering</h3>
<p>The project required sophisticated structural engineering solutions to support heavy manufacturing equipment and overhead crane operations. We designed and constructed reinforced concrete foundations capable of supporting loads exceeding 500 tons, fabricated and erected structural steel frameworks for the manufacturing halls, and installed specialized vibration isolation systems for precision machinery.</p>

<p>The structural design incorporated seismic considerations and wind load analysis to ensure structural integrity and safety. All structural works were executed in accordance with IS codes and international standards.</p>

<h3>Mechanical and Electrical Systems</h3>
<p>The mechanical systems include comprehensive HVAC installations for climate control in manufacturing and administrative areas, compressed air systems for pneumatic equipment, process piping for various utilities, and effluent treatment facilities for environmental compliance.</p>

<p>Electrical infrastructure includes a 11kV/433V substation with a capacity of 5 MVA, comprehensive power distribution network, emergency diesel generator systems, UPS systems for critical loads, and energy-efficient LED lighting throughout the facility. We also implemented a building automation system for centralized monitoring and control of all building services.</p>

<h3>Quality and Timeline</h3>
<p>The project was executed with meticulous attention to quality and adherence to the project schedule. We implemented a comprehensive quality management system with regular inspections and testing at all stages of construction. All materials and equipment were procured from approved vendors and subjected to quality verification.</p>

<p>Despite the complexity and scale of the project, we successfully completed all works within the contracted timeline, enabling L&T to commence manufacturing operations as planned. The project was completed without any major safety incidents, maintaining our commitment to worker safety.</p>

<h3>Client Satisfaction</h3>
<p>The successful delivery of this project has resulted in high client satisfaction and has led to additional project opportunities with L&T. The modern industrial facility supports L&T\'s manufacturing operations and contributes to their business growth in the region.</p>'
            ],

            // Project 4: SCCL Mining Infrastructure
            [
                'id' => 4,
                'full_description' => '<h2>Project Overview</h2>
<p>The SCCL Mining Infrastructure project involved comprehensive infrastructure development for Singareni Collieries Company Limited, one of India\'s largest coal mining companies. This project encompassed the construction of mining support facilities, roads, buildings, and utility systems to support coal mining operations in Telangana.</p>

<h3>Scope of Work</h3>
<p>Our scope included the construction of administrative buildings, workshop facilities, equipment maintenance sheds, worker amenities, and residential quarters. We also developed internal road networks spanning over 15 kilometers, constructed drainage systems, and installed comprehensive electrical distribution networks for the mining complex.</p>

<p>The project required working in challenging terrain and coordinating with ongoing mining operations. We implemented specialized construction techniques suitable for mining environments and ensured all facilities met the stringent safety requirements of the mining industry.</p>

<h3>Infrastructure Development</h3>
<p>The administrative complex includes multi-story office buildings with modern amenities, conference facilities, and IT infrastructure. The workshop facilities feature heavy-duty flooring capable of supporting mining equipment, overhead crane systems for equipment handling, and specialized ventilation systems for welding and fabrication activities.</p>

<p>We constructed worker amenities including canteens, rest rooms, changing facilities, and medical centers to ensure worker welfare and comfort. The residential quarters provide quality housing for mining personnel and their families, contributing to improved living standards.</p>

<h3>Road and Drainage Systems</h3>
<p>The internal road network was designed to handle heavy mining equipment and coal transportation vehicles. We constructed reinforced concrete roads with proper drainage systems to ensure all-weather accessibility. The drainage infrastructure includes surface drains, culverts, and retention ponds to manage rainwater runoff and prevent flooding.</p>

<p>Special attention was given to dust suppression measures and environmental protection. We implemented water sprinkling systems along roads and established green belts to minimize environmental impact.</p>

<h3>Electrical Infrastructure</h3>
<p>The electrical systems include 33kV/11kV substations, comprehensive power distribution network, street lighting for roads and common areas, and emergency lighting systems. We installed energy-efficient lighting and implemented power factor correction systems to optimize energy consumption.</p>

<h3>Safety and Environmental Compliance</h3>
<p>All construction activities were conducted in strict compliance with mining safety regulations and environmental norms. We implemented comprehensive safety measures including barricading of construction areas, safety signage, and regular safety training for workers. The project maintained an excellent safety record with zero major accidents.</p>

<p>Environmental protection measures included dust control, noise control, proper waste management, and restoration of disturbed areas. We obtained all necessary environmental clearances and conducted regular environmental monitoring.</p>

<h3>Project Impact</h3>
<p>The successful completion of this infrastructure has significantly improved the operational efficiency of SCCL mining operations. The modern facilities support increased coal production and contribute to energy security. The project has also improved the quality of life for mining personnel and their families.</p>'
            ],

            // Project 5: Smart City Infrastructure Phase-II
            [
                'id' => 5,
                'full_description' => '<h2>Project Overview</h2>
<p>The Smart City Infrastructure Phase-II project represents our foray into next-generation urban infrastructure development. This innovative project involved the implementation of advanced smart city solutions with IoT integration, sustainable systems, and intelligent infrastructure management for a modern urban development in Telangana.</p>

<h3>Smart Infrastructure Components</h3>
<p>The project encompassed the installation of smart street lighting systems with automated controls and energy monitoring, intelligent traffic management systems with real-time monitoring, smart parking solutions with sensor-based occupancy detection, and integrated command and control center for centralized monitoring and management.</p>

<p>We implemented a comprehensive fiber optic network backbone to support high-speed data communication and connectivity for all smart systems. The network infrastructure enables real-time data collection, analysis, and decision-making for efficient city management.</p>

<h3>IoT Integration</h3>
<p>The project features extensive IoT sensor deployment for various applications including environmental monitoring (air quality, noise levels, temperature), water quality monitoring in distribution networks, waste management with smart bins and collection optimization, and energy consumption monitoring across public facilities.</p>

<p>All IoT devices are connected to a central data platform that collects, processes, and analyzes data in real-time. The platform provides actionable insights for city administrators and enables predictive maintenance of infrastructure.</p>

<h3>Sustainable Systems</h3>
<p>Sustainability was a core focus of the project. We installed solar power systems on public buildings and street lighting, implemented rainwater harvesting systems, established sewage treatment and recycling facilities, and created green spaces with smart irrigation systems.</p>

<p>The smart irrigation system uses soil moisture sensors and weather data to optimize water usage for landscaping, resulting in significant water conservation. Solar-powered street lights reduce energy consumption and carbon footprint.</p>

<h3>Intelligent Transportation</h3>
<p>The intelligent transportation system includes adaptive traffic signal control based on real-time traffic flow, CCTV surveillance for traffic monitoring and security, electronic signage for traffic information and alerts, and integration with public transportation systems.</p>

<p>The system helps reduce traffic congestion, improve road safety, and enhance the overall transportation experience for citizens.</p>

<h3>Technology and Innovation</h3>
<p>This project showcases our capability to implement cutting-edge technology solutions for urban infrastructure. We partnered with leading technology providers to deploy state-of-the-art systems and ensured seamless integration of various components.</p>

<p>The command and control center features large video walls, advanced analytics software, and 24/7 monitoring capabilities. City administrators can monitor all systems in real-time and respond quickly to any issues or emergencies.</p>

<h3>Future-Ready Infrastructure</h3>
<p>The infrastructure is designed to be scalable and adaptable to future technological advancements. The modular architecture allows for easy addition of new systems and services as the city grows and evolves. This project sets a benchmark for smart city development and demonstrates our commitment to building sustainable, technology-enabled urban infrastructure.</p>'
            ],

            // Project 6: Solar Power Plant Construction
            [
                'id' => 6,
                'full_description' => '<h2>Project Overview</h2>
<p>The Solar Power Plant Construction project involved the development of a 100MW solar photovoltaic power generation facility in Andhra Pradesh. This renewable energy project demonstrates our commitment to sustainable development and our capability to execute large-scale solar power projects with grid integration and energy storage systems.</p>

<h3>Project Scope</h3>
<p>The project encompassed site preparation and land development across 500 acres, installation of over 300,000 solar PV modules, construction of mounting structures and tracking systems, installation of inverters and transformers, development of 132kV evacuation infrastructure, and implementation of a 20MWh battery energy storage system.</p>

<p>The solar plant is designed to generate approximately 180 million units of clean electricity annually, sufficient to power over 100,000 homes and offset approximately 150,000 tons of CO2 emissions per year.</p>

<h3>Engineering and Design</h3>
<p>Our engineering team conducted comprehensive site assessment including solar radiation analysis, geotechnical investigations, and environmental impact studies. The plant design optimizes energy generation through optimal module orientation, advanced tracking systems, and efficient electrical configuration.</p>

<p>We implemented single-axis tracking systems that follow the sun\'s movement throughout the day, increasing energy generation by approximately 20% compared to fixed-tilt systems. The tracking systems are equipped with wind sensors and automatic stow mechanisms for protection during high winds.</p>

<h3>Electrical Infrastructure</h3>
<p>The electrical system includes string inverters and central inverters with a combined capacity of 100MW, step-up transformers to convert power to grid voltage, comprehensive AC and DC cabling network, and a 132kV switchyard for grid connection.</p>

<p>The plant features advanced monitoring and control systems that track performance of individual strings and modules, enabling quick identification and resolution of any issues. Remote monitoring capabilities allow 24/7 oversight of plant operations.</p>

<h3>Energy Storage System</h3>
<p>The integrated battery energy storage system (BESS) provides grid stability and enables power dispatch during peak demand periods. The lithium-ion battery system can store 20MWh of energy and discharge at a rate of 10MW, helping to balance supply and demand and improve grid reliability.</p>

<p>The BESS includes sophisticated battery management systems, thermal management, and fire suppression systems to ensure safe and efficient operation.</p>

<h3>Grid Integration</h3>
<p>We constructed a dedicated 132kV transmission line connecting the solar plant to the state grid. The grid integration includes synchronization systems, power quality monitoring, and compliance with grid code requirements. The plant can ramp up or down quickly to support grid stability.</p>

<h3>Environmental and Social Impact</h3>
<p>This renewable energy project contributes significantly to India\'s clean energy goals and climate change mitigation efforts. The project has created employment opportunities during construction and operation phases, and supports local economic development.</p>

<p>We implemented environmental protection measures including preservation of native vegetation, soil erosion control, and wildlife protection. The project demonstrates that large-scale renewable energy development can coexist harmoniously with the environment.</p>'
            ],

            // Project 7: Commercial Complex Development
            [
                'id' => 7,
                'full_description' => '<h2>Project Overview</h2>
<p>The Commercial Complex Development project in Gachibowli, Hyderabad, represents a modern, sustainable commercial building with smart building features and green building certification. This prestigious project showcases our expertise in contemporary commercial construction and sustainable building practices.</p>

<h3>Project Details</h3>
<p>The commercial complex comprises a 12-story tower with a total built-up area of 250,000 square feet, including premium office spaces, retail areas on ground and first floors, multi-level parking facility, and rooftop amenities. The building is designed to achieve LEED Gold certification and incorporates numerous sustainable features.</p>

<h3>Architectural Excellence</h3>
<p>The building features contemporary architecture with a glass facade that maximizes natural light while minimizing heat gain through high-performance glazing. The design includes efficient floor plates that optimize usable space, double-height entrance lobby with premium finishes, and landscaped terraces on multiple levels.</p>

<p>The facade incorporates vertical fins and shading devices that reduce solar heat gain while creating an aesthetically pleasing exterior. The building design responds to the local climate and site conditions to optimize energy efficiency.</p>

<h3>Sustainable Features</h3>
<p>The project incorporates numerous green building features including a solar power system generating 200kW, rainwater harvesting with 500,000-liter storage capacity, sewage treatment plant with 100% water recycling, energy-efficient HVAC systems with VRF technology, and LED lighting throughout with daylight sensors.</p>

<p>The building achieves approximately 40% energy savings compared to conventional buildings through efficient systems and design. Water consumption is reduced by 50% through efficient fixtures and recycling.</p>

<h3>Smart Building Systems</h3>
<p>The commercial complex features advanced building automation systems that integrate HVAC, lighting, security, and access control. The building management system enables centralized monitoring and control, optimizing energy consumption and ensuring occupant comfort.</p>

<p>Smart features include occupancy-based lighting and HVAC control, real-time energy monitoring and analytics, automated parking management system, and mobile app for tenant services and building access.</p>

<h3>Safety and Security</h3>
<p>The building incorporates comprehensive safety systems including fire detection and suppression systems, emergency evacuation systems with voice communication, seismic design for earthquake resistance, and backup power for critical systems.</p>

<p>Security features include CCTV surveillance throughout the building, access control systems with biometric authentication, visitor management system, and 24/7 security personnel.</p>

<h3>Amenities and Services</h3>
<p>The commercial complex offers premium amenities including high-speed elevators with destination control, cafeteria and food court, fitness center and wellness facilities, conference and meeting rooms, and landscaped outdoor spaces.</p>

<p>The building provides a world-class working environment that attracts premium tenants and supports business productivity.</p>

<h3>Project Achievement</h3>
<p>This project demonstrates our capability to deliver high-quality commercial buildings that meet international standards for sustainability and smart building technology. The successful completion has enhanced our reputation in the commercial construction sector and positioned us for future opportunities in premium real estate development.</p>'
            ],
        ];

        foreach ($projectsContent as $content) {
            DB::table('projects')
                ->where('id', $content['id'])
                ->update(['full_description' => $content['full_description']]);
        }

        echo "Projects content updated successfully for all 7 projects!\n";
    }
}

