<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function index(Request $request) {
        Payment::where("id", $request->payment_id)->update(["status" => "ERROR"]);
        return view("pages.error");
    }
}
