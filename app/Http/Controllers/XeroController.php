<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Dcblogdev\Xero\Facades\Xero;

class XeroController extends Controller
{
    public function index(){
        return Xero::connect();
    }
   public function result(){
    $output= Xero::get('Invoices');
    
 $d=($output['body']['Invoices']);
 
$dat='MAI-';
$collection=collect($d);
$filtered = $collection->filter(function ($value, $key) use($dat) {
   $dr= stristr($value['InvoiceNumber'], $dat);
  return $dr;
});
$filtered=$filtered->all();
 return view('Purchase',['out'=>$filtered]);
  }

}
