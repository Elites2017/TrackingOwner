<?php
	class Pages extends CI_Controller
	{
		/*public function view($page = 'home')
		{
			// check if this view exist
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))
			{
				show_404();
			}

			else
			{
				// Putting the page name with capital letter into the data
				$data['title'] = ucfirst($page);

				// Load the view, pages...
				$this->load->view('templates/header');
				// Load the page 
				$this->load->view('pages/'.$page, $data);
				$this->load->view('templates/footer');
			}
		}*/


		public function view($page = 'home')
		{
			// check if this view exist
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))
			{
				show_404();
			}

			else
			{
			  	// Putting the page name with capital letter into the data
				$data['title'] = ucfirst($page);
				$this->load->library("curl");
			    //$api = '127.0.0.1:8080/api/secrak/get/shop/';
			    $api = '127.0.0.1:8080/api/secrak/get/invoice/';
			    $curl = curl_init($api);
			    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			    $curl_rep = curl_exec($curl);

		      //var_dump($curl_rep);

		      $arr = json_decode($curl_rep, true);

		      // Putting the page name with capital letter into the data
				//$data['title'] = ucfirst($page);
				//$this->load->library("curl");
			    //$api = '127.0.0.1:8080/api/secrak/get/shop/';
			    $api_in = '127.0.0.1:8080/api/secrak/get/invoice/';
			    $curl_in = curl_init($api_in);
			    curl_setopt($curl_in, CURLOPT_RETURNTRANSFER, true);
			    $curl_rep_in = curl_exec($curl_in);

			    $arr_invoice = json_decode($curl_rep_in, true);
		      //var_dump($curl_rep_in);

		      
				

				// Putting the page name with capital letter into the data
				$data['title'] = ucfirst($page);
				$data['articles'] = $arr;
				$data['invoices'] = $arr_invoice;

				// Load the view, pages...
				$this->load->view('templates/header');
				// Load the page 
				$this->load->view('pages/'.$page, $data);
				$this->load->view('templates/footer');
			}
		}

		/*
		public function view($page = 'home')
		{
			// check if this view exist
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))
			{
				show_404();
			}

			else
			{
			  $this->load->library("curl");
		      $api = '127.0.0.1:8080/api/secrak/get/shop/';
		      $curl = curl_init($api);
		      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		      $curl_rep = curl_exec($curl);

		      //var_dump($curl_rep);

		      $arr = json_decode($curl_rep, true);

				// Putting the page name with capital letter into the data
				$data['title'] = ucfirst($page);
				//$data['contenu'] = $arr;

				// Load the view, pages...
				//$this->load->view('templates/header');
				// Load the page 
				$this->load->view('pages/'.$page, $data);
				//$this->load->view('templates/footer');
			}
		}
		*/
		public function gitapi()
		{
			$this->load->library("curl");
		      $api = '127.0.0.1:8080/api/secrak/get/invoice/';
		      $curl = curl_init($api);
		      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		      $curl_rep = curl_exec($curl);

		      //var_dump($curl_rep);

		      $arr = json_decode($curl_rep, true);
		      //var_dump($arr);

		      // Putting the page name with capital letter into the data
				//$data['title'] = ucfirst($page);
				//$this->load->library("curl");
			    //$api = '127.0.0.1:8080/api/secrak/get/shop/';
			    $api_in = '127.0.0.1:8080/api/secrak/get/invoice/';
			    //var_dump($api_in);
			    $curl_in = curl_init($api_in);
			    curl_setopt($curl_in, CURLOPT_RETURNTRANSFER, true);
			    $curl_rep_in = curl_exec($curl_in);

			    $arr_invoice = json_decode($curl_rep_in, true);
		      //var_dump($curl_rep_in);

		      
				

				// Putting the page name with capital letter into the data

		      /*foreach ($arr as $ar) {
		      	echo $ar['shopId'];
		      	echo $ar['shopName'];
		      }*/

		    // Getting data ready to send to the view page
		    //$data['title'] = ucfirst($page);
			$data['articles'] = $arr;
			$data['invoices'] = $arr_invoice;

			$this->load->view('templates/header');
			$this->load->view('pages/home', $data);
			$this->load->view('templates/footer');

			//var_dump($contenu);
    
		}
	}
?>