<?php
/**
 *COPYRIGHT (C) 2016 Tyler Jones. All Rights Reserved.
 * ImageRatingController.php is the controller for the main Image Rating System screen
 * Solves CS174 Hw3
 * @author Tyler Jones
*/
namespace soloRider\hw3\controllers;
use soloRider\hw3\models as B;
require_once(realpath(dirname(__FILE__) . '/../models/ImageModel.php'));
require_once "Controller.php";

class ImageRatingController extends Controller {
    private $imageModel;

    /**
     * Constructor for ImageRatingController is used to instanciate 
     * a ImageModel object
     */
    public function __construct() {
        $this->imageModel = new B\ImageModel();
    }

    /**
     * Used to handle data coming from the Main Screen
     * Maintains user login with sesion super globalvariables
     * Processes newly rated images
     */
    function processRequest() {
        $data = [];
        //maintain user login session
        if(isset($_REQUEST['logout'])) {
            session_destroy();
            unset($_REQUEST['login']);
            unset($_SESSION['ID']);
            $_SESSION['LOGIN'] = false;
        }
        if(isset($_SESSION['ID'])) {
            $data['ID'] = $_SESSION['ID'];
        }

        //Handle a newly rated image
        if(isset($_REQUEST['rateImage'])) {
            $rated = $_REQUEST['dropDown'];
            $pieces = explode(":", $rated);
            $fileName = $pieces[0];
            $rating = $pieces[1];
            $id = $_SESSION['ID'];
            $this->imageModel->setRating($id, $fileName, $rating);
        }

        $this->view("imageRating")->render($data);
    }
}
