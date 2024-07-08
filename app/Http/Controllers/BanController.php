<?php
namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BanController extends Controller
{
    public function all_ban()
    {
        $all_ban = Ban::with(['loan.book', 'loan.reader'])->get();
        return view('All_ban', ['all_ban' => $all_ban]);
    }

    public function create()
    {
        $loan = Loan::all();
        return view('Add_ban', compact('loan'));
    }

    public function save_ban(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ban_name' => 'required|string|max:255',
            'fines' => 'required|string|max:255',
            'loan_id' => 'required|integer|exists:loan,loan_id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('add-ban')->withErrors($validator)->withInput();
        }

        Ban::create([
            'ban_name' => $request->ban_name,
            'fines' => $request->fines,
            'loan_id' => $request->loan_id,
        ]);

        return redirect()->route('all-ban')->with('message', 'Ban created successfully.');
    }

    public function edit_ban($ban_id)
    {
        $ban = Ban::with(['loan'])->findOrFail($ban_id);
        $loan = Loan::all();
        return view('Edit_ban', compact('ban', 'loan'));
    }

    public function update_ban(Request $request, $ban_id)
    {
        $validator = Validator::make($request->all(), [
            'ban_name' => 'required|string|max:255',
            'fines' => 'required|string|max:255',
            'loan_id' => 'required|integer|exists:loan,loan_id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $ban = Ban::findOrFail($ban_id);

        $ban->update([
            'ban_name' => $request->ban_name,
            'fines' => $request->fines,
            'loan_id' => $request->loan_id,
        ]);

        return redirect()->route('all-ban')->with('message', 'Ban updated successfully.');
    }

    public function delete_ban($ban_id)
    {
        $ban = Ban::findOrFail($ban_id);
        $ban->delete();

        return redirect()->route('all-ban')->with('message', 'Ban deleted successfully.');
    }
}
