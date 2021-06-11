<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;

class PoviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   


    public function addProvider(Request $request)
    {
       $provider = Provider::create($request->all());

       return response()->json([
            'message' => 'Provider save !!',
            'Provider' => $provider

       ]);

        
    }


    public function ListProvider()
    {
      // Category::orderByDesc('created_at')->get(); pour le tri

       return response()->json(Provider::all(), 200);
    }


     public function ListProviderById($id)
    { 
            $provider = Provider::find($id);
               if(is_null($provider)){

                 return response()->json([
                     'message' => 'Provider not found !!'
                  ]);


                }
       return response()->json($provider, 200);
    }


     public function UpdateProvider(Request $request, $id)
    {
      $provider = Provider::find($id);

               if(is_null($provider)){

                 return response()->json([
                     'message' => 'provider not found !!'
                  ]);

                }

       $provider->update($request->all());

       return response()->json([
                  'message' => 'update success',
                  'provider' => $provider
        ], 200);

        
    }



    public function DeleteProvider(Request $request, $id)
    {

      $provider = Provider::find($id);

               if(is_null($provider)){

                 return response()->json([
                     'message' => 'provider not found !!'
                  ]);

                }

       $provider->delete();

       return response()->json([
                  'message' => 'deleted success',
       ], 200);

        
    }




}
