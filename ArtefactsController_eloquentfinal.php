<?php

namespace App\Http\Controllers;

use App\Artefact;
use App\Tag;

use Illuminate\Http\Request;

class ArtefactsController extends Controller
{
    
    public function index ()
    {
        if(request('tag')) {
            $artefacts = Tag::where('name', request('tag'))->firstOrFail()->artefacts;
        }else {
            $artefacts = Artefact::latest()->get();
        }
        
        return view('artefacts.index', ['artefacts'=> $artefacts]);
    }

    public function show (Artefact $artefact)
    {
       
        return view('artefacts.show', ['artefact'=> $artefact]);
    }

    public function create()
    {
        return view('artefacts.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store()
    {
        $this->validateArtefact();
        $artefact = new Artefact(request(['title', 'excerpt', 'body']));
        $artefact->user_id = 1; 
        $artefact->save();
        
        $artefact->tags()->attach(request('tags'));
        
        return redirect(route('artefacts.index'));

    }
    
    public function edit(Artefact $artefact)
    {

        return view('artefacts.edit', compact('artefact'));
        
    }

    public function update(Artefact $artefact)
    {

        $artefact->update($this->validateArtefact());
            
        return redirect($artefact.path());

    }
    protected function validateArtefact()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}