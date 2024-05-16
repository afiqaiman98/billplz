<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordGeneratorController extends Controller
{
    public function index()
    {
        return view('password-generator');
    }

    public function generatePassword(Request $request)
    {
        $length = $request->input('length', 12);
        $useLowerCase = $request->has('lowercase');
        $useUpperCase = $request->has('uppercase');
        $useNumbers = $request->has('numbers');
        $useSymbols = $request->has('symbols');

        // Ensure at least one character type is selected
        if (!$useLowerCase && !$useUpperCase && !$useNumbers && !$useSymbols) {
            return redirect()->route('password.generator')->with('error', 'Please select at least one character type.');
        }

        $chars = '';
        if ($useLowerCase) $chars .= 'abcdefghijklmnopqrstuvwxyz';
        if ($useUpperCase) $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($useNumbers) $chars .= '0123456789';
        if ($useSymbols) $chars .= '!#$%&()*+@^';

        $password = '';
        $charsLength = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[rand(0, $charsLength - 1)];
        }

        return view('password-generator')->with('password', $password);
    }
}
