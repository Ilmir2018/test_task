<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Repositories\MenuRepositories;
use App\Repositories\MenuRepository;
use App\Repositories\RentBookRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class IndexController extends SiteController
{

    public function __construct(MenuRepository $m_rep, RentBookRepository $b_rep)
    {
        parent::__construct($m_rep, $b_rep);
    }

    private $validatorRules = [
        'card_number' => ['required', 'string', 'max:255'],
        'card_valid_date' => ['required', 'string', 'max:255'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'Главная';

        $this->template = '.main';

        $books = $this->getBooks();

        $content = view('.main_content')->with('books', $books)->render();
        $this->vars = Arr::add($this->vars, 'content', $content);

       return $this->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->title = 'Создание новой аренды';

        $this->template = '.create_new';

        $books = $this->getBooks();

        $content = view('.form_content')->with('books', $books)->render();
        $this->vars = Arr::add($this->vars, 'content', $content);

        return $this->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->b_rep->addBook($request);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/')->with($result);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
