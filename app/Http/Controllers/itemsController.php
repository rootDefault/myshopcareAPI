<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
class itemsController extends Controller
{
    function getAllItems(){
        return Items::all();
    }
    function getItem($id){
        return Items::find($id);
    }
    function getItemByName($name){
        $result = Items::where('pname',$name)->get();
  // this is when you want to use like
       // $result= Items::where('pname','like','%'.$name.'%')->get();
        if(sizeof($result) == 0)
        {
            return "No match";
        }

        else
        {
            return $result;
        }
      

    }

    function setItem(Request $request){
        $item = new Items;
        $item->pname= $request->pname;
    $item->description= $request->description;
    $item->bprice= $request->bprice;
    $item->sprice= $request->sprice;
    $item->qty= $request->qty;
    $item->min_qty= $request->min_qty;

    $result =$item->save();
    if($result)
        return "Item saved";
        else
        return "failed";
    }

    function update(Request $request, $id){

        $item =$this->getItem($id);
        if($item==null)
        return "No matching ID";
        else{
        $item->pname= $request->pname;
    $item->description= $request->description;
    $item->bprice= $request->bprice;
    $item->sprice= $request->sprice;
    $item->qty= $request->qty;
    $item->min_qty= $request->min_qty;

    $result =$item->save();
        }
    if($result)
        return "Update Success";
        else
        return "Update Failed";
    }

    function delete($id){
        $item = Items::find($id);
        if($item!=null)
        $result=$item->delete();
        else
        return "Record doesn't exist";
        if($result)
        return "Item Deleted";
        else
        return "Delete Failed";
    }
    }

