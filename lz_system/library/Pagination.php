<?php
	class Pagination{
		
		private $total_rows;		//总条目数
		private $rows_per_page;		//每页显示条目数
		private $total_pages;		//总页数
		private $nump_per_page;		//每页显示连接数
		private $cur_page;			//当前页码
		private $base_link;			//连接
		private $params = array();	//附加值
		private $dis_pages = array();//需显示的页码数组
		private $page_offset;   //页码偏移量

		function __construct($cur_page,$total_rows,$rows_per_page,$nump_per_page,$base_link,$params=null){
			$this->total_rows = $total_rows;
			$this->rows_per_page = $rows_per_page;
			$this->nump_per_page = $nump_per_page;
			$this->base_link = $base_link;
			$this->params = $params;

			$this->total_pages = ceil($total_rows/$rows_per_page);
			if($cur_page<1||$cur_page>$this->total_pages){
				$this->cur_page = 1;
			}else{
				$this->cur_page = $cur_page;
			}

			if($this->cur_page<=$this->nump_per_page){
				for($n=0,$i=1;$i<=$this->nump_per_page&&$i<=$this->total_pages;$n++,$i++){
					$this->dis_pages[$n] = $i;
				}
			}else{
				$this->page_offset = floor($nump_per_page/1.3); 
				for($n=0,$i=$this->cur_page-$this->page_offset;$n<$this->nump_per_page&&$i<=$this->total_pages;$n++,$i++){
					$this->dis_pages[$n] = $i;
				}
			}
		}
		
		function display(){
		?>
		<style type="text/css">
			#Pagination_dyn{
				margin-top:10px;
				float:right;
				clear:both;
			}
			.pagination_a{
				float: left;
				display: inline;
				margin-left: 4px;
				padding: 0 8px;
				height: 26px;
				border: 1px solid;
			    border-color: #C2D5E3;
				background-color: #FFF;
				background-repeat: no-repeat;
				color: #333;
				overflow: hidden;
				text-decoration: none;
			}
			.pagi_clear{
				clear:both;
			}
		</style>
		<?php
			echo "<div id=\"Pagination_dyn\">";
			$str = "";
			$param_link = "";

			if(!empty($this->params)){
				foreach($this->params as $pkey=>$pvalue){
					$param_link.=("&".$pkey."=".$pvalue);
				}
			}
			//print_r($this->dis_pages);
			$str = "<a href=\" ".$this->base_link."?pid=1";
			$str.=$param_link;
			$str.="\" class=\"pagination_a\">首页</a>";
			echo $str;
			if($this->cur_page>1){
				$str = "<a href=\" ".$this->base_link."?pid=".($this->cur_page-1);
					$str.=$param_link;
					$str.="\" class=\"pagination_a\">上一页</a>";
				echo $str;
			}
			foreach($this->dis_pages as $value){
				if($value==$this->cur_page){
					$str = "<strong class=\"pagination_a\">".$value."</strong>";
				}
				else{
					$str = "<a href=\" ".$this->base_link."?pid=".$value;
					$str.=$param_link;
					$str.="\" class=\"pagination_a\">".$value."</a>";
				}
				echo $str;
			}
			if($this->cur_page!=$this->total_pages){
				$str = "<a href=\" ".$this->base_link."?pid=".($this->cur_page+1);
				$str.=$param_link;
				$str.="\" class=\"pagination_a\">下一页</a>";
				echo $str;
			}
			$str = "<a href=\" ".$this->base_link."?pid=".$this->total_pages;
			$str.=$param_link;
			$str.="\" class=\"pagination_a\">尾页</a>";
			echo $str;
			echo "<div class='pagi_clear'></div>\n</div>";
		}

	}
?>