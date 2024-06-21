<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteForm extends Component
{
    public $action;
    public $class;
    public $buttonText;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $buttonText = 'Delete', $class = '')
    {
        $this->action = $action;
        $this->buttonText = $buttonText;
        $this->class = trim($class);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.delete-form');
    }
}
