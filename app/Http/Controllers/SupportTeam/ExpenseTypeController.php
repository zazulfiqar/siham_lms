<?php

namespace App\Http\Controllers\SupportTeam;
use App\Repositories\PaymentRepo;
use App\Models\Expense_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Qs;

class ExpenseTypeController extends Controller
{
    protected $expenseRepository;
    public function __construct(PaymentRepo $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    public function index()
    {
        $d['my_classes'] =Expense_type::all();
        $data=$d['my_classes'];
        return view('pages.support_team.expenseType.index')->with('datafetch',$data);
    }

    public function create()
    {
        $d['my_classes'] = Expense_type::all();
        return view('pages.support_team.expenseType.create');
    }

    public function store(Request $req)
    {
        $data = $req->all();
        $this->expenseRepository->createExpense($data);
        return redirect()->route('payments.create');
    }

    public function show(Expense_type $expense_type)
    {

    }

    public function edit($id)
    {
            $data['expenseRecord'] = $this->expenseRepository->findExpense($id);
//            dd($data['expenseRecord']);
            return view('pages.support_team.expenseType.edit',$data);
    }

    public function update(Request $request, Expense_type $data ,$id)
    {
        $data = $request->all();
        $this->expenseRepository->updateExpense($id,$data);
        return redirect()->route('payments.create');
        //        return Qs::jsonUpdateOk();
    }

    public function destroy($id)
    {
        $datafetch  = Expense_type::findOrFail($id);
        $datafetch ->delete();
        return redirect()->back();
    }


}
