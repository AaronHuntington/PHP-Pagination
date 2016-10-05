<?php

class pagination{

	public $webPg;
	public $products_array;
	public $products_count;
	public $page;	
	public $products_per_page = 8;
	public $max_page;

	

	public function set_page_variable(){
		$max_page = $this->get_maxPg();

		if(isset($_GET['page'])){
			if($max_page < $_GET['page']){
	 			$this->page = $max_page;
				header("Location: ".$this->webPg."?page=".$this->page."");
			} elseif($_GET['page'] < 1){
				return header("Location: ".$this->webPg."?page=1");	
			} else {
	 			$this->page = $_GET['page'];
	 		}
		} else {
			return header("Location: ".$this->webPg."?page=1");	
		} 
	}

	public function get_maxPg(){
		$count = $this->get_count();
		$products_per_page = $this->products_per_page;

		$this->max_page = ceil($count/$products_per_page);

		return $this->max_page;
	}

	public function get_count(){
		$this->products_count = count($this->products_array);
		return $this->products_count;
	}

	public function get_products_by_section($endCount){

		$startCount = ($this->page * $this->products_per_page)-$this->products_per_page+1;
   		$endCount = $this->page * $this->products_per_page;
   		$products = $this->products_array;
   		$subset = $products;

		$subset = array();
		$position = 0;

		foreach($products as $product) {
			$position += 1;
	        if ($position >= $startCount && $position <= $endCount) {
	            $subset[] = $product;
	        }
		}
		return $subset;
	}

	public function next_page(){
		$pg = $this->page + 1;
		return $pg;
	}

	public function previous_page(){
		$pg = $this->page - 1;
		return $pg;
	}

	public function get_pagination_html(){
		echo '<section id="pagination_container" class="row">';
		echo '<nav aria-label="..." class="col-md-10 col-md-offset-1 borderRe">';
		echo '<ul id="" class="pagination pagination-md borderRe">';
		echo '<li>';
      	echo '<a href="'.$this->webPg.'?page='.$this->previous_page().'" aria-label="Previous">';
        echo '<span aria-hidden="true">&laquo;</span>';
      	echo '</a>';
    	echo '</li>';
		for($i=1; $i<=$this->get_maxPg(); $i++){
			echo '<li>';
				echo '<a href="'.$this->webPg.'?page='.$i.'">';
				echo $i;
				echo '</a>';
			echo '</li>';
		}
		echo '<li>';
      	echo '<a href="'.$this->webPg.'?page='.$this->next_page().'" aria-label="Next">';
        echo '<span aria-hidden="true">&raquo;</span>';
      	echo '</a>';
    	echo '</li>';
		echo '</ul>';
		echo '</nav>';
		echo '</section>';
	}



}


?>