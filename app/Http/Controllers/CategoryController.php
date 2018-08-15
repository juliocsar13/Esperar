<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    private $oCategory;

    public function __construct()
    {
        $this->oCategory = new Category();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cCategories = $this->oCategory
            ->getAllCategory();

        return view('backend.category.index', compact('cCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
        ]);

        if($validator->passes())
        {
            $oCategory = Category::create($request->all());

            return redirect()->route('categoria.index')
                ->with('status', TRUE);
        }
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
        $oCategories = $this 
            ->oCategory
            ->getCategoryByCate($id);

        return view('backend.category.edit', compact('oCategories'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
        ]);

        if($validator->passes())
        {
            $oCategory = Category::updateOrCreate(['cate_id' => $id], $request->all());

            return redirect()->route('categoria.index')
                ->with('status', TRUE);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $oCategory = $this
                ->oCategory
                ->getCategoryByCate($id);

            $oCategory->delete();

            return redirect()
                ->route('categoria.index')
                ->with('delete', TRUE);

        } 
        catch (Exception $e)
        {
            return "Error, comunicarse con el Administrador - ".$e->getMessage();
        }
    }
}
