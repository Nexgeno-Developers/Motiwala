<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function index() {
        return view('backend.pages.transaction.index');
    }

    public function getData(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowperpage = $request->get('length');
        $order = $request->get('order')[0]['column'];
        $dir = $request->get('order')[0]['dir'];
    
        // Columns
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'mobile no',
            4 => 'status',
            5 => 'created_at'
        );
    
        // Total records
        $totalRecords = Transaction::count();
    
        // Filtered records
        $query = Transaction::select('*');
        $query->where('payment_status','paid');
        if (!empty($searchValue)) {
            $query->where(function($q) use ($searchValue) {
                $q->where('payment_id', 'like', "%$searchValue%")
                    ->orWhere('payment_amount', 'like', "%$searchValue%");
            });
        }
    
        // Filter by additional form parameters
        $name = $request->input('name');
        if (!empty($name)) {
            $query->where('user_id',$name);
        }

        $pay_id  = $request->input('pay_id');
        if (!empty($pay_id)) {
            $query->where('payment_id', 'like', "%$pay_id%");
        }
    
        $pay_amount = $request->input('pay_amount');
        if (!empty($pay_amount)) {
            $query->where('payment_amount', 'like', "%$pay_amount%");
        }
    
        // $status = $request->input('status');
        // if ($status != '') {
        //     $query->where('status', $status);
        // }
    
        // Get filtered count
        $totalFiltered = $query->count();
    
        // Order
        $query->orderBy($columns[$order], $dir);
    
        // Get records with pagination
        $records = $query->offset($start)
                        ->limit($rowperpage)
                        ->get();
    
        // Prepare data
        $data = [];
        $i = 1;
        foreach ($records as $row) {

            $user_name = DB::table('users')->where('id', $row->user_id )->get(['first_name','last_name', 'fullname'])->first();

            // $user_name = $user_name->first_name.' '.$user_name->last_name;
            $user_name = $user_name->fullname;

            $installment_no = DB::table('redemption_items')->where('transaction_id',$row->id)->value('installment_no');


            if ($row->payment_type == "payu") {
                $type = 'PayU';
            } elseif ($row->payment_type == "UPI") {
                $type = 'UPI';
            } elseif ($row->payment_type == "cashpay") {
                $type = 'Cash Pay';
            }

            $nestedData = [
                'id' => $i++,
                'pay_id' => $row->payment_id,
                'name' => $user_name,
                'installment' => $installment_no,
                'amount' => $row->payment_amount,
                'type' => $type,
                'status' => $row->payment_status,
                'created_at' => $row->created_at->format('Y-m-d H:i:s'),
            ];
    
            $data[] = $nestedData;
        }
    
        // JSON response
        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => intval($totalRecords),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
    
        return response()->json($response);
    
        //return response()->json($json_data);
    }

  

    

}
