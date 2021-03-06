<?php
/**
 * /Documentation/Controller/Index.php
 *
 * @package UpMvc2\Documentation
 */

namespace Documentation\Controller;

use UpMvc;
use UpMvc\Container as Up;

/**
 * Controller för Up MVC's dokumentation.
 *
 * @package UpMvc2\Documentation
 * @author  Ola Waljefors
 * @version 2013.12.2
 * @link    https://github.com/saurid/UpMvc2
 * @link    http://www.phpportalen.net/viewtopic.php?t=116968
 */
class Index
{
    /** Vidarebefodra till att visa manual som default */
    public function index()
    {
        $this->visa();
    }

    /**
     * Visa vald del av manualen.
     *
     * Om inget kapitel är valt, sätts "inledning" som standard.
     *
     * @param string $page Sträng med namnet på kapitel
     */
    public function visa($page = 'inledning')
    {
        // Sätt ny standardsökväg för mallar
        Up::view()->setPath('Documentation/View/');

        // Vilken sida ska visas?
        switch ($page)
        {
            // Om route är /Documentation/Index/visa/filstruktur
            case 'filstruktur':
                Up::view()
                    // Sätt HTML-titel för användning i layout-mallen
                    ->set('title', 'Filstruktur - Up MVC')
                    // Rendrera sidans innehåll och lagra i variabeln content
                    ->set('content', Up::view()->render('filstruktur.php'));
                break;
            case 'controllers':
                Up::view()
                    ->set('title', 'Controllers & actions - Up MVC')
                    ->set('content', Up::view()->render('controllers.php'));
                break;
            case 'view':
                Up::view()
                    ->set('title', 'Views - Up MVC')
                    ->set('content', Up::view()->render('view.php'));
                break;
            case 'model':
                Up::set('lipsum', new \Documentation\Model\Lipsum());
                Up::view()
                    ->set('title', 'Models - Up MVC')
                    ->set('lipsum', Up::lipsum()->get())
                    ->set('content', Up::view()->render('model.php'));
                break;
            case 'container':
                Up::view()
                    ->set('title', 'Servicecontainern - Up MVC')
                    ->set('content', Up::view()->render('container.php'));
                break;
            case 'moduler':
                Up::view()
                    ->set('title', 'Moduler - Up MVC')
                    ->set('content', Up::view()->render('moduler.php'));
                break;
            case 'rattigheter':
                Up::view()
                    ->set('title', 'Rättigheter - Up MVC')
                    ->set('content', Up::view()->render('rattigheter.php'));
                break;
            case 'komponenter':
                Up::view()
                    ->set('title', 'Tredjepartskomponenter - Up MVC')
                    ->set('content', Up::view()->render('komponenter.php'));
                break;
            case 'request':
                Up::view()
                    ->set('title', 'Requestobjektet - Up MVC')
                    ->set('content', Up::view()->render('request.php'));
                break;
            case 'cache':
                Up::view()
                    ->set('title', 'Cachning - Up MVC')
                    ->set('content', Up::view()->render('cache.php'));
                break;
            case 'siduppdelning':
                $pagination = Up::pagination(99, Up::request()->get('page', 1), 20);
                Up::view()
                    ->set('title', 'Siduppdelning / pagination - Up MVC')
                    ->set('page', $pagination)
                    ->set('content', Up::view()->render('siduppdelning.php'));
                break;
            case 'detaljer':
                Up::view()
                    ->set('title', 'UML-diagram och tidslinje - Up MVC')
                    ->set('content', Up::view()->render('detaljer.php'));
                break;
            default:
                Up::view()
                    ->set('title', 'Inledning - Up MVC')
                    ->set('content', Up::view()->render('inledning.php'));
                break;
        }

        // Rendrera komplett sida med hjälp av layout-mallen
        echo Up::view()->render('layout.php');
    }
}
