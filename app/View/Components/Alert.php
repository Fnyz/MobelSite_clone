<?php
 
namespace App\View\Components;
 
use Illuminate\View\Component;
use Illuminate\View\View;
 
class Alert extends Component
{
    /**
     * Create the component instance.
     */

     public string $type;
     public string $message;

    public function __construct($type = "info", $message = "")
    {
        $this->type = $type;
        $this->message = $message;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.alert', [
            "come" => 'feel the hit!'
        ]);
    }
}