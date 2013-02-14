<?php
/**
 * /UpMvc/Controller/Manual.php
 * @package UpMvc2
 */

namespace UpMvc\Controller;

use UpMvc;

/**
 * Controller för Up MVC's dokumentation
 *
 * @author Ola Waljefors
 * @package UpMvc2
 * @version 2013.2.1
 * @link https://github.com/saurid/UpMvc2
 * @link http://www.phpportalen.net/viewtopic.php?t=116968
 */
class Manual
{
    /**
     * Vidarebefodra till att visa manual som default
     */
    public function index()
    {
        $this->visa();
    }

    /**
     * Visa vald del av manualen
     * Om inget kapitel är valt, sätts "inledning" som standard
     *
     * @param string $page Sträng med namnet på kapitel
     */
    public function visa($page = 'inledning')
    {
        $c = UpMvc\Container::get();
        $c->lipsum = new \UpMVC\Model\Lipsum();
        $c->view->set('site_path', UpMvc\Container::get()->site_path);

        $pagination = new UpMvc\Pagination(99, $c->request->get('page', 1), 20);

        switch ($page)
        {
            case 'filstruktur':
                $c->view
                    ->set('title',  'Filstruktur - Up MVC')
                    ->set('content', $c->view->render('UpMvc/View/filstruktur.php'));
                break;

            case 'controllers':
                $c->view
                    ->set('title',  'Controllers & actions - Up MVC')
                    ->set('content', $c->view->render('UpMvc/View/controllers.php'));
                break;

            case 'view':
                $c->view
                    ->set('title',  'Views - Up MVC')
                    ->set('content', $c->view->render('UpMvc/View/view.php'));
                break;

            case 'model':
                $c->view
                    ->set('title',  'Models - Up MVC')
                    ->set('lipsum',  $c->lipsum->get())
                    ->set('content', $c->view->render('UpMvc/View/model.php'));
                break;

            case 'container':
                $c->view
                    ->set('title',  'Servicecontainern - Up MVC')
                    ->set('content', $c->view->render('UpMvc/View/container.php'));
                break;

            case 'moduler':
                $c->view
                    ->set('title',  'Moduler - Up MVC')
                    ->set('content', $c->view->render('UpMvc/View/moduler.php'));
                break;

            case 'request':
                $c->view
                    ->set('title',  'Requestobjektet - Up MVC')
                    ->set('content', $c->view->render('UpMvc/View/request.php'));
                break;

            case 'siduppdelning':
                $c->view
                    ->set('title',  'Siduppdelning / pagination - Up MVC')
                    ->set('page',    $pagination)
                    ->set('content', $c->view->render('UpMvc/View/siduppdelning.php'));
                break;

            case 'detaljer':
                $c->view
                    ->set('title',  'UML-diagram och tidslinje - Up MVC')
                    ->set('content', $c->view->render('UpMvc/View/detaljer.php'));
                break;

            default:
                $c->view
                    ->set('title',  'Inledning - Up MVC')
                    ->set('content', $c->view->render('UpMvc/View/inledning.php'));
                break;
        }

        echo $c->view->render('UpMvc/View/layout.php');
    }
}
