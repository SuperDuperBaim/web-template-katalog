<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'nama_template', 
        'kategori', 
        'foto_preview', 
        'link_demo', 
        'link_github', 
        'deskripsi'
    ];
}