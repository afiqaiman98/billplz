<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $order = Order::create($request->only(['customer_name', 'total_amount']));
            $invoiceData = [
                'order_id' => $order->id,
                'invoice_number' => 'INV-' . uniqid(),
                'amount' => $request->total_amount,
            ];
            $invoice = Invoice::create($invoiceData);

            DB::commit();
            event(new \App\Events\OrderAndInvoiceCreated($order, $invoice));

            return redirect()->route('orders.index')->with('success', 'Order and Invoice created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        try {
            $order = Order::findOrFail($id);
            $order->update($request->only(['customer_name', 'total_amount']));

            $invoiceData = [
                'amount' => $request->total_amount,
            ];
            Invoice::where('order_id', $id)->update($invoiceData);

            DB::commit();
            event(new \App\Events\OrderAndInvoiceCreated($order, $order->invoices->first()));

            return redirect()->route('orders.index')->with('success', 'Order and Invoice updated successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
