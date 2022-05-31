<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;

class salesController extends Controller
{
    function getSales(){
        return Sales::all();
        // return "works";
    }
    function setSale(Request $request){
        if($request==null)
        return "Null request";
        else{
        $sale = new Sales;
        $sale->sname= $request->sname;
    $sale->cname= $request->cname;
    $sale->cphone= $request->cphone;
    $sale->pname= $request->pname;
    $sale->qty= $request->qty;
    $sale->bprice= $request->bprice;
    $sale->sprice= $request->sprice;
    $sale->to_be_payed= $request->to_be_payed;
    $sale->amount= $request->amount;
    $sale->balance= $request->balance;
    
    $result =$sale->save();
    if($result)
        return "Sale saved";
        else
        return "failed";
        }
    }
    function update(Request $request, $id){

        $sale =Sales::find($id);
        if($sale==null)
        return "No matching ID";
        else{
            $sale->sname= $request->sname;
            $sale->cname= $request->cname;
            $sale->cphone= $request->cphone;
            $sale->pname= $request->pname;
            $sale->qty= $request->qty;
            $sale->bprice= $request->bprice;
            $sale->sprice= $request->sprice;
            $sale->to_be_payed= $request->to_be_payed;
            $sale->amount= $request->amount;
            $sale->balance= $request->balance;

    $result =$sale->save();
        }
    if($result)
        return "Update Success";
        else
        return "Update Failed";
    }

    function delete($id){
        $sale = Sales::find($id);
        if($sale!=null)
        $result=$sale->delete();
        else
        return "Record doesn't exist";
        if($result)
        return "sale Deleted";
        else
        return "Delete Failed";
    }

}
