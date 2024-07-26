<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        return response()->json([
            'msg' => 'Books retrieved successfully',
            'book' => Book::all()
        ], 200);
        
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = validator::make($request->all(),[
            'title' => 'required|string|min:2|max:100',
            'author' => 'required|string',
            'published_year' => 'required',
            'genre' => 'required',
        ]);
        if($validate->fails())
        {
            return response()->json($validate->errors());
        }
       $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'published_year' => $request->published_year,
            'genre' => $request->genre,
            
        ]);

        return response()->json([
            'msg' => 'book Inserted SuccessFully',
            'book' => $book 
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return response()->json(['msg' => 'Book Not Found'], 404);
        }
        return response()->json($book, 200);
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return response()->json(['msg' => 'Book Not Found'], 404);
        }

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|integer',
            'genre' => 'required'
        ]);

       

        $book->update($request->all());

        return response()->json([
        'msg' => 'Book updated successfully',
        'book' => $book
        ], 200);


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return response()->json(['msg' => 'Book Not Found'], 404);
        }

        $book->delete();
        return response()->json(['msg' => 'Book Deleted Successfully'], 200);
    }
}
