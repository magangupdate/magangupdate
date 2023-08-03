<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Classes;
use App\Models\Mentee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserTableSeeder::class);
        $this->call(MenteeTableSeeder::class);

        Mentee::create([
            'full_name' => 'Farhan Augustiansyah',
            'email' => 'farhantsyh@icloud.com',
            'university' => 'Universitas Sriwijaya',
            'major' => 'Sistem Informasi',
            'whatsapp_number' => '082123104078',
            'instagram' => 'farhantsyh',
            'first_class' => 2,
            'reason_first_class' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'second_class' => 1,
            'reason_second_class' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'cv' => '2023-06-01',
            'twibbon_screenshot' => '2023-06-01',
            'tag_screenshot' => '2023-06-01',
            'repost_screenshot' => '2023-06-01',
            'subscribe_screenshot' => '2023-06-01',
            'q1' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'q2' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'q3' => 4,
            'q4' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'q5' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'q6' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'q7' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'q8' => 1 
        ]);

        Classes::create([
            'class_name' => 'Supply Chain Management',
            'class_slug' => 'supply-chain-management',
            'volume' => '9',
            'logo' => '',
            'description' => 'The Supply Chain Management class on MagangUpdate Academy Vol. 9 is designed to provide learners with a comprehensive understanding of the principles, concepts, and practices involved in managing the flow of goods and services from the point of origin to the point of consumption. This class covers topics such as procurement, logistics, inventory management, transportation, and distribution. It also includes discussions on the latest trends and technologies in supply chain management, such as blockchain, artificial intelligence, and automation.',
            'class_session_1' => '2023-06-01',
            'class_session_2' => '2023-06-01',
        ]);

        Classes::create([
            'class_name' => 'Human Resource Management',
            'class_slug' => 'human-resource-management',
            'volume' => '9',
            'logo' => '',
            'description' => 'The Human Resource Management class on MagangUpdate Academy Vol. 9 is designed to provide learners with a comprehensive understanding of the principles, concepts, and practices involved in managing human resources effectively. This class covers topics such as recruitment and selection, performance management, employee training and development, compensation and benefits, and employee relations. It also includes discussions on the latest trends and technologies in human resource management, such as HR analytics, remote work policies, and diversity and inclusion initiatives.',
            'class_session_1' => '2023-06-01',
            'class_session_2' => '2023-06-01',
        ]);

        Classes::create([
            'class_name' => 'Data Analyst',
            'class_slug' => 'data-analyst',
            'volume' => '9',
            'logo' => '',
            'description' => 'The Data Analyst class on MagangUpdate Academy Vol. 9 is designed to provide learners with a comprehensive understanding of the principles, concepts, and practices involved in analyzing and interpreting data. This class covers topics such as data collection, data cleaning, data visualization, statistical analysis, and predictive modeling. It also includes discussions on the latest trends and technologies in data analysis, such as machine learning, big data, and data storytelling.',
            'class_session_1' => '2023-06-01',
            'class_session_2' => '2023-06-01',
        ]);

        Classes::create([
            'class_name' => 'Project Management',
            'class_slug' => 'project-management',
            'volume' => '9',
            'logo' => '',
            'description' => 'The Project Management class on MagangUpdate Academy Vol. 9 is designed to provide learners with a comprehensive understanding of the principles, concepts, and practices involved in managing projects effectively. This class covers topics such as project planning, scheduling, budgeting, risk management, and team management. It also includes discussions on the latest trends and technologies in project management, such as agile methodology, project management software, and virtual team management.',
            'class_session_1' => '2023-06-01',
            'class_session_2' => '2023-06-01',
        ]);

        Classes::create([
            'class_name' => 'Content Creator',
            'class_slug' => 'content-creator',
            'volume' => '9',
            'logo' => '',
            'description' => 'The Content Creator class on MagangUpdate Academy Vol. 9 is designed to provide learners with a comprehensive understanding of the principles, concepts, and practices involved in creating high-quality content for various digital platforms. This class covers topics such as content strategy development, copywriting, video production, graphic design, and search engine optimization. It also includes discussions on the latest trends and technologies in content creation, such as interactive content, visual storytelling, and voice search.',
            'class_session_1' => '2023-06-01',
            'class_session_2' => '2023-06-01',
        ]);

        Classes::create([
            'class_name' => 'UI/UX Design',
            'class_slug' => 'ui-ux-design',
            'volume' => '9',
            'logo' => '',
            'description' => 'The UI/UX Design class on MagangUpdate Academy Vol. 9 is designed to provide learners with a comprehensive understanding of the principles, concepts, and practices involved in designing user interfaces and experiences. This class covers topics such as user research, wireframing, prototyping, visual design, and usability testing. It also includes discussions on the latest trends and technologies in UI/UX design, such as responsive design, mobile-first design, and design thinking.',
            'class_session_1' => '2023-06-01',
            'class_session_2' => '2023-06-01',
        ]);

        Classes::create([
            'class_name' => 'Business and Brand Marketing',
            'class_slug' => 'business-and-brand-marketing',
            'volume' => '9',
            'logo' => '',
            'description' => 'The Business and Marketing class on MagangUpdate Academy Vol. 9 is designed to provide learners with a comprehensive understanding of the principles, concepts, and practices involved in business and marketing. This class covers topics such as market research, product development, pricing strategies, branding, advertising, and sales. It also includes discussions on the latest trends and technologies in business and marketing, such as digital marketing, e-commerce, and customer relationship management.',
            'class_session_1' => '2023-06-01',
            'class_session_2' => '2023-06-01',
        ]);

        Classes::create([
            'class_name' => 'Social Media',
            'class_slug' => 'social-media',
            'volume' => '9',
            'logo' => '',
            'description' => 'The Social Media class on MagangUpdate Academy Vol. 9 is designed to provide learners with a comprehensive understanding of the principles, concepts, and practices involved in social media marketing. This class covers topics such as social media strategy development, content creation, community management, social media advertising, and analytics. It also includes discussions on the latest trends and technologies in social media, such as influencer marketing, live streaming, and augmented reality.',
            'class_session_1' => '2023-06-01',
            'class_session_2' => '2023-06-01',
        ]);
    }
}
