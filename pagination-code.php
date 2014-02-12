<?php

/*

Clean PHP Pagination
by Kevin Ohashi

Description: Pagination shouldn't be so hard. This library will return an array of pages for you to wrap your pagination around.

Assumptions:
$totalItems - has been calculated
$itemsPerPage - has been set
$pagesPerSide - has been set
$currentPage - (optional) if you know what page you want 

$totalNumItems - total number of items in the dataset
$itemsPerPage - the number of items to show per page
$pagesPerSide - how many pages do you want to show around the current page? eg. current=4, pagesPerSide=2 returns 2,3,4,5,6
$currentPage - (optional) what page are you on

*/

function getPages($totalNumItems,$itemsPerPage,$pagesPerSide,$currentPage=0){
	$totalPages = ceil($totalNumItems/$itemsPerPage);

	$pagesNav = range(max(0, $currentPage - $pagesPerSide), min($totalPages - 1, $currentPage + $pagesPerSide));

	return $pagesNav;
}

/* Example Use Case*/

//some mysql query that you have got 

$totalItems = 100;
$itemsPerPage = 10;
$pagesPerSide = 3;
$currentPage = 5;

$pagesNav = getPages($totalItems,$itemsPerPage,$pagesPerSide,$currentPage);
if(current(reset($pagesNav)!=0){
	echo "<a href='/?page=1'>1</a> ... ";
	echo " <a href='/?page=".current(reset($pagesNav))-1"'>Previous</a> ";
}
foreach($pagesNav as $p){
	$p2 = $p + 1;
	echo " <a href='".$downloadLink."&page=".$p2."'>".$p2."</a> ";
}

if(end($pagesNav)!=$totalPages-1){
	echo " <a href='/?page=".end($pagesNav)+1"'>Next</a> ";
	echo "... <a href='/?page=".$totalPages."'>Last Page</a>";
}


?>