<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function addBook(Request $request){
        $title = $request->title;
        $contentField = $request->contentField;
        $author = $request->author;
        $genre = $request->genre;
        $ageLimit = $request->ageLimit;
        $fromUser = $request->fromUser;
        $path = $request->file('bookImg')->store('public/books');
        $path = str_replace('public', 'storage', $path);
        $book = new Book();
        $book->title = $title;
        $book->content = $contentField;
        $book->author = $author;
        $book->genre = $genre;
        $book->img = $path;
        $book->age_limit = $ageLimit;
        $book->from_user = $fromUser;
        $book->author_id = auth()->user()->getAuthIdentifier();
        $book->save();
        return redirect()->intended('/book/'.$book->id);
    }
    public function showBookById(Request $request){
        $bookId = $request->id;
        $book = Book::where('id', $bookId)->first();
        $comments = Comment::where('book_id', $bookId)->get();
        foreach ($comments as $comment){
            $userId = $comment->user_id;
            $comment->author = User::where('id', $userId)->first();
        }
        $authorId = $book->author_id;
        $book->user = User::where('id', $authorId)->first();
        return view('pages.book', ['book'=>$book, 'comments'=>$comments]);
    }
    public function updateBook(Request $request){
        $bookName = $request->bookName;
        $bookAuthor = $request->bookAuthor;
        $bookContent = $request->bookContent;
        $bookGenre = $request->bookGenre;
        $bookLimit = $request->bookLimit;
        $bookId = $request->bookId;
        $book = Book::where('id', $bookId)->first();
        $book->title = $bookName;
        $book->content = $bookContent;
        $book->author = $bookAuthor;
        $book->genre = $bookGenre;
        $book->age_limit = $bookLimit;
        $book->save();
        return json_encode(['result'=>'success']);
    }
    public function addComment(Request $request){
        $userId = auth()->user()->getAuthIdentifier();
        $commentField = $request->commentField;
        $bookId = $request->bookID;
        $comment = new Comment();
        $comment->comment = $commentField;
        $comment->user_id = $userId;
        $comment->book_id = $bookId;
        $comment->save();
        return redirect()->intended('/book/'.$bookId);
    }
    public function showBookMainPage() {
        $books = \App\Models\Book::all()->random(8);
        return view('pages.mainPage', ['books'=>$books]);
    }
    public function showBookCatalog(){
        $books = \App\Models\Book::all();
        return view('pages.catalog', ['books'=>$books]);
    }
    public function deleteBook(Request $request){
        $bookId = $request->bookId;
        $book = Book::where('id', $bookId)->first();
        $comments = Comment::where('book_id', $bookId)->get();
        $book->delete();
        foreach ($comments as $comment){
            $comment->delete();
        }
        return json_encode(['result'=>'success']);
    }
    public function deleteComm(Request $request){
        $commId = $request->commId;
        $comment = Comment::where('id', $commId)->first();
        $comment->delete();
        return json_encode(['result'=>'success']);
    }
}
