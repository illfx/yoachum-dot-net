<?php
/**
 * Created by PhpStorm.
 * User: Stephen
 * Date: 3/8/18
 * Time: 3:44 PM
 */

namespace App\Http\Composers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class HeaderComposer
{

    public $navItems = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {

        $this->navItems = [
            ['active' => false, 'name' => 'Home', 'url' => '/'],
            ['active' => false, 'name' => 'Contact', 'url' => '/contact'],
        ];

        foreach($this->navItems as $key=>$item){
            $active = Route::is(strtolower($item['name']));
            $this->navItems[$key]['active'] = $active;
            if($active) break;
        }

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('navItems', $this->navItems);
    }

}