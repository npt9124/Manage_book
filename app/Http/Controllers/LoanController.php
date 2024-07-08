<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Ban;
use App\Models\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    public function all_loan()
    {
        $all_loan = Loan::with(['book', 'reader'])->get();
        return view('All_loan', ['all_loan' => $all_loan]);
    }

    public function create()
    {
        $books = Book::all();
        $readers = Reader::all();
        return view('Add_loan', compact('books', 'readers'));
    }

    public function save_loan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reader_name' => 'required|string|exists:readers,name',
            'book_name' => 'required|string|exists:books,book_name',
            'borrowed_day' => 'required|date',
            'return_day' => 'required|date',
            'num_books_on_loan' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->route('add-loan')->withErrors($validator)->withInput();
        }

        $reader = Reader::where('name', $request->reader_name)->first();
        $book = Book::where('book_name', $request->book_name)->first();

        Loan::create([
            'reader_id' => $reader->reader_id,
            'book_id' => $book->book_id,
            'borrowed_day' => $request->borrowed_day,
            'return_day' => $request->return_day,
            'num_books_on_loan' => $request->num_books_on_loan,
            'status' => 'borrowing',
        ]);

        return redirect()->route('all-loan')->with('message', 'Loan created successfully.');
    }

    public function edit_loan($loan_id)
    {
        $loan = Loan::with(['book', 'reader'])->findOrFail($loan_id);
        $books = Book::all();
        $readers = Reader::all();
        return view('edit_loan', compact('loan', 'books', 'readers'));
    }

    public function update_loan(Request $request, $loan_id)
    {
        $validator = Validator::make($request->all(), [
            'reader_name' => 'required|string|exists:readers,name',
            'book_name' => 'required|string|exists:books,book_name',
            'borrowed_day' => 'required|date',
            'return_day' => 'required|date',
            'num_books_on_loan' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $loan = Loan::findOrFail($loan_id);
        $reader = Reader::where('name', $request->reader_name)->first();
        $book = Book::where('book_name', $request->book_name)->first();

        $loan->update([
            'reader_id' => $reader->reader_id,
            'book_id' => $book->book_id,
            'borrowed_day' => $request->borrowed_day,
            'return_day' => $request->return_day,
            'num_books_on_loan' => $request->num_books_on_loan,
            'status' => $loan->status,
        ]);

        return redirect()->route('all-loan')->with('message', 'Loan updated successfully.');
    }

    public function delete_loan($loan_id)
    {
        $loan = Loan::findOrFail($loan_id);
        $loan->delete();

        return redirect()->route('all-loan')->with('message', 'Loan deleted successfully.');
    }

    public function change_status($loan_id)
    {
        $loan = Loan::findOrFail($loan_id);
        return view('Change_status', compact('loan'));
    }

    public function save_status(Request $request, $loan_id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|string|in:returned,overdue',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $loan = Loan::findOrFail($loan_id);
        $loan->status = $request->status;
        $loan->save();


        return redirect()->route('all-loan')->with('message', 'Loan status updated successfully.');
    }


}
