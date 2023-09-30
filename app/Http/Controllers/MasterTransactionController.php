<?php

namespace App\Http\Controllers;

use App\DataTables\MasterTransactionDataTable;
use App\Models\MasterProduct;
use App\Models\MasterTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Termwind\render;

class MasterTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MasterTransactionDataTable $dataTable)
    {
        // render data from datatables directory
        $product = DB::table('master_products')->select('id', 'product_name')->where('expired_date', '>=', date('Y-m-d'))->get();
        $transaction_number = transaction_number();
        return $dataTable->render('transaction.index', compact('product', 'transaction_number'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'transaction_name' => 'required|min:1',
            'order_date' => 'required|date',
            'product_id' => 'required',
            'amount' => 'required',
        ]);

        $raw = new MasterTransaction();
        $raw->order_date = $request->order_date;
        $raw->order_number = transaction_number();
        $raw->transaction_name = $request->transaction_name;
        $raw->product_id = $request->product_id;
        $raw->amount = $request->amount;
        if ($raw->product_id) {
            $product = MasterProduct::where('id', $request->product_id)->first();
            $total = ($request->amount) * ($product->price);
        }
        $raw->total_price = $total;
        // var_dump($raw->total_price);die;
        $raw->save();
        return response()->json(['success' => true, 'message' => 'Data Succesfully Saved.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterSubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MasterTransaction::findOrFail($id);
        if (!$data) {
            abort(404);
        }
        return response()->json(['result' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterSubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MasterTransaction::findOrFail($id);
        if (!$data) {
            abort(404);
        }
        return response()->json(['result' => $data]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterTransaction  $jobfamily
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'order_number' => 'required',
            'transaction_name' => 'required|min:1',
            'order_date' => 'required|date',
            'product_id' => 'required',
            'amount' => 'required',
        ]);

        $raw = MasterTransaction::findOrFail($id);
        $raw->order_date = $request->order_date;
        $raw->order_number = $request->order_number;
        $raw->transaction_name = $request->transaction_name;
        $raw->product_id = $request->product_id;
        $raw->amount = $request->amount;
        if ($raw->product_id) {
            $product = MasterProduct::where('id', $request->product_id)->first();
            $total = ($request->amount) * ($product->price);
        }
        // var_dump($total);
        $raw->total_price = $total;
        $raw->update();
        return response()->json(['success' => true, 'message' => 'Data Succesfully Saved.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterTransaction  $jobfamily
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MasterTransaction::findOrFail($id);
        try {
            if ($data->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Succesfully Deleted!',
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'error' => true,
                'message' => array('Cant Delete Data', $th->getMessage())
            ]);
        }
    }
}
