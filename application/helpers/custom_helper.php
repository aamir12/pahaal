<?php 

function showData($data){
  echo "<pre>";
  print_r($data);
  die();
}


function web_pagination($previous_next_btn  ,$first_last_btn ,$per_page,$page,$totalrecords,$pageLength=5){
	$cur_page = $page;
	$page -= 1;
	$start = $page * $per_page;

	$no_of_paginations = ceil($totalrecords / $per_page);

	/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
	$p1 = $pageLength -1;
	if ($cur_page >= 5) {
		$start_loop = $cur_page - 2;
		if ($no_of_paginations > $cur_page + 2)
			$end_loop = $cur_page + 2;
		else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - $p1) {
			$start_loop = $no_of_paginations - $p1;
			$end_loop = $no_of_paginations;
		} else {
			$end_loop = $no_of_paginations;
		}
	} else {
		$start_loop = 1;
		if ($no_of_paginations > $pageLength)
			$end_loop = $pageLength;
		else
			$end_loop = $no_of_paginations;
	}
	/* ----------------------------------------------------------------------------------------------------------- */
	$msg = "<ul class='pagination'>";

	// FOR ENABLING THE FIRST BUTTON
	if ($first_last_btn && $cur_page > 1) {
		$msg .= "<li p='1' class='page-item active'>
		<a class='page-link paginate_btn_cls' href='javascript:void(0);' >First</a></li>";
	} else if ($first_last_btn) {
		$msg .= "<li p='1' class='page-item'>	<a class='page-link paginate_btn_cls' href='javascript:void(0);' >First</a></li>";
	}

	// FOR ENABLING THE PREVIOUS BUTTON
	if ($previous_next_btn && $cur_page > 1) {
		$pre = $cur_page - 1;
		$msg .= "<li p='$pre' class='page-item active'>
		<a class='page-link paginate_btn_cls' href='javascript:void(0);' aria-label='Next'>
      <span aria-hidden='true'><i class='fa fa-chevron-left' aria-hidden='true'></i></span>
    </a></li>";
	} else if ($previous_next_btn) {
		$msg .= "<li class='page-item '>
		<a class='page-link paginate_btn_cls' href='javascript:void(0);' aria-label='Next'>
      <span aria-hidden='true'><i class='fa fa-chevron-left' aria-hidden='true'></i></span>
    </a></li>";
	}
	for ($i = $start_loop; $i <= $end_loop; $i++) {

		if ($cur_page == $i)
			$msg .= "<li class='page-item active'><a class='page-link paginate_btn_cls' href='javascript:void(0);' >{$i}</a></li>";
		else
			$msg .= "<li p='$i' class='page-item'><a class='page-link paginate_btn_cls' href='javascript:void(0);' >{$i}</a></li>";
	}

	// TO ENABLE THE NEXT BUTTON
	if ($previous_next_btn && $cur_page < $no_of_paginations) {
		$nex = $cur_page + 1;
		$msg .= "<li p='$nex' class='page-item active'><a class='page-link paginate_btn_cls' href='javascript:void(0);' aria-label='Next'>
		<span aria-hidden='true'><i class='fa fa-chevron-right' aria-hidden='true'></i></span>
	</a></li>";
	} else if ($previous_next_btn) {
		$msg .= "<li class='page-item'><a class='page-link paginate_btn_cls' href='javascript:void(0);' aria-label='Next'>
		<span aria-hidden='true'><i class='fa fa-chevron-right' aria-hidden='true'></i></span>
	</a></li>";
	}

	// TO ENABLE THE END BUTTON
	if ($first_last_btn && $cur_page < $no_of_paginations) {
		$msg .= "<li p='$no_of_paginations' class='page-item active'><a class='page-link paginate_btn_cls' href='javascript:void(0);' >Last</a></li>";
	} else if ($first_last_btn) {
		$msg .= "<li p='$no_of_paginations' class='page-item'><a class='page-link paginate_btn_cls' href='javascript:void(0);' >Last</a></li>";
	}
	
	$res = $msg . "</ul>"  ;  // Content for pagination
	return $res;

}
