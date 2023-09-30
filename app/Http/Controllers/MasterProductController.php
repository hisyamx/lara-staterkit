<?php

namespace App\Http\Controllers;

use App\DataTables\MasterProductDataTable;
use App\Models\MasterProduct;
use Illuminate\Http\Request;

use function Termwind\render;

class MasterProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MasterProductDataTable $dataTable)
    {
        // render data from datatables directory
        $product_number = product_number();
        return $dataTable->render('product.index', compact('product_number'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'expired_date' => 'required|date',
            'price' => 'required|min:1',
            'size' => 'required',
            'category' => 'required',
        ]);

        $raw = new MasterProduct();
        $raw->product_code = product_number();
        $raw->product_name = $request->product_name;
        $raw->expired_date = $request->expired_date;
        $raw->price = $request->price;
        $raw->size = $request->size;
        $raw->category = $request->category;
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
        $data = MasterProduct::findOrFail($id);
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
        $data = MasterProduct::findOrFail($id);
        if (!$data) {
            abort(404);
        }
        return response()->json(['result' => $data]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterProduct  $jobfamily
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'product_name' => 'required',
            'expired_date' => 'required|date',
            'price' => 'required|min:1',
            'size' => 'required',
            'category' => 'required',
        ]);

        $raw = MasterProduct::findOrFail($id);
        $raw->product_code = $request->product_code;
        $raw->product_name = $request->product_name;
        $raw->expired_date = $request->expired_date;
        $raw->price = $request->price;
        $raw->size = $request->size;
        $raw->category = $request->category;
        $raw->update();
        return response()->json(['success' => true, 'message' => 'Data Succesfully Saved.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterProduct  $jobfamily
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MasterProduct::findOrFail($id);
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
