<?php
/**
 * Created by PhpStorm.
 * User: Stephen
 * Date: 3/8/18
 * Time: 3:44 PM
 */

namespace App\Http\Composers;

use App\Library\Navigation\Link;
use App\Library\Navigation\Dropdown;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class HeaderComposer
{

    public $navItems = [];
    public $items = [];

    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->items = [
//            new Link('Blog', '/blog'),
            new Dropdown('Math', [
                new Link('Flash Cards', url('/math/flash-cards')),
                new Link('Times Table', url('/math/times-table')),
                new Link('Formulas', url('/math/formulas')),
            ]),
            new Link('Contact', '/contact'),
        ];

        foreach($this->items as $item) {

            if (get_class($item) === 'App\Library\Navigation\Link') {
//                dd(Route::current());

                $active = Route::is(substr($item->getHref(), 1));
                $item->setActive($active);
                if($active) break;
            } elseif (get_class($item) === 'App\Library\Navigation\Dropdown') {
                foreach ($item->getMenuItems() as $subItem) {
//                    dd(Route::current());
//                    dd(Route::current()->getName());

//                    $active = Route::current()->getName() === (substr($subItem->getHref(), (strrpos($subItem->getHref(), '/')+1))) ? true : false;
                    $active = Route::current()->getName() === (substr($subItem->getHref(), (strrpos($subItem->getHref(), '/')+1))) ? true : false;
                    $item->setActive($active);
                    $subItem->setActive($active);
                    if($active) break(2);
                }
            }
        }

        $this->navItemsArray();
    }

    public function navItemsClass(): array {

    }

    public function navItemsArray(): void {
        $this->navItems = [
            ['active' => false, 'name' => 'Blog', 'url' => '/blog'],
            ['active' => false, 'name' => 'Math', 'url' => '/math'],
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
        $view->with('navItems', $this->navItems)->with('items', $this->items);
    }

}