<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public static $database = [
        'denti' => [
            ['uri' => 'sbiancamento-dentale', 'name' => 'Sbiancamento dentale', 'cover' => 'https://picsum.photos/200', 'description' => 'Denti splendenti con lo sbiancamento offerto presso il nostro studio grazie alle nostre tecnologie alla avanguardia'],
            ['uri' => 'rimozione-carie', 'name' => 'Rimozione carie', 'cover' => 'https://picsum.photos/200', 'description' => 'Denti splendenti con lo sbiancamento offerto presso il nostro studio grazie alle nostre tecnologie alla avanguardia'],
            ['uri' => 'faccette-dentali', 'name' => 'Faccette dentali', 'cover' => 'https://picsum.photos/200', 'description' => 'Denti splendenti con lo sbiancamento offerto presso il nostro studio grazie alle nostre tecnologie alla avanguardia'],
            ['uri' => 'apparecchio-dentale', 'name' => 'Apparechhio dentale', 'cover' => 'https://picsum.photos/200', 'description' => 'Denti splendenti con lo sbiancamento offerto presso il nostro studio grazie alle nostre tecnologie alla avanguardia'],
        ],
        'bellezza' => [
            ['uri' => 'trapianto-capelli', 'name' => 'Trapianto di capelli', 'cover' => 'https://picsum.photos/200', 'description' => 'Denti splendenti con lo sbiancamento offerto presso il nostro studio grazie alle nostre tecnologie alla avanguardia'],
            ['uri' => 'liposuzione', 'name' => 'Liposuzione', 'cover' => 'https://picsum.photos/200', 'description' => 'Denti splendenti con lo sbiancamento offerto presso il nostro studio grazie alle nostre tecnologie alla avanguardia'],
            ['uri' => 'botulino', 'name' => 'Botulino', 'cover' => 'https://picsum.photos/200', 'description' => 'Denti splendenti con lo sbiancamento offerto presso il nostro studio grazie alle nostre tecnologie alla avanguardia'],
            ['uri' => 'rinoplastica', 'name' => 'Rinoplastica', 'cover' => 'https://picsum.photos/200', 'description' => 'Denti splendenti con lo sbiancamento offerto presso il nostro studio grazie alle nostre tecnologie alla avanguardia'],
        ],
    ];
    public function detail($uri){
        foreach (self::$database as $arrays){
            foreach ($arrays as $array){
                if ($array['uri'] == $uri){
                    return view('detail', compact('array'));
                }
            }
        }
        abort(404); 
    }
    public function service() {
        return view('service', [
            'denti' => self::$database['denti'],
            'bellezza' => self::$database['bellezza'],
        ]);
    }
}
