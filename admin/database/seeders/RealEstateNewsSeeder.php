<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RealEstateNewsSeeder extends Seeder
{
    public function run(): void
    {
        $news = [
            [
                'title' => 'The Rise of Eco-Friendly Living in Hyderabad',
                'slug' => 'rise-of-eco-friendly-living-hyderabad',
                'excerpt' => 'Explore how Paanchajanya Reality is redefining urban living with sustainable practices and green landscapes in the heart of Hyderabad.',
                'content' => 'Explore how Paanchajanya Reality is redefining urban living with sustainable practices and green landscapes in the heart of Hyderabad. Our commitment to sustainability goes beyond just planting trees; it encompasses water recycling, solar energy, and the use of eco-friendly building materials.',
                'image' => 'assests/image/future-city.jpg.jpg',
                'category' => 'Sustainability',
                'author' => 'Paanchajanya Team',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => '2026-03-11 10:00:00',
            ],
            [
                'title' => 'Why Invest in Open Plots in 2026?',
                'slug' => 'why-invest-in-open-plots-2026',
                'excerpt' => 'Understanding the long-term benefits of investing in strategically located open plots and how it offers superior returns compared to other assets.',
                'content' => 'Understanding the long-term benefits of investing in strategically located open plots and how it offers superior returns compared to other assets. Real estate has always been a reliable investment, and open plots provide the flexibility to build your dream home or hold as a high-value asset.',
                'image' => 'assests/image/plot.jpeg',
                'category' => 'Investment',
                'author' => 'Paanchajanya Team',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2026-03-05 10:00:00',
            ],
            [
                'title' => 'Apartments vs. Villas: Which One is for You?',
                'slug' => 'apartments-vs-villas-which-one-for-you',
                'excerpt' => 'A comprehensive comparison between the communal living of luxury apartments and the privacy of independent villas to help you decide.',
                'content' => 'A comprehensive comparison between the communal living of luxury apartments and the privacy of independent villas to help you decide. While apartments offer shared amenities and a sense of community, villas provide unmatched privacy and the freedom of owning a piece of land.',
                'image' => 'assests/image/3985.jpg',
                'category' => 'Lifestyle',
                'author' => 'Paanchajanya Team',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2026-02-28 10:00:00',
            ],
            [
                'title' => 'Project Milestones: Reaching New Heights',
                'slug' => 'project-milestones-reaching-new-heights',
                'excerpt' => 'We are excited to share the latest progress on our ongoing projects across Hyderabad and the vision for our upcoming developments.',
                'content' => 'We are excited to share the latest progress on our ongoing projects across Hyderabad and the vision for our upcoming developments. From foundation completion to structural milestones, we are on track to deliver excellence to our home buyers.',
                'image' => 'assests/image/banner9.jpg',
                'category' => 'Project Updates',
                'author' => 'Paanchajanya Team',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2026-02-15 10:00:00',
            ],
            [
                'title' => 'Building Communities, Not Just Homes',
                'slug' => 'building-communities-not-just-homes',
                'excerpt' => 'How we focus on creating holistic environments that foster social interaction and a sense of belonging for our residents.',
                'content' => 'How we focus on creating holistic environments that foster social interaction and a sense of belonging for our residents. Our projects are designed with community spaces, parks, and clubhouses that bring people together.',
                'image' => 'assests/image/banner2.jpg',
                'category' => 'Community',
                'author' => 'Paanchajanya Team',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2026-02-10 10:00:00',
            ],
            [
                'title' => 'Modern Interior Trends for Luxury Villas',
                'slug' => 'modern-interior-trends-luxury-villas',
                'excerpt' => 'A look at the latest design trends that blend functionality with opulence to create the perfect living spaces.',
                'content' => 'A look at the latest design trends that blend functionality with opulence to create the perfect living spaces. From minimalistic designs to smart home integrations, discover how to transform your villa into a sanctuary.',
                'image' => 'assests/image/projects/project1.jpg',
                'category' => 'Design',
                'author' => 'Paanchajanya Team',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2026-01-25 10:00:00',
            ],
        ];

        foreach ($news as $article) {
            DB::table('news')->updateOrInsert(
                ['slug' => $article['slug']],
                array_merge($article, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
