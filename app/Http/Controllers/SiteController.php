<?php

namespace App\Http\Controllers;

use App\Repositories\MenuRepository;
use App\Repositories\RentBookRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    protected $m_rep;
    protected $b_rep;

    protected $template;
    protected $title;

    public $vars = [];

    public function __construct(MenuRepository $m_rep, RentBookRepository $b_rep)
    {
        $this->m_rep = $m_rep;
        $this->b_rep = $b_rep;
    }

    protected function render()
    {
        $menu = $this->getMenu();

        $navigation = view( '.navigation')->with('menu', $menu);
        $this->vars = Arr::add($this->vars, 'navigation', $navigation);

        $footer = view('.footer')->render();
        $this->vars = Arr::add($this->vars, 'footer', $footer);
        $this->vars = Arr::add($this->vars, 'title', $this->title);

        return view($this->template)->with($this->vars);
    }

    public function getMenu()
    {
        $menu = $this->m_rep->get('*', false, false, false);

        $mBuilder = \Menu::make('MyNav', function ($m) use ($menu) {

            foreach ($menu as $item) {
                $m->add($item->title, $item->path)->id($item->id);
            }
        });

        return $mBuilder;
    }

    public function getBooks()
    {
        $books = $this->b_rep->get('*', Config::get('settings.paginate'), true, true);
        return $books;
    }

}
