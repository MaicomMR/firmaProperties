<?php

namespace App\Http\Controllers;

use App\BillOfSale;
use App\Seller;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billOfSales = BillOfSale::all();

        return view('admin.billOfSale.billOfSaleIndex', compact('billOfSales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellers = Seller::all();

        return view('admin.billOfSale.billOfSaleAdd', compact('sellers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO: ADICIONAR VALIDATOR AOS CAMPOS

        $billOfSale = new BillOfSale;


        $billOfSale->billNumber = $request->billNumber;
        $billOfSale->OnlineAcessCode = $request->billAcessKey;
        $billOfSale->totalValue = $request->totalValue;
        $billOfSale->billPDFPath = $request->billPDFPath;
        $billOfSale->billPhotoPath = $request->billPhotoPath;
        $billOfSale->seller_id = $request->seller_id;
        $billOfSale->totalValue = $request->totalValue;

        $billOfSale->save();

        //return redirect('employee/index')->with('message', 'Dados do colaborador '. $employee->name . ' editados com sucesso.');
        return redirect('bill-of-sale/index')->with('message', 'Nota fiscal adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
