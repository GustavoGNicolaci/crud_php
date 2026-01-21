<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index() {
        return "index de produtos";
    }

    public function show($id = 0) {
        return "show produto id: " . $id;
    }
}
