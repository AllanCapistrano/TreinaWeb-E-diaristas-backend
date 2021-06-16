<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiaristaRequest;
use App\Models\Diarista;
use App\Services\ViaCEP;
use Illuminate\Http\Request;

class DiaristaController extends Controller
{
    public function __construct(
        protected ViaCEP $viaCEP
    )
    {
    }

    /* Isso equivale a:
        protected ViaCEP $viaCEP;
        
        public function __construct(ViaCEP $viaCEP)
        {
            $this->viaCEP = $viaCEP;
        }
    */

    /**
     * Listagem de diaristas.
     *
     * @return void
     */
    public function index()
    {
        $diaristas = Diarista::get();

        return view('index', [
            'diaristas' => $diaristas
        ]);
    }

    /**
     * Mostra s tela de criação de diaristas.
     *
     * @return void
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Cria uma nova diarista.
     *
     * @param DiaristaRequest $request
     * @return void
     */
    public function store(DiaristaRequest $request)
    {
        $dados = $request->except('_token');
        $dados['foto_usuario'] = $request->foto_usuario->store('public');

        $dados['cpf'] = str_replace(['.', '-'], '', $dados['cpf']);
        $dados['cep'] = str_replace('-', '', $dados['cep']);
        $dados['telefone'] = str_replace(['(', ')', ' ', '-'], '', $dados['telefone']);

        /*Buscando o código do IBGE através do CEP digitado e salvando no BD. */
        $dados['codigo_ibge'] = $this->viaCEP->buscar($dados['cep'])['ibge'];
        
        Diarista::create($dados);

        return redirect()->route('diaristas.index');
    }

    /**
     * Mosta a tela de edição de uma diarista existente.
     *
     * @param integer $id
     * @return void
     */
    public function edit(int $id)
    {
        $diarista = Diarista::findOrFail($id);

        return view('edit', [
            'diarista' => $diarista
        ]);
    }

    /**
     * Atualiza as informações de uma diarista.
     *
     * @param DiaristaRequest $request
     * @param integer $id
     * @return void
     */
    public function update(DiaristaRequest $request, int $id)
    {
        $diarista = Diarista::findOrFail($id);

        $dados = $request->except([
            '_token',
            '_method'
        ]);

        if($request->hasFile('foto_usuario')) {
            $dados['foto_usuario'] = $request->foto_usuario->store('public');
        }

        $dados['cpf'] = str_replace(['.', '-'], '', $dados['cpf']);
        $dados['cep'] = str_replace('-', '', $dados['cep']);
        $dados['telefone'] = str_replace(['(', ')', ' ', '-'], '', $dados['telefone']);

        /*Buscando o código do IBGE através do CEP digitado e salvando no BD. */
        $dados['codigo_ibge'] = $this->viaCEP->buscar($dados['cep'])['ibge'];

        $diarista->update($dados);

        return redirect()->route('diaristas.index');
    }

    /**
     * Apaga uma diarista.
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        $diarista = Diarista::findOrFail($id);

        $diarista->delete();

        return redirect()->route('diaristas.index');
    }
}
