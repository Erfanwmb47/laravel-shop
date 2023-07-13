<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Recaptcha extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $clientkey;

    public function __construct()
    {
        $this->clientkey=config('google.recaptcha.GOOGLE_RECAPTCHA_SITE_KEY');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.recaptcha');
    }
}
