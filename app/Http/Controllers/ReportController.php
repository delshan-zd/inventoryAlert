<?php

namespace App\Http\Controllers;

use App\Models\StockTransaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
public function index(Request $request){

    $transactions = $this->fetchTransactions($request);

    return view('reports.index',compact('transactions'));
}

public function export(Request $request)
{
    $transactions= $this->fetchTransactions($request);

$pdf=Pdf::loadView('reports.index',[
    'transactions' => $transactions,
    'from' => $request->query('from'),
    'to' => $request->query('to'),
    'isPdf'=>true,
]);
return $pdf->download('Transactions_report.pdf');

}

public function fetchTransactions($request)
{
    $request->validate([
        'from' => 'nullable|date',
        'to'  => 'nullable|date|after_or_equal:from',
    ]);

    $query= StockTransaction::with('product')->latest();

    if($request->filled('from') && $request->filled('to')){
        $query->whereDate('created_at', '>=', $request->input('from'))
            ->whereDate('created_at', '<=', $request->input('to'));
    }

   return $transactions = $query->paginate(15);
}

}
