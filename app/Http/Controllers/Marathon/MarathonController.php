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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|min:1|max:100',
            'starts' => 'required|date_format:"d/m/Y H:i"|before_or_equal:ends',
            'ends' => 'required|date_format:"d/m/Y H:i"|before_or_equal:date',
            'date' => 'required|date_format:"d/m/Y H:i"',
            'description' => 'required|string'
        ];
        $this->validate($request, $rules);
        $marathon = new Marathon($request->all());
        if ($marathon->save()) {
            $request->session()->flash('created_successful', 'O recurso foi criado com sucesso');
            // Sucesso! Redireciona para a página de visualização do álbum.
            return redirect()->route('marathon.show', $marathon->id);
        }
        $request->session()->flash('created_unsuccessful', 'Não foi possível salvar o recurso');
        // Fracasso! Redireciona de volta.
        return redirect()->back();
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
     * @param int $marathonIdentification
     * @return \Illuminate\Http\Response
     */
    public function edit($marathonIdentification)
    {
        $marathon = Marathon::findOrFail($marathonIdentification);
        return view('marathon.edit')->with('marathon', $marathon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $marathonIdentification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $marathonIdentification)
    {
        $rules = [
            'title' => 'required|string|min:1|max:100',
            'starts' => 'required|date_format:"d/m/Y H:i"|before_or_equal:ends',
            'ends' => 'required|date_format:"d/m/Y H:i"|before_or_equal:date',
            'date' => 'required|date_format:"d/m/Y H:i"',
            'description' => 'required|string'
        ];
        $this->validate($request, $rules);
        $marathon = Marathon::findOrFail($marathonIdentification);
        if ($marathon->update($request->all())) {
            $request->session()->flash('updated_successful', 'O recurso foi atualizado com sucesso');
            // Sucesso! Redireciona para a página de visualização do álbum.
            return redirect()->back();
        }
        $request->session()->flash('updated_unsuccessful', 'Não foi possível atualizar o recurso');
        // Fracasso! Redireciona de volta.
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $marathonIdentification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $marathonIdentification)
    {
        $marathon = Marathon::findOrFail($marathonIdentification);
        // Atenção! A maratona não pode ser removida se existir imagens, staff e times.

        // Não permite a remoção se existir imagens
        if ($marathon->images->count()) {
            $request->session()
                ->flash('deleted_unsuccessful', 'Ops! Você não pode remover sem antes remover todas as imagens ...');
            return redirect()->back();
        }

        if ($marathon->delete()) {
            $request->session()->flash('deleted_successful', 'O recurso foi removido');
            return redirect()->route('marathon.index');
        }
        $request->session()->flash('deleted_unsuccessful', 'Não foi possível remover o recurso');
        return redirect()->route('marathon.index');

    }
}
