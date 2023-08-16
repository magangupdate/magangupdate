<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    private $digitalAssets;
    private $testimonials;

    public function index()
    {
        $this->digitalAssets = [
            [ "name" => "Magang Jojga", "logo" => "https://i.postimg.cc/T15FB4q1/logo-jogja.webp", "link" => "http://instagram.com/magangjogja.id" ],
            [ "name" => "Magang Surabaya", "logo" => "https://i.postimg.cc/BtWk3BMg/logo-surabaya.webp", "link" => "https://www.instagram.com/magangsurabaya/" ],
            [ "name" => "Magang Bandung", "logo" => "https://i.postimg.cc/Y99Jz9v1/logo-bandung.webp", "link" => "http://instagram.com/magangbandung" ],
            [ "name" => "Magang Jakarta", "logo" => "https://i.postimg.cc/1tjbCQFb/logo-jakarta.webp", "link" => "https://www.instagram.com/magangjakarta.id/" ],
        ];

        $this->testimonials = [
            [
                "id" => 1,
                "testimonials" => [
                    [ "name" => "Endina Hanna Putri", "division" => "Business & Partnership Development", "testimonial" => "MagangUpdate is so helpful in providing insight needed for hunters.", "profile" => "https://i.postimg.cc/2SkLGRxz/hanna.webp" ],
                    [ "name" => "Ahmad Dipa Khawarizmi", "division" => "Content Creator", "testimonial" => "Cukup informatif untuk memberikan info info magang saya.", "profile" => "https://i.postimg.cc/9MR79dYZ/dipa.webp" ],
                    [ "name" => "Agnes Gitana Yuni Rahmawati", "division" => "Social Media Manager", "testimonial" => "Informasi magang yang disajikan akurat dan kredibel.", "profile" => "https://i.postimg.cc/x8LNx97d/anna.webp" ],
                    [ "name" => "Isnaya Rozanisa", "division" => "Business and Partnership Development", "testimonial" => "Platform yang sangat helpful, useful, informatif, trusted!!", "profile" => "https://i.postimg.cc/g05wGwbJ/isnaya.webp" ],
                ],
            ],
            [
                "id" => 2,
                "testimonials" => [
                    [ "name" => "Aisyah Putri Utami", "division" => "Business & Partnership Development", "testimonial" => "Selalu menebar kebermanfaatan melalui sharing awesome and trusted internship & opportunities.", "profile" => "https://i.postimg.cc/tgm67SW9/aisyah.webp" ],
                    [ "name" => "Nadira Zahra", "division" => "Business & Partnership Development", "testimonial" => "MagangUpdate bermanfaat bgt buat cari informasi magang!💘", "profile" => "https://i.postimg.cc/1X040Jnn/nadira.webp" ],
                    [ "name" => "Maulidya Nur Inayah", "division" => "Content Creator", "testimonial" => "Always give trust content lowongan magang dan tips & trick persiapan karir.", "profile" => "https://i.postimg.cc/9QLRN8xy/inayah.webp" ],
                    [ "name" => "Fitriani Ramadhanti Supena", "division" => "Creative Writer", "testimonial" => "MagangUpdate menjadi media informatif dan atraktif bagi para pencari kerja.", "profile" => "https://i.postimg.cc/CLHfbLkP/fitriani.webp", ],
                ],
            ],
        ];

        return view('index', [
            "digitalAssets" => $this->digitalAssets,
            "testimonials"  => $this->testimonials,
        ]);
    }

    public function jobs()
    {
        return view('jobs');
    }

    public function jobDetail()
    {
        return view('job-detail');
    }

    public function articles()
    {
        $articles = Article::all();
        return view('articles', [
            'articles' => $articles,
        ]);
    }

    public function muap()
    {
        return view('muap');
    }

    public function cvClinic()
    {
        return view('cv-clinic');
    }
}