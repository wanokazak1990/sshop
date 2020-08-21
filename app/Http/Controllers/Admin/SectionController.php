<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function index()
    {
    	$sections = Section::get();
    	dump($sections);
    }

    public function create()
    {
    	echo "Section Create";
    }

    public function store(Request $request)
    {
    	echo "Section Store";
    }

    public function edit($id)
    {
    	echo "Section edit";
    }

    public function update($id, Request $request)
    {
    	echo "Section update";
    }

    public function destroy($id)
    {
    	echo "Section destroy";
    }

    public function show($id)
    {
    	echo "Section Show";
    }
}
