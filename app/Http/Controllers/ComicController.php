<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComicRequest;
use App\Models\Comic;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::orderBy('id','desc')->paginate(7);
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComicRequest $request)
    {
        $request->validate(
            // [
            //     'title' => 'required|max:80|min:2',
            //     'price' => 'required|decimal:2',
            //     'series' => 'required|max:80|min:2',
            //     'sale_date' => 'required|date',
            //     'type' => 'required|max:30|min:2',
            // ],

            // [
            //     'title.required' => 'Il Titolo è un campo obbligatorio',
            //     'title.max' => 'Il Titolo deve avere massimo :max caratteri',
            //     'title.min' => 'Il Titolo deve avere minimo :min caratteri',
            //     'price.required' => 'Il Prezzo è un campo obbligatorio',
            //     'price.decimal' => 'Il Prezzo deve avere un numero decimale con 2 cifre dopo la virgola',
            //     'series.required' => 'La Serie è un campo obbligatorio' ,
            //     'series.max' => 'La Serie deve avere massimo :max caratteri' ,
            //     'series.min' => 'La Serie deve avere minimo :min caratteri' ,
            //     'sale_date.required' => 'La Data d\'uscita è un campo obbligatorio ' ,
            //     'sale_date.max' => 'La Data d\'uscita deve avere massimo :max caratteri' ,
            //     'sale_date.min' => 'La Data d\'uscita deve avere minimo :min caratteri' ,
            //     'type.required' => 'Il Tipo è un campo obbligatorio' ,
            //     'type.max' => 'Il Tipo deve avere massimo :max caratteri' ,
            //     'type.min' => 'Il Tipo deve avere minimo :min caratteri' ,
            // ]
        );

        $data = $request->all();

        $new_comic = new Comic();

        // $new_comic->title = $data['title'];
        // $new_comic->slug = Comic::generateSlug($new_comic->title);
        // $new_comic->description = $data['description'];
        // $new_comic->thumb = $data['thumb'];
        // $new_comic->price = $data['price'];
        // $new_comic->series = $data['series'];
        // $new_comic->sale_date = $data['sale_date'];
        // $new_comic->type = $data['type'];
        $data['slug'] = Comic::generateSlug($data['title']);
        $new_comic->fill($data);
        $new_comic->save();

        return redirect(route('comics.show', $new_comic));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
       return view('comics.show', compact('comic'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        // dd($comic->id);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(ComicRequest $request, Comic $comic)
    {
        $data = $request->all();

        if($data['title'] != $comic->title){
            $data['slug'] = Comic::generateSlug($data['title']);
        }else{
            $data['slug'] = $comic->slug;
        }

        $comic->update($data);

        return redirect(route('comics.show', $comic));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect(route('comics.index'))->with('deleted', "$comic->title è stato eliminato con successo");
    }
}
