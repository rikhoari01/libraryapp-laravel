<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\History;
use Faker\Calculator\Isbn;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HistoryController extends Controller
{
    public function index(History $history, $id)
    {
        $findHistory = $history::find($id);

        return response()->json([
            'data' => $findHistory
        ]);
    }

    public function show(Book $book, User $user, History $borrow)
    {
        $datenow = date('Y-m-d');
        $availableBook = $book::select('id', 'isbn')->where('status', 1)->get();
        $findUser = $user::select('id', 'user_id')->where('is_Admin', 0)->get();
        $borrowedBook = $borrow::has('borrow')->where('status', 0)->get();
        $lateBook = $borrow::has('borrow')->where('status', 0)->where('return_date', '<=', $datenow)->get();
        $history = $borrow::has('borrow')->where('status', 1)->get();

        return view('admin.circulation', [
            'available' => $availableBook,
            'user' => $findUser,
            'borrowed' => $borrowedBook,
            'late' => $lateBook,
            'history' => $history,
        ]);
    }
    
    public function borrow(Request $request, History $borrow, Book $book)
    {
        $validBorrow = $request->validate([
            'isbn' => 'required',
            'user_id' => 'required',
        ]);

        $borrow_date = date('Y-m-d');
        $return_date = date("Y-m-d", mktime(date("G"), date("i"), date("s"), date("m"), date("d")+14, date("Y")));

        $borrowBook = [
            'id_user' => $request->id_user,
            'id_book' => $request->id_book,
            'borrow_date' => $borrow_date,
            'return_date' => $return_date,
        ];

        $book::where('id', $request->id_book)->update(['status' => 0]);
        $borrow::create($borrowBook);
        Alert::success('Selamat Peminjaman Buku Berhasil!', 'Silahkan Kembalikan Buku Sesuai Tanggal Pengembalian!');

        return redirect('/admin/list-peminjaman');
    }

    public function return(Request $request, Book $book, History $borrow)
    {

        $returnBook = [
            'status' => 1,
        ];

        $borrow::where('id', $request->return_id)->update($returnBook);
        $book::where('id', $request->return_bookid)->update($returnBook);
        Alert::success('Selamat', 'Buku Berjudul ' . $request->return_title . ' Berhasil Dikembalikan.');

        return redirect('/admin/list-peminjaman');
    }
}
