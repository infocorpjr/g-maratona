<?php

namespace App\Http\Controllers\Marathon;

use App\Models\Marathon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarathonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('q', false)) {
            $search = request('q');
            $marathons = Marathon::where('title', 'like', '%' . $search . '%')
                ->orWhere('date', 'like', '%' . $search . '%')
                ->orderBy('date', 'desc')
                ->paginate(3);
        } else {
            $marathons = Marathon::orderBy('date', 'desc')->paginate(3);
        }

        return view('marathon.index')
            ->with('marathons', $marathons);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $marathonIdentification
     * @return \Illuminate\Http\Response
     */
    public function show($marathonIdentification)
    {
        $marathon = Marathon::with('images')
            ->findOrFail($marathonIdentification);

        return view('marathon.show')
            ->with('marathon', $marathon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
