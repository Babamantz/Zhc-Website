<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $menu = Menu::create([
            'name' => 'Main Navbar',
            'location' => 'header',
        ]);

        $createItem = function ($title, $url = null, $parentId = null, $order = 0, $target = '_self') use ($menu) {
            return MenuItem::create([
                'menu_id' => $menu->id,
                'parent_id' => $parentId,
                'title' => $title,
                'url' => $url,
                'target' => $target,
                'order' => $order,
                'is_active' => true,
            ]);
        };

        $home = $createItem('Home', '/', null, 1);
        $about = $createItem('About', null, null, 2);
        $services = $createItem('Services', '/services', null, 3);
        $projects = $createItem('Projects', null, null, 4);
        $contact = $createItem('Contact', '/contact', null, 5);

        // About dropdown
        $createItem('About ZHC', '/about-zhc', $about->id, 1);
        $createItem('Organization Structure', 'https://example.com', $about->id, 2, '_blank');

        // Projects dropdown (nested)
        $completed = $createItem('Completed', null, $projects->id, 1);
        $createItem('Fundi Abdull', '/projects/completed/fundi-abdull', $completed->id, 1);
        $createItem('Mnadani', '/projects/completed/mnadani', $completed->id, 2);

        $ongoing = $createItem('Ongoing', null, $projects->id, 2);
        $createItem('Mombasa Phase II', '/projects/ongoing/mombasa-phase-ii', $ongoing->id, 1);
        $createItem('Kiembe Samaki', '/projects/ongoing/kiembe-samaki', $ongoing->id, 2);
    }

}
