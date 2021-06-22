<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;;
use App\Models\KorisnikModel;


/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller {

    /**
     * Instance of the main Request object.
     *
     * @var IncomingRequest|CLIRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['url', 'form'];

    /**
     * Constructor.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param LoggerInterface   $logger
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        $this->session = session();
        if (!$this->session->get('controller')) {
            $this->session->set('controller', 'Gost');
        }
    }
 
    public function logout() {
        $this->session->destroy();
        return redirect()->to(site_url());
    }

    // prikaz profila korisnika ciji smo id prosledili 
	public function profil($idKorisnika=null){
        // ako pozovemo bez parametara
        if ($idKorisnika==null) return redirect()->to(site_url('/'));
        // ako pokusamo da pregledamo profil korisnika ciji id nije u bazi 
        $korisnikModel=new KorisnikModel();
        $korisnik = $korisnikModel->find($idKorisnika);
        if ($korisnik == null) {
            return redirect()->to(site_url('/'));
        }
		echo view("profil", ['idKorisnikaCijiProfilGledamo'=>$idKorisnika]);
			return;
	}
}
