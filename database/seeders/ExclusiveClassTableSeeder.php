<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExclusiveClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::create([
            'class_name' => 'Personal Branding',
            'class_slug' => 'personal-branding',
            'volume' => '9',
            'logo' => '',
            'description' => 'The Personal Branding class on MagangUpdate Academy Vol. 9 is designed to provide learners with a comprehensive understanding of the principles, concepts, and practices involved in building and managing a strong personal brand. This class covers topics such as identifying personal values and strengths, creating a personal brand statement, developing a brand identity, and leveraging social media for personal branding. It also includes discussions on the latest trends and technologies in personal branding, such as influencer marketing and online reputation management.',
            'class_session_1' => '2023-06-01',
            'class_session_2' => '2023-06-01',
        ]);

        Classes::create([
            'class_name' => 'Design Thinking',
            'class_slug' => 'design-thinking',
            'volume' => '9',
            'logo' => '',
            'description' => 'The Social Media class on MagangUpdate Academy Vol. 9 is designed to provide learners with a comprehensive understanding of the principles, concepts, and practices involved in social media marketing. This class covers topics such as social media strategy development, content creation, community management, social media advertising, and analytics. It also includes discussions on the latest trends and technologies in social media, such as influencer marketing, live streaming, and augmented reality.',
            'class_session_1' => '2023-06-01',
            'class_session_2' => '2023-06-01',
        ]);
    }
}
