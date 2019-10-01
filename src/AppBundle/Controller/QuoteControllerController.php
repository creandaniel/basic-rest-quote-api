<?php

namespace AppBundle\Controller;

use AppBundle\Entity\QuoteAPI;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class QuoteControllerController extends Controller
{
	 /**
     * @Route("/api/v1/quote")
     * @Method("POST")
     */
    public function newAction(Request $request) {

    	$sourceQuery = $request->query->get('source');
        $quoteQuery = $request->query->get('quote');

		        // Create a new empty object
		$quote = new QuoteAPI();

		// Use methods from the Quote entity to set the values
		$quote->setSource($sourceQuery);
		$quote->setQuote($quoteQuery);

	    // Get the Doctrine service and manager
	    $em = $this->getDoctrine()->getManager();

	    // Add our quote to Doctrine so that it can be saved
	    $em->persist($quote);

	    // Save our quote
	    $em->flush();

    	return new Response('It\'s probably been saved', 201);
    }


    /**
     * @Route("/api/v1/quote/{id}")
     * @Method("GET")
     * @param $id
     */
    public function getAction($id)
    {
    	$quote = $this->getDoctrine()
    	->getRepository('AppBundle:QuoteAPI')
    	->findOneBy(['id' => $id]);

    	$data =[
	    	'quote' => $quote->getQuote(),
    		'source' => $quote->getSource(),
    	];

    	return new Response(json_encode($data));
    }


    /**
     * @Route("/api/v1/quote/update/{id}")
     * @Method("PUT")
     * @param $id
     */
	 public function updateAction(Request $request, $id) 
	 {

    	$sourceQuery = $request->query->get('source');
        $quoteQuery = $request->query->get('quote');


		$quote = $this->getDoctrine()
    	->getRepository('AppBundle:QuoteAPI')
    	->findOneBy(['id' => $id]);


		// Use methods from the Quote entity to set the values
		$quote->setSource($sourceQuery);
		$quote->setQuote($quoteQuery);

	    // Get the Doctrine service and manager
	    $em = $this->getDoctrine()->getManager();

	    // Add our quote to Doctrine so that it can be saved
	    $em->persist($quote);

	    // Save our quote
	    $em->flush();

    	return new Response('It\'s probably been saved', 201);
    }

}
