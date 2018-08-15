<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Lifestyle;

class LifestyleController extends Controller
{
    private $oLifestyle;

    public function __construct()
    {
        $this->oLifestyle = new Lifestyle();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cLifestyle = $this->oLifestyle
            ->getAllLifestyle();

        return view('backend.lifestyle.index', compact('cLifestyle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            $oLifestyle = Lifestyle::create($request->all());

            return redirect()->route('lifestyle.index')
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
        $oLifestyle = $this 
            ->oLifestyle
            ->getLifestyleByLife($id);

        return view('backend.lifestyle.edit', compact('oLifestyle'));
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
            $oLifestyle = Lifestyle::updateOrCreate(['life_id' => $id], $request->all());

            return redirect()->route('lifestyle.index')
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
            $oLifestyle = $this
                ->oLifestyle
                ->getLifestyleByLife($id);

            $oLifestyle->delete();

            return redirect()
                ->route('lifestyle.index')
                ->with('delete', TRUE);

        } 
        catch (Exception $e)
        {
            return "Error, comunicarse con el Administrador - ".$e->getMessage();
        }
    }
}
