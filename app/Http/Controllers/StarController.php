<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    return [
        [
            'id' => 1, 'name' => 'Luke Skywalker', 'mass' => 77 
        ],
        [
            'id' => 2, 'name' => 'C-3PO', 'mass' => 75
        ],
        [
            'id' => 3, 'name' => 'R2-D2', 'mass' => 32
        ],
        [
            'id' => 4, 'name' => 'Anakin', 'mass' => 136
        ],
        [
            'id' => 5, 'name' => 'Leia Organa', 'mass' => 49
        ]
    ];
   }
}
