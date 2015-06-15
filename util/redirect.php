<?php

/**
 * $url로 redirect 합니다.
 */
function redirect($url) {
	header("Location: $url");
}
