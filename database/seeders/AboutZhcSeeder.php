<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutZhcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AboutUs::create([
            'title' => 'about-zhc',
            'slug' => 'about-zhc',
            'content' => 'HISTORY

The Zanzibar Housing Corporation is an autonomous government institution established under Act No. 6 of 2014. Through this law, the Corporation was granted the authority to manage and develop the housing sector in Zanzibar with the aim of increasing the national income and providing citizens with decent and safe housing.

Before the establishment of the Zanzibar Housing Corporation, from March 2000 to August 2015, these responsibilities were handled by the Department of Housing (Majenzo), which operated under the Ministry of Water, Construction, Energy, and Lands. The Government later decided to reform and develop the housing sector by officially establishing the Zanzibar Housing Corporation.

Initially, the main functions of the Corporation were to manage and develop existing residential houses located in Unguja (Michenzani, Kikwajuni, Kilimani, Old Mombasa, Makunduchi, Gamba, and Bambi) and Pemba (Madungu, Mtemani, and Wete), by renting them out, collecting rent, and carrying out maintenance as needed.

However, starting from 2020, the Corporation began constructing new affordable houses and commercial shops to promote development in the housing sector. It started with the Mombasa Project in Unguja and the Mkungu Malofa Project in Pemba. In the 2024/2025 fiscal year, the Corporation continues to implement several major projects, such as the first phase of the Chumbuni Project with a total of 1,095 houses, the Kiembe Samaki Project, the second phase of the Mombasa Project, and the Kisakasaka Project.

In 2024, the Corporation’s annual revenue increased by 100%, alongside the establishment of a Construction and Consultancy Company that provides services to both government and private institutions.'
        ]);
    }
}
