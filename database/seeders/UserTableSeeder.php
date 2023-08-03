<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "role_name" => "PIC Class",
            "username" => "PICDataAnalyst",
            "email" => "pic@dataanalyst.com",
            "class" => "Data Analyst",
            "password" => Hash::make("PICDataAnalystMUAVol9"),
        ]);

        User::create([
            "role_name" => "PIC Class",
            "username" => "PICSupplyChainManagement",
            "email" => "pic@supplychainmanagement.com",
            "class" => "Supply Chain Management",
            "password" => Hash::make("PICSupplyChainManagement"),
        ]);

        User::create([
            "role_name" => "PIC Class",
            "username" => "HumanResourceManagement",
            "email" => "pic@humanresourcemanagement.com",
            "class" => "Human Resource Management",
            "password" => Hash::make("PICHumanResourceManagementMUAVol9"),
        ]);

        User::create([
            "role_name" => "PIC Class",
            "username" => "ProjectMangement",
            "email" => "pic@projectmangement.com",
            "class" => "Project Management",
            "password" => Hash::make("PICProjectMangementMUAVol9"),
        ]);

        User::create([
            "role_name" => "PIC Class",
            "username" => "ContentCreator",
            "email" => "pic@contentcreator.com",
            "class" => "Content Creator",
            "password" => Hash::make("PICContentCreatorMUAVol9"),
        ]);

        User::create([
            "role_name" => "PIC Class",
            "username" => "UIUXDesign",
            "email" => "pic@uiuxdesign.com",
            "class" => "UI/UX Design",
            "password" => Hash::make("PICUIUXDesignMUAVol9"),
        ]);

        User::create([
            "role_name" => "PIC Class",
            "username" => "BusinessBrandMarketing",
            "email" => "pic@businessbrandmarketing.com",
            "class" => "Business and Brand Marketing",
            "password" => Hash::make("PICBusinessBrandMarketingMUAVol9"),
        ]);

        User::create([
            "role_name" => "PIC Class",
            "username" => "SocialMedia",
            "email" => "pic@socialmedia.com",
            "class" => "Social Media",
            "password" => Hash::make("PICSocialMediaMUAVol9"),
        ]);

        User::create([
            "role_name" => "Super Admin",
            "username" => "developermagangupdatekece",
            "email" => "developer@superadmin.com",
            "class" => "",
            "password" => Hash::make("developermagangupdatekece"),
        ]);

        User::create([
            "role_name" => "Manager",
            "username" => "manager",
            "email" => "manager@superadmin.com",
            "class" => "",
            "password" => Hash::make("managermagangupdate"),
        ]);
    }
}
