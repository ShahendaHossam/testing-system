<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewGeneratorController extends Controller
{
    public function getTables()
    {
        $tables = DB::select('SHOW TABLES');

        return view('viewgenerator.gettables',compact('tables'));
    }
    public function create($table)
    {
        $tablecolumns = DB::getSchemaBuilder()->getColumnListing($table);
        return view('viewgenerator.create', compact('tablecolumns','table'));
    }
    public function createlive($table)
    {
        $tablecolumns = DB::getSchemaBuilder()->getColumnListing($table);
        return view('viewgenerator.createlive', compact('tablecolumns','table'));
    }
    public function edit($table)
    {
        $tablecolumns = DB::getSchemaBuilder()->getColumnListing($table);
        return view('viewgenerator.edit', compact('tablecolumns','table'));
    }
    public function index($table)
    {
        $tablecolumns = DB::getSchemaBuilder()->getColumnListing($table);
        return view('viewgenerator.index', compact('tablecolumns','table'));
    }
    public function model($table)
    {
        $tablecolumns = DB::getSchemaBuilder()->getColumnListing($table);
        return view('viewgenerator.model', compact('tablecolumns','table'));
    }
}
