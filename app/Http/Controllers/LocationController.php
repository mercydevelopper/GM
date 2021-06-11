<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    
    //  function addLocation

    public function addLocation(Request $request)
    {
       $location = Location::create($request->all());

       return response()->json([
            'message' => 'Location save !!',
            'location' => $location

       ]);

        
    }


    //  function ListLocation 

    public function ListLocation()
    {
      // Category::orderByDesc('created_at')->get(); pour le tri

       return response()->json(Location::all(), 200);
    }


    // function ListLocationById

    public function ListLocationById($id)
    { 
            $location = Location::find($id);
               if(is_null($location)){

                 return response()->json([
                     'message' => 'location not found !!'
                  ]);


                }
       return response()->json($location, 200);
    }


    //  function UpdateLocation

    public function UpdateLocation(Request $request, $id)
    {
      $location = Location::find($id);

               if(is_null($location)){

                 return response()->json([
                     'message' => 'location not found !!'
                  ]);

                }

       $location->update($request->all());

       return response()->json([
                  'message' => 'update success',
                  'provider' => $location
        ], 200);

        
    }

    
    //  function DeleteLocation

    public function DeleteLocation(Request $request, $id)
    {

      $location = Location::find($id);

               if(is_null($location)){

                  return response()->json([
                     'message' => 'Location not found !!'
                  ]);

                }

       $location->delete();

       return response()->json([
                  'message' => 'deleted success',
       ], 200);

        
    }
   
}
