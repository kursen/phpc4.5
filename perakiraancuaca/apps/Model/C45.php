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
		 while(count($arrval)>1){
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
		
		public function giniIndex($arrayval){
			for($counter=0;$counter<count($arrayval);$counter++){
				
			}
		}
		//public function getCountCategory($columnname,$val){
			
		//}
		
		public function generalsplit($columnname){
			require('config.php');
			$arrayreturn = array();
			$str_query ="select ".$columnname." from trainingtable ".$columnname;
			
			$execute_query = mysqli_query($connection,$str_query);
			if($execute_query){
				while($data = mysqli_fetch_array($execute_query)){
					array_push($arrayreturn,$data[$columnname]);
				}
			}
			return $arrayreturn;
		}
		
		public function sum_count_category($param_category1,$param_category2,$columnname,$val,$mark){
			require('config.php');
			$str_query='';
			$returnvalue=0;
			if($param_category1>=0.01){
				$str_query = "select count(".$columnname.") as total from trainingtable where ".$columnname.$mark.$val." and cuaca between ".$param_category1." and ".$param_category2;
			}else{
				$str_query = "select count(".$columnname.") as total from trainingtable where ".$columnname.$mark.$val." and cuaca =".$param_category1;
			}
			$execute = mysqli_query($connection,$str_query);
			if($execute){
				$returnvalue = mysqli_fetch_assoc($execute);
				$returnvalue = $returnvalue['total'];
			}
			return $returnvalue;
		}
}
?>