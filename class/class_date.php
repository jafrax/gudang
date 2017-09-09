<?php

class date{

	public function date_english($date){ //2013-06-08 => 08th June 2013
        $year = substr($date,0,4); //2013
        $month = substr($date,5,2); //06
        $day = substr($date,8,2); //08
        $day2 = substr($date,9,2); //8
        switch($month){
            case "01": $month="January"; break;
            case "02": $month="February"; break;
            case "03": $month="March"; break;
            case "04": $month="April"; break;
            case "05": $month="May"; break;
            case "06": $month="June"; break;
            case "07": $month="July"; break;
            case "08": $month="August"; break;
            case "09": $month="September"; break;
            case "10": $month="October"; break;
            case "11": $month="November"; break;
            case "12": $month="December"; break;
        }
        if($day=="01"){ $day="1st";}
        elseif($day=="02"){ $day="2nd";}
        elseif($day=="03"){ $day="3rd";}
        elseif(($day=="04")||($day=="05")||($day=="06")||($day=="07")||($day=="08")||($day=="09")){ $day=$day2."th";}
        else{ $day=$day."th";}
        $ubah = "$day $month $year";
        return $ubah;
    }
    
    public function date_indo($date){ //2013-06-08 => 08 Juni 2013
        $year = substr($date,0,4); //2013
        $month = substr($date,5,2); //06
        $day = substr($date,8,2); //08
        switch($month){
            case "01": $month="Januari"; break;
            case "02": $month="Februari"; break;
            case "03": $month="Maret"; break;
            case "04": $month="April"; break;
            case "05": $month="Mei"; break;
            case "06": $month="Juni"; break;
            case "07": $month="Juli"; break;
            case "08": $month="Augustus"; break;
            case "09": $month="September"; break;
            case "10": $month="Oktober"; break;
            case "11": $month="November"; break;
            case "12": $month="Desember"; break;
        }
        $ubah = "$day $month $year";
        return $ubah;
    }
    
    public function date_indo_minus($date){ //2013-06-08 => 08-06-2013
        $year = substr($date,0,4); //2013
        $month = substr($date,5,2); //06
        $day = substr($date,8,2); //08
        $ubah = "$day-$month-$year";
        return $ubah;
    }
    
    public function date_english_minus($date){ //2013-06-08 => 2013-06-08
        $year = substr($date,6,4); //2013
        $month = substr($date,3,2); //06
        $day = substr($date,0,2); //08
        $ubah = "$year-$month-$day";
        return $ubah;
    }
    
    public function date_indo_slash($date){ //2013-06-08 => 08/06/2013
        $year = substr($date,0,4); //2013
        $month = substr($date,5,2); //06
        $day = substr($date,8,2); //08
        $ubah = "$day/$month/$year";
        return $ubah;
    }
    
    public function date_english_slash($date){ //2013-06-08 => 2013/06/08
        $year = substr($date,0,4); //2013
        $month = substr($date,5,2); //06
        $day = substr($date,8,2); //08
        $ubah = "$year/$month/$day";
        return $ubah;
    }

    public function date_time_indo($date){ //2013-08-08 12:30:00
    	$year = substr($date,0,4);
    	$month = substr($date,5,2);
    	$day = substr($date,8,2);
    	$time = substr($date,11,8);
    	$ubah = "$day-$month-$year $time";
    	return $ubah;
    }
}

?>