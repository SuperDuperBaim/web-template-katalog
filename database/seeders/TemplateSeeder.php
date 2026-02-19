<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    public function run()
    {
        Template::create([
            'nama_template' => 'Modern IT Student',
            'kategori' => 'Creative',
            'foto_preview' => 'https://s3.resume.io/uploads/feature_item/image/445/resume-templates.png',
            'link_demo' => 'https://vercel.com',
            'link_github' => 'https://github.com',
            'deskripsi' => 'Template minimalis dengan nuansa dark mode, cocok untuk mahasiswa IT.',
        ]);

        Template::create([
            'nama_template' => 'Simple Wood Craft',
            'kategori' => 'Woodworking',
            'foto_preview' => 'https://colorlib.com/wp/wp-content/uploads/sites/2/free-personal-website-templates.jpg',
            'link_demo' => 'https://vercel.com',
            'link_github' => 'https://github.com',
            'deskripsi' => 'Design estetik yang menonjolkan karya kerajinan kayu dan rotan.',
        ]);
    }
}