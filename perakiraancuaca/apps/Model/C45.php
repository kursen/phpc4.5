<?php
Class c45{

	public function entropy($values)
	 {
	  $e = 0;

	  $sum = array_sum($values);
	  for ($counter=0;$counter<count($values);$counter++)
	  {
	   if (count($values) > 0)
	   {
		$e += - ((($values[$counter] / $sum) * log($values[$counter] / $sum, 2)));
	   }
	  }

	  return $e;
	 }
	 
	 public function gensplitinfo($arrval){
		 $arrreturn=array();
		 if(count($arrval)>1){
			 for($count=0;$count<count($arrval);$count++){
			 if($count%2==0){
				 if($count+1<count($arrval)){
					$arrsplitinfo=($arrval[$count]+$arrval[$count+1])/2;
					array_push($arrreturn,$arrsplitinfo);
				 }
			 }
			
			}
		 }else{
			 array_push($arrreturn,$arrval[0]);
		 }
		 
		 return $arrreturn;
		 
	 }
	 public function resultsplitinfo($arrval){
		 while(count($arrval)>2){
			 $arrval=$this->gensplitinfo($arrval);
		}
		return $arrval[0];
	 }
	 
	 private function gain($entropy_all, $values){
		  $total_records = 0;
		  foreach ($values as $sub_values)
		  {
		   $total_records += array_sum($sub_values);
		  }

		  $gain = 0;
		  foreach ($values as $sub_values)
		  {
		   $sub_total_value = array_sum($sub_values);
		   $gain += ($sub_total_value / $total_records * $this->entropy($sub_values));
		  }
		  $gain = $entropy_all - $gain;

		  return $gain;
		}

}
?>