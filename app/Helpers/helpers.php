<?php

use Illuminate\Support\Facades\DB;

function product_number()
{
    $model = DB::table('master_products');
    $code = $model->max('id');
    $coderow = $model->count();

    $getnumber = '';
    // $code = str_replace("PGJ", "", $code);
    $incrementcode = (int) $code + 1;

    //manipulation data for incrementdata
    if (strlen($incrementcode) == 1) {
        $getnumber = '00000' . $incrementcode;
    } elseif (strlen($incrementcode) == 2) {
        $getnumber = '0000' . $incrementcode;
    } elseif (strlen($incrementcode == 3)) {
        $getnumber = '000' . $incrementcode;
    } elseif (strlen($incrementcode) == 4) {
        $getnumber = '00' . $incrementcode;
    } elseif (strlen($incrementcode) == 5) {
        $getnumber = '0' . $incrementcode;
    } else {
        $getnumber = $incrementcode;
    }
    $wo_number = $getnumber . '-PROD-' . date('Y');
    return $wo_number;
}

function transaction_number()
{
    $model = DB::table('master_transactions');
    $code = $model->max('id');
    $coderow = $model->count();

    $getnumber = '';
    // $code = str_replace("PGJ", "", $code);
    $incrementcode = (int) $code + 1;

    //manipulation data for incrementdata
    if (strlen($incrementcode) == 1) {
        $getnumber = '00000' . $incrementcode;
    } elseif (strlen($incrementcode) == 2) {
        $getnumber = '0000' . $incrementcode;
    } elseif (strlen($incrementcode == 3)) {
        $getnumber = '000' . $incrementcode;
    } elseif (strlen($incrementcode) == 4) {
        $getnumber = '00' . $incrementcode;
    } elseif (strlen($incrementcode) == 5) {
        $getnumber = '0' . $incrementcode;
    } else {
        $getnumber = $incrementcode;
    }
    $wo_number = $getnumber . '-ORDR-' . date('Y');
    return $wo_number;
}
