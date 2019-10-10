<?php

namespace AppBundle\Controller;

use AppBundle\Entity\QuoteAPI;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\Tools\Pagination\Paginator;




class QuoteControllerController extends Controller
{
	 /**
     * @Route("/api/v1/quote")
     * @Method("POST")
     */
    public function newAction(Request $request) {

    	$sourceQuery = $request->query->get('source');
        $quoteQuery = $request->query->get('quote');
        $genreQuery = $request->query->get('genre');
        $countryOrigin = $request->query->get('country_origin');
        $authorProfession = $request->query->get('author_profession');


		// Create a new empty object
		$quote = new QuoteAPI();

		// Use methods from the Quote entity to set the values
		$quote->setSource($sourceQuery);
		$quote->setQuote($quoteQuery);
        $quote->setGenre($genreQuery);
        $quote->setCountryOrigin($countryOrigin);
        $quote->setAuthorProfession($authorProfession);

        $created_at_date = new \DateTime();


        $quote->setCreatedAt($created_at_date);
        $quote->setUpdatedAt($created_at_date);

       

	    // Get the Doctrine service and manager
	    $em = $this->getDoctrine()->getManager();

	    // Add our quote to Doctrine so that it can be saved
	    $em->persist($quote);

	    // Save our quote
	    $em->flush();

    	return new Response($sourceQuery .' ' . 'has probably been saved', 201);
    }


    public function actionValidation()
    {
        


        return;
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
            'id' => $id,
	    	'quote' => $quote->getQuote(),
    		'source' => $quote->getSource(),
            'author' => $quote->getAuthorProfession(),
            'country_origin' => $quote->getCountryOrigin(),
            'genre' => $quote->getGenre(),
    	];

        return new JsonResponse($data);
    }

     /**
     * @Route("/api/v1/allquotes{pageNo}")
     * @Method("GET")
     */
    public function getAllAction($pageNo = 1)
    {

        // $data =[
        //     // 'quote' => $quote->getQuote(),
        //     // 'source' => $quote->getSource(),
        // ];
        

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:QuoteAPI');


        if(isset($_GET['pageNo']))
        {
            $pageNo = $_GET['pageNo'];
        }
        else 
        {
            $pageNo = 1;
        }


        $pageSize = '5';

        $query = $repository->createQueryBuilder('p')
            ->orderBy('p.id', 'ASC')
            ->setFirstResult(0)
            ->setMaxResults($pageSize)
            ->getQuery();


        $paginator  = new \Doctrine\ORM\Tools\Pagination\Paginator($query);



        // you can get total items
        $totalItems = count($paginator);


        // get total pages
        $pagesCount = ceil($totalItems / $pageSize);

        $paginator
        ->getQuery()
        ->setFirstResult($pageSize * ($pageNo-1)) // set the offset
        ->setMaxResults($pageSize); // set the limit


        $paginator = $query->getResult();

        $productsResults = [
            'results' => $paginator,
            'pageNo' => $pageNo,
            'totalQuotes' => $totalItems,
            'totalPages' => $pagesCount 
        ];

        return new JsonResponse($productsResults);
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
        $genreQuery = $request->query->get('genre');
        $countryOrigin = $request->query->get('country_origin');
        $authorProfession = $request->query->get('author_profession');


		$quote = $this->getDoctrine()
    	->getRepository('AppBundle:QuoteAPI')
    	->findOneBy(['id' => $id]);


		// Use methods from the Quote entity to set the values
		  // Create a new empty object
        $quote = new QuoteAPI();

        // Use methods from the Quote entity to set the values
        $quote->setSource($sourceQuery);
        $quote->setQuote($quoteQuery);
        $quote->setGenre($genreQuery);
        $quote->setCountryOrigin($countryOrigin);
        $quote->setAuthorProfession($authorProfession);

        $created_at_date = new \DateTime();

        $quote->setCreatedAt($created_at_date);
        $quote->setUpdatedAt($created_at_date);

	    // Get the Doctrine service and manager
	    $em = $this->getDoctrine()->getManager();

	    // Add our quote to Doctrine so that it can be saved
	    $em->persist($quote);

	    // Save our quote
	    $em->flush();

    	return new Response('It\'s probably been saved', 201);
    }


}
