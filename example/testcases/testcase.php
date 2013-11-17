<?php
		require_once('../../message/pb_message.php');
		require_once('./test/pb_proto_userdata.php');

		$fname = "demo";
	
		// build object
		$a = new a();
		$a->set_id('dsdsdsdsdsdsds123123');
		$a->set_clientname('atestclient');
		
		for($i = 0; $i<10000 ; $i++)
		{
			$b = $a->add_conf();
			$b->set_query('this is a query');
			unset($b);	
		}
		
		// remove first item
		//var_dump($a->conf_size());
		//$a->set_conf(0, $a->conf($a->conf_size() - 1));
		//$a->remove_last_conf();
		//var_dump($a->conf_size());
		
		$content = $a->SerializeToString();
		$fhandle = fopen($fname,"wb");
		fwrite($fhandle,$content);
		fclose($fhandle);
		unset($content);
		unset($fhandle);
		//$a->__destruct();
		unset($a);
		gc_collect_cycles();	
	
		//exit;
		$cnt = 0;
		print "<br>MEMORY BEFOR:".memory_get_usage()."<br>\n";	
		while(true)
		{
			$cnt++;
			$fhandle = fopen($fname,"rb");
			$content = fread($fhandle,filesize($fname));
			$result = $content;		
			
			$a = new a();
			$a->parseFromString($result);
		//	$a->__destruct();
			unset($a);		
			fclose($fhandle);
			unset($fhandle);
			unset($content);
			unset($result);	
			//gc_collect_cycles();
			print "<br>MEMORY ITERATION:".$cnt.' ' . memory_get_usage()."<br>\n";
			if ($cnt == 10)
				break;
		}
		
		print "<br>MEMORY AFTER:".memory_get_usage()."<br>";
			
?>
