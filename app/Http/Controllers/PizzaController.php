<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function showOrderForm()
    {
        return view('pizza.order');
    }

    public function processOrder(Request $request)
    {
        // Retrieve the arrays of sizes and toppings
        $sizes = $request->input('size');
        $toppings = $request->input('toppings');

        $total = 0;

        // Loop through each pizza order to calculate the total cost
        foreach ($sizes as $index => $size) {
            if ($size === 'small') {
                $total += 15;
            } elseif ($size === 'medium') {
                $total += 22;
            } elseif ($size === 'large') {
                $total += 30;
            }

            if (!empty($toppings[$index])) {
                if (in_array('pepperoni', $toppings[$index])) {
                    $total += ($size === 'small') ? 3 : 5;
                }
                if (in_array('extra_cheese', $toppings[$index])) {
                    $total += 6;
                }
            }
        }

        return view('pizza.order_confirmation', ['total' => $total]);
    }
}
