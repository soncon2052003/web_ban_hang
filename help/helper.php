<?php
class Helper {
    /*
    public static function Paginate($list, $limit){
    $total_number_page = count($list);
    $number_page = ceil($total_number_page/$limit);
    $k=0;
    for($i=0;$i<$number_page;$i++){
        for($j=0;$j<$limit;$j++){
            while($k<$total_number_page){
                $sp[$i][$j][]=$list[$k];
                $k=$k+1;
            }
        }
    }
    return $sp;
    }
    */
    public function paging($limit,$numRows,$page){
        $allPages       = ceil($numRows / $limit);    
        $start          = ($page - 1) * $limit;    
        $querystring = "";  
        foreach ($_GET as $key => $value) {
            if ($key != "page") $paginHTML .= "$key=$value&amp;";
        }
        $paginHTML = "";
        $paginHTML .= "Pages: ";
        for ($i = 1; $i <= $allPages; $i++) {
            if ($i>1) {
                $prev = $i-1;
                $paginHTML .= '<a href="?'.$querystring.'page='.$prev'">Previous</a>';
            }
            $paginHTML .= "<a " . ($i == $page ? "class=\"selected\" " : "");
            $paginHTML .= "href=\"?{$querystring}page=$i";
            $paginHTML .= "\">$i</a> ";
                    if ($i<$allPages) {
                        $next = $i+1;
                        $paginHTML .= '<a href="?'.$querystring.'page='.$next'">Next</a>';
                    }
        }
        return $paginHTML;
    }
}
?>