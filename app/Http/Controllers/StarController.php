<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class StarController extends Controller
{
   public function getAll() 
   {
    $stars = $this->getStars();

    return response()->json($stars);

   } 

   public function getById($id) 
   {
        $star = null;

        foreach ($this->getStars() as $starWars) {
            if ($starWars['id'] == $id) {
                $star = $starWars;
            }
        }

            return $star ? response()->json($star) : abort(404);

    }

    public function getStarByName($name) 
    {
        $stars = [];

        foreach ($this->getStars() as $starWars) {
            if ($starWars['name'] === $name) {
                $stars[] = $starWars;
            }

            return response()->json($stars);

        }
    }

    public function store(Request $request) 
    {
        
        $validate = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required|min:3',
            'mass' => 'required|numeric'
        ]);

        return response()->json($validate);
    }
    
    protected function getStars() 
    {
        $client = new Client();
        $response = $client->request('GET', 'https://swapi.dev/api/people/');
        $data = json_decode($response->getBody(), true);

        return $data;
    }
}
