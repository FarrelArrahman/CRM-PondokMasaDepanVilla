<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $type;
    public $color;
    public $title;
    public $text;
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $color, $title, $text, $description)
    {
        $this->type = $type;
        $this->color = $color;
        $this->title = $title;
        $this->text = $text;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
