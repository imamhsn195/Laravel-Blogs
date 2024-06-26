<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class Anchor extends Component
{

    public $href;
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href, $text)
    {
        $this->href = $href;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.anchor');
    }
}
