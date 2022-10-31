<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\History;
use Faker\Calculator\Isbn;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Book $book, $id)
    {
        $findBook = $book::find($id);

        return response()->json([
            'data' => $findBook
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newBook = $request->validate([
            'isbn' => 'required',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required|max:4',
            'synopsis' => 'required',
            'cover' => 'image|file|max:1024',
        ]);

        if($request->file('cover')){
            $newBook['cover'] = $request->file('cover')->store('book-cover');
        }else{
            $validateUser['cover'] = '';
        };

        Book::create($newBook);
        Alert::success('Selamat', 'Buku Baru Berhasil Ditambahkan!');

        return redirect('/admin/list-buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $books = $book::all();
        return view('admin.book', ['books' => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validBook = $request->validate([
            'edit_isbn' => 'required',
            'edit_title' => 'required',
            'edit_author' => 'required',
            'edit_publisher' => 'required',
            'edit_publication_year' => 'required|max:4',
            'edit_synopsis' => 'required',
            'edit_cover' => 'image|file|max:1024',
        ]);

        $editBook = [
            'isbn' => $validBook['edit_isbn'],
            'title' => $validBook['edit_title'],
            'author' => $validBook['edit_author'],
            'publisher' => $validBook['edit_publisher'],
            'publication_year' => $validBook['edit_publication_year'],
            'synopsis' => $validBook['edit_synopsis'],
        ];

        if($request->file('edit_cover')){
            if($request->old_cover){
                Storage::delete($request->old_cover);
            }
            $editBook['cover'] = $request->file('edit_cover')->store('book-cover');
        };

        $book::where('id', $request->edit_id)->update($editBook);
        Alert::success('Selamat', 'Data Buku Berhasil Diubah!');

        return redirect('/admin/list-buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book, Request $request)
    {
        $book::destroy($request->del_id);
        History::where('id_book', $request->del_id)->delete();
        Storage::delete($request->del_cover);
        Alert::success('Selamat', 'Buku Berjudul ' . $request->del_title . ' Berhasil Dihapus.');
        return redirect('/admin/list-buku');
    }
}
