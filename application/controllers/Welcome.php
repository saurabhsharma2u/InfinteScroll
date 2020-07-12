<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 
	public function index()
	{
		
		
		$this->load->view('welcome_message');
	}

	public function posts()
	{
		$this->load->model('Posts_model');
		$Per_Page = 10;
		$page_num = $this->input->post('page_num');
		if($page_num){
			$page_num = $page_num;
		}else{
			$page_num=1;
		}
		$Page_Start = ($page_num - 1) * $Per_Page;
		$Posts = $this->Posts_model->FetchPosts($Page_Start,$Per_Page);
		$html ='';
		if($Posts){
			foreach ($Posts as $key => $Post) {
				$html .='<div class="my-posts">';
				$html .='<h3>'.$Post->title.'</h3>';
				$html .='<p>'.$Post->content.'</p>';
				$html.='</div>';
			}
		}
		echo $html;
	}
}
