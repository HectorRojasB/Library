<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use App\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function index()
    {
        $book = Book::with(['category'])->get();
        return $book;
    }

    public function store(Request $request)
    {
        $book = Book::create($request->all());
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(Request $request, Book $book)
    {
        $book = Book::where('id', $book->id)->update($request->all());
    }

    public function destroy(Book $book)
    {
        $book = Book::destroy($book->id);
    }

    public function lendBook(Request $request)
    {     
        $lend = Book::find($request->id);
        $lend->user = $request->user;
        $lend->save();
    }

    public function returnBook(Request $request)
    {
        $return = Book::find($request->id);
        $return->user = $request->user;
        $return->save();
    }
}
