<?php

class PhpCache{
	var $durata;
	var $cache_url;
	var $nome_pagina;
	
	/* Costruttore - i parametri sono:
	   i minuti di vita della cache e il percorso che sara
	   relativo alla locazione dello script
	*/
	function PhpCache($minuti,$percorso){
		$this->durata = intval($minuti) * 60;
		$this->cache_url = $percorso;
	}
	
	// Funzione di start della cache
	function start(){
		ob_start();
		// prelevo il nome della pagina attuale e creo il percorso nella cache
		$this->nome_pagina = $this->cache_url."".$this->paginaCorrente();
		/* se il file esiste in cache e la versione è ancora valida rispetto al tempo di vita
		   allora includo il file in cache e non vado oltre
		*/
		if (file_exists($this->nome_pagina) && ((time() - $this->durata) < filemtime($this->nome_pagina))) 
		{
			include($this->nome_pagina);
			exit;
		}
	}
	
	// Funzione di stop della cache
	function stop(){
		// Scriviamo il contenuto del buffer nel file di cache
		$file = fopen($this->nome_pagina, 'w');
		fwrite($file, ob_get_contents());
		fclose($file);
		// Chiudiamo il buffer
		ob_end_flush();
	}
	
	// Metodo che restituisce il nome della pagina [eventuali parametri compresi]
	function paginaCorrente() {
		$pagina_corrente = $_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI']; 
		$pezzi = explode("/",$pagina_corrente);
		$pagina_corrente = $pezzi[count($pezzi)-1];
		return $pagina_corrente;
	}
}
?>