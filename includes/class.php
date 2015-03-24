<?php
if(!defined('LINK_PREVIEW')) return;
$linkPreview = new linkPreview();

class linkPreview {

	public function __construct() {
		$this->_api_host = 'http://api.linkpreview.net/';
	}

	/**
	 * Fetch data from LinkPreview
	 */
	public function get_url_data($url) {
		$linkpreview_settings = linkpreview_get_settings();
		if ($linkpreview_settings['linkpreview_cache_time'] > 0) $json = get_transient('lp_'.md5($url));
		if (!$json) {
			$query = http_build_query(array('q'=>$url,'key'=>$linkpreview_settings['linkpreview_api_key']));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $this->_api_host.'?'.$query);
			$data = curl_exec($ch);
			curl_close($ch);
			$json = $data;
			if (!$json) return false;
			$prepare = json_decode($json);
			$source_url = parse_url($prepare->url);
			if ($prepare->title == '' && $prepare->description == '') return false;
			$prepare->host_url = $source_url['host'];
			$prepare->host_scheme = $source_url['scheme'];
			if ($linkpreview_settings['linkpreview_favicon'] == 'on') {
				$favicon_url = $source_url['scheme'].'://'.$source_url['host'].'/favicon.ico';
				$prepare->favicon = $this->uri_exists($favicon_url);
			}
			$json = json_encode($prepare);
			if ($linkpreview_settings['linkpreview_cache_time'] > 0) set_transient('lp_'.md5($url),$json,$linkpreview_settings['linkpreview_cache_time']);
		}
		$object = json_decode($json);
		return $object;
	}

    /**
     * Static view
     */
    public function showtime($url) {
		ob_start();
		$object = $this->get_url_data($url);
		// if ($object->video == "yes") {
			// preg_match('/src="([^"]+)"/', stripslashes($object->videoIframe), $match);
			// $link = $match[1];
		// }
		// else $link = $object->url;
		if ($object) include(LINKPREVIEW_STATIC_VIEW);
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}

	/**
	 * Filter out specific links
	 */
	public function is_file($url) {
		$linkpreview_settings = linkpreview_get_settings();
		$file_formats = explode(',', $linkpreview_settings['linkpreview_filter_out']);
		$path_info = pathinfo($url);
		if (isset($path_info['extension']) && in_array(strtolower($path_info['extension']), $file_formats)) {
		   return true;
		}
		return false;
	}

	/**
	 * Filter out classes
	 */
	public function is_class($class) {
		$linkpreview_settings = linkpreview_get_settings();
		$classes = explode(" ", $class);
		$exclude_classes = explode(',', $linkpreview_settings['linkpreview_exclude_class']);
		foreach ($exclude_classes as $exclude_class) {
			if (in_array($exclude_class, $classes)) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Check if uri (favicon) exists
	 */
	public function uri_exists($url) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_exec($ch);
		$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
		curl_close($ch);
		if ($retcode == 404) return null;
		if (preg_match('/text\/html/',$content_type)) return null;
		else return $url;
	}
}