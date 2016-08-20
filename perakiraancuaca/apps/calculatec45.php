<?php
require('Model/config.php');
								require('Model/C45.php');
								//Banyak Kategori
								
								
								
								$queryAllcount = mysqli_query($connection,"select * from trainingtable");
								
								
								$arr_jlhsuhu_max_kasus_tidakhujan = array();
								$arr_jlhsuhu_min_kasus_tidakhujan = array();
								
								$arr_jlhsuhu_max_kasus_hujan_sangat_ringan = array();
								$arr_jlhsuhu_min_kasus_hujan_sangat_ringan = array();
								
								$arr_jlhsuhu_max_kasus_hujan_ringan = array();
								$arr_jlhsuhu_min_kasus_hujan_ringan = array();
								
								$arr_jlhsuhu_max_kasus_hujan_sedang = array();
								$arr_jlhsuhu_min_kasus_hujan_sedang = array();
								
								$arr_jlhsuhu_max_kasus_hujan_lebat = array();
								$arr_jlhsuhu_min_kasus_hujan_lebat = array();
								while($alldata = mysqli_fetch_array($queryAllcount)){
									if($alldata['cuaca']==0){
										array_push($arr_jlhsuhu_max_kasus_tidakhujan,$alldata['suhu_max']);
										array_push($arr_jlhsuhu_min_kasus_tidakhujan,$alldata['suhu_min']);
									}else if($alldata['cuaca']>=0.01 && $alldata['cuaca']<5){
										array_push($arr_jlhsuhu_max_kasus_hujan_sangat_ringan,$alldata['suhu_max']);
										array_push($arr_jlhsuhu_min_kasus_hujan_sangat_ringan,$alldata['suhu_min']);
									}else if($alldata['cuaca']>=5.01 && $alldata['cuaca']<20){
										array_push($arr_jlhsuhu_max_kasus_hujan_ringan,$alldata['suhu_max']);
										array_push($arr_jlhsuhu_min_kasus_hujan_ringan,$alldata['suhu_min']);
									}else if($alldata['cuaca']>=20.1 && $alldata['cuaca']<50){
										array_push($arr_jlhsuhu_max_kasus_hujan_sedang,$alldata['suhu_max']);
										array_push($arr_jlhsuhu_min_kasus_hujan_sedang,$alldata['suhu_min']);
									}
									else{
										array_push($arr_jlhsuhu_max_kasus_hujan_lebat,$alldata['suhu_max']);
										array_push($arr_jlhsuhu_min_kasus_hujan_lebat,$alldata['suhu_min']);
									}
									
								}
								$arrjlhkasus = array(count($arr_jlhsuhu_max_kasus_tidakhujan),
								count($arr_jlhsuhu_max_kasus_hujan_sangat_ringan),
								count($arr_jlhsuhu_max_kasus_hujan_ringan),
								count($arr_jlhsuhu_max_kasus_hujan_sedang),
								count($arr_jlhsuhu_max_kasus_hujan_lebat)
								);
								
								//hitung semua entropy;
								$c45 = new c45();
								$entropyall = $c45->entropy($arrjlhkasus);
								
								$arrtempattributsuhumax =array();
								
								
								//split info suhu max 
								$query_split_info_suhu_max = $c45->generalsplit('suhu_max');
								
								$data_splitinfo_suhu_max=$c45->resultsplitinfo($query_split_info_suhu_max);
								
								
								
								$count_splitinfo_less_suhumax_tidakhujan=$c45->sum_count_category(0.00,0.00,'suhu_max',$data_splitinfo_suhu_max,'<=');
								
								$count_splitinfo_more_suhumax_tidakhujan=$c45->sum_count_category(0.00,0.00,'suhu_max',$data_splitinfo_suhu_max,'>');
								
								
								$count_splitinfo_less_suhumax_hujan_sangatringan=$c45->sum_count_category(0.01,5.00,'suhu_max',$data_splitinfo_suhu_max,'<=');
								$count_splitinfo_more_suhumax_hujan_sangatringan=$c45->sum_count_category(0.01,5.00,'suhu_max',$data_splitinfo_suhu_max,'>');
								
								$count_splitinfo_less_suhumax_hujan_ringan=$c45->sum_count_category(5.01,20.10,'suhu_max',$data_splitinfo_suhu_max,'<=');
								
								$count_splitinfo_more_suhumax_hujan_ringan=$c45->sum_count_category(5.01,20.10,'suhu_max',$data_splitinfo_suhu_max,'>');
								
								
								$count_splitinfo_less_suhumax_hujan_sedang=$c45->sum_count_category(20.10,50.00,'suhu_max',$data_splitinfo_suhu_max,'<=');
								$count_splitinfo_more_suhumax_hujan_sedang=$c45->sum_count_category(20.10,50.00,'suhu_max',$data_splitinfo_suhu_max,'>');
								
								
								$count_splitinfo_less_suhumax_hujan_lebat=$c45->sum_count_category(50.10,100.00,'suhu_max',$data_splitinfo_suhu_max,'<=');
								$count_splitinfo_more_suhumax_hujan_lebat=$c45->sum_count_category(50.10,100.00,'suhu_max',$data_splitinfo_suhu_max,'>');
								
								$arrcount_less_suhu_max = array(
									$count_splitinfo_less_suhumax_tidakhujan,
									$count_splitinfo_less_suhumax_hujan_sangatringan,
									$count_splitinfo_less_suhumax_hujan_ringan,
									$count_splitinfo_less_suhumax_hujan_sedang,
									$count_splitinfo_less_suhumax_hujan_lebat
								);
								
								$arrcount_more_suhu_max = array(
									$count_splitinfo_more_suhumax_tidakhujan,
									$count_splitinfo_more_suhumax_hujan_sangatringan,
									$count_splitinfo_more_suhumax_hujan_ringan,
									$count_splitinfo_more_suhumax_hujan_sedang,
									$count_splitinfo_more_suhumax_hujan_lebat
								);
								
								//suhu min
								
								
								$Entropy_less_suhumax =$c45->entropy($arrcount_less_suhu_max);
								
								$Entropy_more_suhumax =$c45->entropy($arrcount_more_suhu_max);
								
								//hitung gain
								$gain_suhumax=($entropyall)-(((array_sum($arrcount_less_suhu_max)/
								array_sum($arrjlhkasus))*$Entropy_less_suhumax)+
								((array_sum($arrcount_more_suhu_max)/array_sum($arrjlhkasus))*$Entropy_more_suhumax));
								//gain suhu min
								$gain_suhumin=($entropyall)-(((array_sum($arrcount_less_suhu_min)/
								array_sum($arrjlhkasus))*$Entropy_less_suhumax)+
								((array_sum($arrcount_more_suhu_max)/array_sum($arrjlhkasus))*$Entropy_more_suhumax));
								
								//split info suhu min 
								$query_split_info_suhu_min = $c45->generalsplit('suhu_min');
								
								$data_splitinfo_suhu_min=$c45->resultsplitinfo($query_split_info_suhu_min);
								
								$arrcount_suhu_min = array();
								
								$count_splitinfo_less_suhumin_tidakhujan=$c45->sum_count_category(0.00,0.00,'suhu_min',$data_splitinfo_suhu_min,'<=');
								
								$count_splitinfo_more_suhumin_tidakhujan=$c45->sum_count_category(0.00,0.00,'suhu_min',$data_splitinfo_suhu_min,'>');
								
								
								$count_splitinfo_less_suhumin_hujan_sangatringan=$c45->sum_count_category(0.01,5.00,'suhu_min',$data_splitinfo_suhu_min,'<=');
								$count_splitinfo_more_suhumin_hujan_sangatringan=$c45->sum_count_category(0.01,5.00,'suhu_min',$data_splitinfo_suhu_min,'>');
								
								
								
								
								$count_splitinfo_less_suhumin_hujan_ringan=$c45->sum_count_category(5.01,20.10,'suhu_min',$data_splitinfo_suhu_min,'<=');
								$count_splitinfo_more_suhumin_hujan_ringan=$c45->sum_count_category(5.01,20.10,'suhu_min',$data_splitinfo_suhu_min,'>');
								
								
								
								$count_splitinfo_less_suhumin_hujan_sedang=$c45->sum_count_category(20.10,50.00,'suhu_min',$data_splitinfo_suhu_min,'<=');
								$count_splitinfo_more_suhumin_hujan_sedang=$c45->sum_count_category(20.10,50.00,'suhu_min',$data_splitinfo_suhu_min,'>');
								
								
								
																
								$count_splitinfo_less_suhumin_hujan_lebat=$c45->sum_count_category(50.10,100.00,'suhu_min',$data_splitinfo_suhu_min,'<=');
								$count_splitinfo_more_suhumin_hujan_lebat=$c45->sum_count_category(50.10,100.00,'suhu_min',$data_splitinfo_suhu_min,'>');
								
								//split info  kelembapan 
								$query_split_info_kelembapan = $c45->generalsplit('kelembapan');
								
								$data_splitinfo_kelembapan=$c45->resultsplitinfo($query_split_info_kelembapan);
								
								$count_splitinfo_less_kelembapan_tidakhujan=$c45->sum_count_category(0.00,0.00,'kelembapan',$data_splitinfo_kelembapan,'<=');
								
								$count_splitinfo_more_kelembapan_tidakhujan=$c45->sum_count_category(0.00,0.00,'kelembapan',$data_splitinfo_kelembapan,'>');
								
								$count_splitinfo_less_kelembapan_hujan_sangatringan=$c45->sum_count_category(0.01,5.00,'kelembapan',$data_splitinfo_kelembapan,'<=');
								$count_splitinfo_more_kelembapan_hujan_sangatringan=$c45->sum_count_category(0.01,5.00,'kelembapan',$data_splitinfo_kelembapan,'>');
								
								
								
								
								$count_splitinfo_less_kelembapan_hujan_ringan=$c45->sum_count_category(5.01,20.10,'kelembapan',$data_splitinfo_kelembapan,'<=');
								$count_splitinfo_more_kelembapan_hujan_ringan=$c45->sum_count_category(5.01,20.10,'kelembapan',$data_splitinfo_kelembapan,'>');
								
								
								
								$count_splitinfo_less_kelembapan_hujan_sedang=$c45->sum_count_category(20.10,50.00,'kelembapan',$data_splitinfo_kelembapan,'<=');
								$count_splitinfo_more_kelembapan_hujan_sedang=$c45->sum_count_category(20.10,50.00,'kelembapan',$data_splitinfo_kelembapan,'>');
								
								
								
																
								$count_splitinfo_less_kelembapan_hujan_lebat=$c45->sum_count_category(50.10,100.00,'kelembapan',$data_splitinfo_kelembapan,'<=');
								$count_splitinfo_more_kelembapan_hujan_lebat=$c45->sum_count_category(50.10,100.00,'kelembapan',$data_splitinfo_kelembapan,'>');
								
								//split info arah_angin 
								$query_split_info_arah_angin = $c45->generalsplit('arah_angin');
								
								$data_splitinfo_arah_angin=$c45->resultsplitinfo($query_split_info_arah_angin);
								
								$count_splitinfo_less_arah_angin_tidakhujan=$c45->sum_count_category(0.00,0.00,'arah_angin',$data_splitinfo_arah_angin,'<=');
								
								$count_splitinfo_more_arah_angin_tidakhujan=$c45->sum_count_category(0.00,0.00,'arah_angin',$data_splitinfo_arah_angin,'>');
								
								$count_splitinfo_less_arah_angin_hujan_sangatringan=$c45->sum_count_category(0.01,5.00,'arah_angin',$data_splitinfo_arah_angin,'<=');
								$count_splitinfo_more_arah_angin_hujan_sangatringan=$c45->sum_count_category(0.01,5.00,'arah_angin',$data_splitinfo_arah_angin,'>');
								
								
								
								
								$count_splitinfo_less_arah_angin_hujan_ringan=$c45->sum_count_category(5.01,20.10,'arah_angin',$data_splitinfo_arah_angin,'<=');
								$count_splitinfo_more_arah_angin_hujan_ringan=$c45->sum_count_category(5.01,20.10,'arah_angin',$data_splitinfo_arah_angin,'>');
								
								
								
								$count_splitinfo_less_arah_angin_hujan_sedang=$c45->sum_count_category(20.10,50.00,'arah_angin',$data_splitinfo_arah_angin,'<=');
								$count_splitinfo_more_arah_angin_hujan_sedang=$c45->sum_count_category(20.10,50.00,'arah_angin',$data_splitinfo_arah_angin,'>');
								
								
								
																
								$count_splitinfo_less_arah_angin_hujan_lebat=$c45->sum_count_category(50.10,100.00,'arah_angin',$data_splitinfo_arah_angin,'<=');
								$count_splitinfo_more_arah_angin_hujan_lebat=$c45->sum_count_category(50.10,100.00,'arah_angin',$data_splitinfo_arah_angin,'>');
								
								//split info kecepatan_angin 
								$query_split_info_kecepatan_angin = $c45->generalsplit('kecepatan_angin');
								
								$data_splitinfo_kecepatan_angin=$c45->resultsplitinfo($query_split_info_kecepatan_angin);
								
								$count_splitinfo_less_kecepatan_angin_tidakhujan=$c45->sum_count_category(0.00,0.00,'kecepatan_angin',$data_splitinfo_kecepatan_angin,'<=');
								
								$count_splitinfo_more_kecepatan_angin_tidakhujan=$c45->sum_count_category(0.00,0.00,'kecepatan_angin',$data_splitinfo_kecepatan_angin,'>');
								
								$count_splitinfo_less_kecepatan_angin_hujan_sangatringan=$c45->sum_count_category(0.01,5.00,'kecepatan_angin',$data_splitinfo_kecepatan_angin,'<=');
								$count_splitinfo_more_kecepatan_angin_hujan_sangatringan=$c45->sum_count_category(0.01,5.00,'kecepatan_angin',$data_splitinfo_kecepatan_angin,'>');
								
								
								
								
								$count_splitinfo_less_kecepatan_angin_hujan_ringan=$c45->sum_count_category(5.01,20.10,'kecepatan_angin',$data_splitinfo_kecepatan_angin,'<=');
								$count_splitinfo_more_kecepatan_angin_hujan_ringan=$c45->sum_count_category(5.01,20.10,'kecepatan_angin',$data_splitinfo_kecepatan_angin,'>');
								
								
								
								$count_splitinfo_less_kecepatan_angin_hujan_sedang=$c45->sum_count_category(20.10,50.00,'kecepatan_angin',$data_splitinfo_kecepatan_angin,'<=');
								$count_splitinfo_more_kecepatan_angin_hujan_sedang=$c45->sum_count_category(20.10,50.00,'kecepatan_angin',$data_splitinfo_kecepatan_angin,'>');
								
								
								
																
								$count_splitinfo_less_kecepatan_angin_hujan_lebat=$c45->sum_count_category(50.10,100.00,'kecepatan_angin',$data_splitinfo_kecepatan_angin,'<=');
								$count_splitinfo_more_kecepatan_angin_hujan_lebat=$c45->sum_count_category(50.10,100.00,'kecepatan_angin',$data_splitinfo_kecepatan_angin,'>');
								
								
								//array_push($arrcount_suhu_max,$count_splitinfo_less_suhumax_hujan_lebat);