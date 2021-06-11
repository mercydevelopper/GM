<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addCategory(Request $request)
    {
       $category = Category::create($request->all());

       return response()->json([
            'message' => 'Category save !!',
            'Category' => $category

       ]);

        
    }



    public function ListCategory()
    {
      // Category::orderByDesc('created_at')->get(); pour le tri

       return response()->json(Category::all(), 200);
    }


    public function ListCategoryById($id)
    { 
            $category = Category::find($id);
               if(is_null($category)){

                 return response()->json([
                     'message' => 'Categoty not found !!'
                  ]);


                }
       return response()->json($category, 200);
    }


    public function UpdateCategory(Request $request, $id)
    {
      $category = Category::find($id);

               if(is_null($category)){

                 return response()->json([
                     'message' => 'Categoty not found !!'
                  ]);

                }

       $category->update($request->all());

       return response()->json([
                  'message' => 'update success',
                  'category' => $category
        ], 200);

        
    }



    public function DeleteCategory(Request $request, $id)
    {

      $category = Category::find($id);

               if(is_null($category)){

                 return response()->json([
                     'message' => 'Categoty not found !!'
                  ]);

                }

       $category->delete();

       return response()->json([
                  'message' => 'deleted success',
        ], 200);

        
    }






}
