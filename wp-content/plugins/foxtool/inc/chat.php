<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $foxtool_options;
# add css js chat web
function foxtool_enqueue_chat(){
	global $foxtool_options;
	if (isset($foxtool_options['chat-nut1']) || isset($foxtool_options['chat-nav1'])){
	wp_enqueue_style('chat-css', FOXTOOL_URL . 'link/chat/foxchat.css', array(), FOXTOOL_VERSION);
	}
}
add_action('wp_enqueue_scripts', 'foxtool_enqueue_chat');
# add chat on
function foxtool_chat_mang(){
	global $foxtool_options;
	if (is_array($foxtool_options) || is_object($foxtool_options)) {	
	$cphone = '<svg width="100%" height="100%" viewBox="0 0 70 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><g transform="matrix(0.117188,0,0,0.117188,4.99027,4.99027)"><path d="M278.669,172.38L278.674,172.38C312.199,172.38 339.785,199.966 339.785,233.491L339.785,233.5C339.833,237.752 343.345,241.225 347.597,241.225C351.85,241.225 355.362,237.752 355.41,233.5C355.391,191.41 320.759,156.781 278.669,156.767C278.64,156.767 278.61,156.766 278.581,156.766C274.298,156.766 270.775,160.29 270.775,164.573C270.775,168.855 274.298,172.379 278.581,172.379C278.61,172.379 278.64,172.378 278.669,172.378L278.669,172.38ZM266.876,222.358C266.847,222.358 266.817,222.359 266.788,222.359C262.505,222.359 258.982,218.835 258.982,214.553C258.982,210.27 262.505,206.747 266.788,206.747L266.898,206.747C288.884,206.747 306.976,224.839 306.976,246.825L306.976,246.837C306.928,251.089 303.416,254.562 299.164,254.562C294.911,254.562 291.399,251.089 291.351,246.837L291.351,246.828C291.351,233.404 280.305,222.358 266.881,222.358L266.876,222.358ZM317.7,415.5C293.023,411.142 268.671,399.821 247.415,386.838C222.827,371.802 199.86,353.06 179.488,332.682C159.116,312.304 140.366,289.352 125.33,264.741C112.358,243.488 101.007,219.129 96.673,194.465C95.632,188.948 95.946,183.259 97.588,177.89C99.333,172.575 102.325,167.755 106.314,163.833L138.862,131.294C142.014,128.163 147.179,128.163 150.331,131.294L208.8,189.751C211.925,192.909 211.925,198.07 208.8,201.228L177.726,232.311C173.173,236.832 172.57,244.062 176.311,249.275C188.332,265.886 201.703,281.477 216.289,295.889C230.692,310.481 246.283,323.851 262.9,335.861C268.104,339.611 275.337,339.011 279.852,334.454L310.952,303.374C312.465,301.853 314.527,301.001 316.672,301.01C318.825,301.006 320.893,301.857 322.421,303.374L380.883,361.834C384.008,364.991 384.008,370.151 380.883,373.308L348.334,405.85C340.428,414.045 328.876,417.684 317.7,415.5ZM278.669,111.691C274.388,111.691 270.865,108.168 270.865,103.887C270.865,99.607 274.388,96.084 278.669,96.084L278.676,96.084C354.056,96.084 416.084,158.112 416.084,233.492L416.084,233.5C416.084,237.786 412.557,241.313 408.271,241.313C403.985,241.313 400.458,237.786 400.458,233.5C400.463,166.683 345.486,111.697 278.669,111.691Z" style="fill:#fff"/></g></svg>';
	$csms = '<svg width="100%" height="100%" viewBox="0 0 70 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><g transform="matrix(0.997822,0,0,0.997822,0.930331,-0.613378)"><g transform="matrix(0.0828071,0,0,0.0828071,13.8014,13.7597)"><path d="M430.691,229.613C369.316,229.613 319.383,179.684 319.383,118.309C319.383,104.297 321.992,90.883 326.742,78.523L59.797,78.523C26.824,78.523 -0,105.348 -0,138.32L-0,330.324C-0,363.297 26.824,390.125 59.797,390.125L75.977,390.125L75.977,476.008L204.262,390.125L371.277,390.125C404.25,390.125 431.074,363.297 431.074,330.324L431.074,229.609C430.949,229.609 430.82,229.613 430.691,229.613ZM312.055,286.902L126.883,286.902L126.883,256.898L312.055,256.898L312.055,286.902ZM312.055,214.219L126.883,214.219L126.883,184.215L312.055,184.215L312.055,214.219Z" style="fill:#fff;fill-rule:nonzero"/></g><g transform="matrix(1,0,0,1,-3.07233,-2.17795)"><circle cx="51.899" cy="26.044" r="5.66" style="fill:#fff"/></g></g></svg>';
	$cmessenger = '<svg width="100%" height="100%" viewBox="0 0 70 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><g transform="matrix(0.129883,0,0,0.129912,1.75004,1.74647)"><g id="Layer_2"><g id="Color"><g id="_38.Messenger"><path id="Icon" d="M256,121.263C181.592,121.263 121.263,177.179 121.263,246.164C121.557,284.737 140.214,320.949 171.453,343.579L171.992,387.604C172.025,389.299 173.428,390.676 175.124,390.676C175.667,390.676 176.201,390.534 176.674,390.265L218.745,366.383C230.901,369.598 243.426,371.206 256,371.166C330.408,371.166 390.737,315.251 390.737,246.265C390.737,177.28 330.408,121.263 256,121.263ZM266.105,286.316L237.305,256.337C235.613,254.59 232.947,254.176 230.804,255.326L180.278,282.543C180.017,282.667 179.731,282.731 179.442,282.731C178.37,282.731 177.488,281.849 177.488,280.777C177.488,280.314 177.653,279.865 177.954,279.512L237.811,216.421C238.625,215.549 239.767,215.054 240.96,215.054C242.153,215.054 243.295,215.549 244.109,216.421L272.842,246.973C274.526,248.758 277.221,249.188 279.377,248.017L329.061,221.069C329.364,220.883 329.712,220.784 330.068,220.784C331.121,220.784 331.988,221.651 331.988,222.704C331.988,223.233 331.77,223.738 331.385,224.101L272.505,286.484C271.688,287.399 270.517,287.923 269.29,287.923C268.079,287.923 266.922,287.413 266.105,286.518L266.105,286.316Z" style="fill:#fff;fill-rule:nonzero"/></g></g></g></g></svg>'; 
	$ctelegram = '<svg width="100%" height="100%" viewBox="0 0 70 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><g id="Artboard" transform="matrix(0.139052,0,0,0.139052,-0.155916,-0.888138)"><path id="Path-3" d="M115.88,253.298C190.509,220.783 240.274,199.347 265.173,188.991C336.267,159.421 351.04,154.284 360.668,154.114C362.786,154.077 367.521,154.602 370.588,157.091C375.138,160.783 375.164,168.797 374.659,174.101C370.806,214.581 354.136,312.814 345.655,358.152C342.066,377.336 335,383.769 328.16,384.398C313.294,385.766 302.005,374.573 287.606,365.135C265.075,350.365 252.346,341.171 230.475,326.759C205.2,310.103 221.585,300.949 235.989,285.988C239.759,282.073 305.26,222.494 306.528,217.089C306.687,216.413 306.834,213.893 305.337,212.563C303.84,211.233 301.631,211.687 300.037,212.049C297.777,212.562 261.783,236.353 192.055,283.421C181.838,290.437 172.584,293.855 164.293,293.676C155.152,293.479 137.57,288.508 124.499,284.259C108.467,279.048 95.725,276.292 96.835,267.442C97.413,262.831 103.761,258.117 115.88,253.298Z" style="fill:#fff"/></g></svg>';
	$czalo = '<svg width="100%" height="100%" viewBox="0 0 70 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><g transform="matrix(1.19021,0,0,1.19021,-265.052,-26.1769)"><g><path d="M244.4,45L234.2,45L234.2,47.2L241.3,47.2L234.3,55.8C234.1,56.1 233.9,56.4 233.9,57.1L233.9,57.7L243.5,57.7C244,57.7 244.4,57.3 244.4,56.8L244.4,55.6L237,55.6L243.5,47.4C243.6,47.3 243.8,47.1 243.9,47L243.9,46.9C244.3,46.3 244.4,45.9 244.4,45.3L244.4,45Z" style="fill:#fff;fill-rule:nonzero"/><path d="M257.4,57.6L258.8,57.6L258.8,45L256.6,45L256.6,56.9C256.7,57.3 257,57.6 257.4,57.6Z" style="fill:#fff;fill-rule:nonzero"/><path d="M249.9,47.8C247.2,47.8 244.9,50 244.9,52.8C244.9,55.6 247.1,57.8 249.9,57.8C252.7,57.8 254.9,55.6 254.9,52.8C254.9,50 252.7,47.8 249.9,47.8ZM249.9,55.7C248.3,55.7 247,54.4 247,52.8C247,51.2 248.3,49.9 249.9,49.9C251.5,49.9 252.8,51.2 252.8,52.8C252.8,54.4 251.6,55.7 249.9,55.7Z" style="fill:#fff;fill-rule:nonzero"/><path d="M265.3,47.7C262.5,47.7 260.3,49.9 260.3,52.7C260.3,55.5 262.5,57.7 265.3,57.7C268.1,57.7 270.3,55.5 270.3,52.7C270.3,49.9 268,47.7 265.3,47.7ZM265.3,55.7C263.7,55.7 262.4,54.4 262.4,52.8C262.4,51.2 263.7,49.9 265.3,49.9C266.9,49.9 268.2,51.2 268.2,52.8C268.2,54.3 266.9,55.7 265.3,55.7Z" style="fill:#fff;fill-rule:nonzero"/><path d="M253.7,57.6L254.9,57.6L254.9,48L252.9,48L252.9,56.7C252.9,57.2 253.3,57.6 253.7,57.6Z" style="fill:#fff;fill-rule:nonzero"/></g></g></svg>';
	$cwhatsapp = '<svg width="100%" height="100%" viewBox="0 0 70 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><g transform="matrix(0.117188,0,0,0.117188,5,5)"><g id="Layer_2"><g id="_09.whatsapp"><g id="icon"><path d="M368.873,143.127C339.069,113.026 298.424,96.072 256.064,96.072C168.977,96.072 97.315,167.734 97.315,254.821C97.315,279.829 103.225,304.487 114.56,326.778L97.716,408.553C97.363,410.197 97.711,411.917 98.676,413.295C100.106,415.409 102.711,416.421 105.193,415.825L185.338,396.829C207.289,407.739 231.471,413.418 255.983,413.418C343.054,413.418 414.703,341.769 414.703,254.698C414.703,212.941 398.225,172.827 368.873,143.127ZM343.884,342.575C306.191,380.161 248.354,389.561 200.698,365.847L189.527,360.32L140.393,371.956L140.538,371.345L150.72,321.891L145.251,311.098C120.893,263.259 130.159,204.798 168.116,166.836C216.333,118.635 295.667,118.635 343.884,166.836C344.082,167.064 344.296,167.278 344.524,167.476C392.13,215.79 391.842,294.611 343.884,342.575Z" style="fill:#fff;fill-rule:nonzero"/><path d="M339.52,306.298C333.498,315.782 323.985,327.389 312.029,330.269C291.084,335.331 258.938,330.444 218.938,293.149L218.444,292.713C183.273,260.102 174.138,232.96 176.349,211.433C177.571,199.215 187.753,188.16 196.335,180.945C198.404,179.18 201.036,178.209 203.756,178.209C208.285,178.209 212.405,180.9 214.225,185.047L227.171,214.138C228.883,217.977 228.333,222.463 225.745,225.775L219.2,234.269C216.333,237.85 215.928,242.841 218.182,246.836C221.847,253.265 230.633,262.72 240.378,271.476C251.316,281.367 263.447,290.415 271.127,293.498C275.323,295.212 280.165,294.195 283.316,290.938L290.909,283.287C293.888,280.35 298.23,279.237 302.255,280.378L333.004,289.105C337.877,290.601 341.227,295.132 341.227,300.23C341.227,302.371 340.636,304.471 339.52,306.298Z" style="fill:#fff;fill-rule:nonzero"/></g></g></g></g></svg>'; 
	$cmail = '<svg width="100%" height="100%" viewBox="0 0 70 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><g transform="matrix(0.117188,0,0,0.117188,5,5)"><path d="M277.216,97.344C224.864,90.72 174.4,108.736 138.688,147.168C103.04,185.6 88.736,237.568 99.456,289.792C111.904,350.272 158.688,398.144 218.656,411.776C231.2,414.656 243.744,416.064 256.128,416.064C280.736,416.064 304.736,410.464 326.944,399.456C334.848,395.52 338.08,385.92 334.176,377.984C330.208,370.048 320.672,366.88 312.704,370.752C285.984,384.032 255.904,387.424 225.76,380.576C178.72,369.888 140.576,330.784 130.816,283.36C122.176,241.376 133.632,199.68 162.144,168.928C190.688,138.208 231.104,123.712 273.12,129.088C336.352,137.28 384,194.688 384,262.688L384,272C384,289.664 369.664,304 352,304C334.336,304 320,289.664 320,272L320,208C320,199.168 312.832,192 304,192C297.44,192 291.84,195.968 289.376,201.6C279.84,195.584 268.64,192 256,192C218.304,192 192,221.6 192,264C192,306.4 218.304,336 256,336C275.872,336 292.416,327.616 303.776,313.6C315.52,327.2 332.672,336 352,336C387.296,336 416,307.296 416,272L416,262.688C416,178.656 356.352,107.584 277.216,97.344ZM256,304C236.256,304 224,288.672 224,264C224,239.328 236.256,224 256,224C275.744,224 288,239.328 288,264C288,288.672 275.744,304 256,304Z" style="fill:#fff;fill-rule:nonzero"/></g></svg>';
	$cmaps = '<svg width="100%" height="100%" viewBox="0 0 70 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><g transform="matrix(0.0952291,0,0,0.0952291,10.1997,10.3547)"><path d="M360,11.2C299.2,11.2 250,60 248,122.8C246.4,180.8 302,257.2 335.2,297.2C341.2,304.4 350.4,308.8 360,308.8C369.6,308.8 378.4,304.4 384.8,297.2C418,256.8 474,180.8 472,122.8C470,60 420.8,11.2 360,11.2ZM360,163.2C338,163.2 320,145.2 320,123.2C320,101.2 338,83.2 360,83.2C382,83.2 400,101.2 400,123.2C400,145.2 382,163.2 360,163.2Z" style="fill:#fff;fill-rule:nonzero"/><path d="M49.6,392.8C51.2,397.6 56,400.8 60.8,400.8C62,400.8 63.6,400.4 64.8,400L166.4,363.2L215.6,498.4C217.2,503.2 222,506.4 226.8,506.4C228,506.4 229.6,506 230.8,505.6C237.2,503.2 240.4,496.4 238,490.4L184.8,343.2L142.4,226.8C140,220.4 133.2,217.2 127.2,219.6C120.8,222 117.6,228.8 120,234.8L158.4,340L56.8,376.8C50.4,379.6 47.2,386.4 49.6,392.8Z" style="fill:#fff;fill-rule:nonzero"/><path d="M224.8,230.8L198.4,240.4L187.6,210.4C185.2,204 178.4,200.8 172.4,203.2C166,205.6 162.8,212.4 165.2,218.4L180,260C181.6,264.8 186.4,268 191.2,268C192.4,268 194,267.6 195.2,267.2L232.8,253.6C239.2,251.2 242.4,244.4 240,238.4C237.6,232.4 230.8,228.8 224.8,230.8Z" style="fill:#fff;fill-rule:nonzero"/><path d="M196.4,304.8L260.8,481.2C262.4,486 267.2,489.2 272,489.2C273.2,489.2 274.8,488.8 276,488.4C282.4,486 285.6,479.2 283.2,473.2L257.2,401.6L384.8,355.2L394.4,381.6C396,386.4 400.8,389.6 405.6,389.6C406.8,389.6 408.4,389.2 409.6,388.8C416,386.4 419.2,379.6 416.8,373.6L407.2,347.2L433.6,337.6C440,335.2 443.2,328.4 440.8,322.4C438.4,316 431.6,312.8 425.6,315.2L388,328.8L249.2,379.6L223.2,308L268,291.2C274.4,288.8 277.2,282 275.2,275.6C272.8,269.2 266,266.4 259.6,268.4L203.2,289.2C202.312,289.552 198.8,291.056 196.828,294.996C194.488,299.652 196.124,304.084 196.4,304.8Z" style="fill:#fff;fill-rule:nonzero"/></g></svg>';
    foreach ($foxtool_options as $key => $value) {
			if (preg_match('/^chat-nut1(\d+)$/', $key, $matches)) {
				$i = $matches[1];
				if (isset($foxtool_options['chat-nut1'.$i])) {
					$chat_option = $foxtool_options['chat-nut1'.$i];
					$chat_text = isset($foxtool_options['chat-nut2'.$i]) ? $foxtool_options['chat-nut2'.$i] : __('Not entered', 'foxtool');
					$chat_value = isset($foxtool_options['chat-nut3'.$i]) ? $foxtool_options['chat-nut3'.$i] : NULL;
					$chat_new = isset($foxtool_options['chat-nut-new']) ? 'target="_blank"' : NULL;
					switch ($chat_option) {
						case 'Phone':
							echo '<a class="ft-cco ft-cpho" rel="nofollow noopener sponsored" title="Phone" href="tel:'. $chat_value .'">'. $cphone .'<span>'. $chat_text .'</span></a>';
							break;
						case 'SMS':
							echo '<a class="ft-cco ft-csms" rel="nofollow noopener sponsored" title="SMS" href="sms:'. $chat_value .'">'. $csms .'<span>'. $chat_text .'</span></a>';
							break;
						case 'Messenger':
							echo '<a class="ft-cco ft-cmes" '. $chat_new .' rel="nofollow noopener sponsored" title="Messenger" href="https://m.me/'. $chat_value .'">'. $cmessenger .'<span>'. $chat_text .'</span></a>';
							break;
						case 'Telegram':
							echo '<a class="ft-cco ft-ctel" '. $chat_new .' rel="nofollow noopener sponsored" title="Telegram" href="https://telegram.me/'. $chat_value .'">'. $ctelegram .'<span>'. $chat_text .'</span></a>';
							break;
						case 'Zalo':
							echo '<a class="ft-cco ft-czal" '. $chat_new .' rel="nofollow noopener sponsored" title="Zalo" href="https://zalo.me/'. $chat_value .'">'. $czalo .'<span>'. $chat_text .'</span></a>';
							break;
						case 'Whatsapp':
							echo '<a class="ft-cco ft-cwha" '. $chat_new .' rel="nofollow noopener sponsored" title="Whatsapp" href="https://wa.me/'. $chat_value .'">'. $cwhatsapp .'<span>'. $chat_text .'</span></a>';
							break;
						case 'Mail':
							echo '<a class="ft-cco ft-cmai" rel="nofollow noopener sponsored" title="Mail" href="mailto:'. $chat_value .'">'. $cmail .'<span>'. $chat_text .'</span></a>';
							break;
						case 'Maps':
							echo '<a class="ft-cco ft-cmap" '. $chat_new .' rel="nofollow noopener sponsored" title="Maps" href="https://www.google.com/maps/search/'. $chat_value .'">'. $cmaps .'<span>'. $chat_text .'</span></a>';
							break;
					}
				}
			}
		}
	}
	return;
}
function foxtool_add_chat(){
    global $foxtool_options;
	
	// chat on
	if (isset($foxtool_options['chat-nut1'])){
		// skin 1 chat
		$chatmo = isset($foxtool_options['chat-nav1']) ? 'chaton-mobile' : NULL;
		if (isset($foxtool_options['chat-nut-skin']) && $foxtool_options['chat-nut-skin'] == 'Total'){ ?>
			<div class="ft-chatbox-skin1 <?php echo $chatmo; ?>">
				<?php echo foxtool_chat_mang(); ?>
			</div>
			<?php
			$lr1 = !empty($foxtool_options['chat-nut-lr']) && isset($foxtool_options['chat-nut-mar']) && $foxtool_options['chat-nut-mar'] != 'Right' ? '.ft-chatbox-skin1{left:'. $foxtool_options['chat-nut-lr'] .'px;}' : NULL;
			$lr2 = !empty($foxtool_options['chat-nut-lr']) && isset($foxtool_options['chat-nut-mar']) && $foxtool_options['chat-nut-mar'] == 'Right' ? 'right:'. $foxtool_options['chat-nut-lr'] .'px;' : NULL;
			$mar = isset($foxtool_options['chat-nut-mar']) && $foxtool_options['chat-nut-mar'] == 'Right' ? '.ft-chatbox-skin1{'. $lr2 .'left:auto;}.ft-chatbox-skin1 a:hover span{left:auto;right:55px;}' : NULL;
			if(!empty($foxtool_options['chat-nut-bot']) && $foxtool_options['chat-nut-bot'] < 300 ){
				$bot = '.ft-chatbox-skin1{bottom:'. $foxtool_options['chat-nut-bot'] .'px;}';
			} elseif (!empty($foxtool_options['chat-nut-bot']) && $foxtool_options['chat-nut-bot'] >= 300 ){
				$bot = '.ft-chatbox-skin1{bottom:50%;}';
			} else { 
				$bot = NULL; 
			}
			$ope = !empty($foxtool_options['chat-nut-op']) ? '.ft-chatbox-skin1 svg{opacity:'. $foxtool_options['chat-nut-op'] .';}' : NULL;
			$radi = !empty($foxtool_options['chat-nut-rus']) ? '.ft-chatbox-skin1 svg, .ft-chatbox-skin1 a:hover span{border-radius:'. $foxtool_options['chat-nut-rus'] .'px;}' : NULL;
			$ico = !empty($foxtool_options['chat-ico-color']) ? '.ft-cco svg{background:'. $foxtool_options['chat-ico-color'] . ' !important;}' : NULL;
			if(!empty($foxtool_options['chat-nut-mar'])){
			echo '<style>'. $lr1 . $mar . $bot . $ope . $radi . $ico .'</style>';
			}
		// skin 2 chat
		} else if (isset($foxtool_options['chat-nut-skin']) && $foxtool_options['chat-nut-skin'] == 'Effective'){ ?>
			<div class="ft-chatbox-skin2 <?php echo $chatmo; ?>">
				<?php echo foxtool_chat_mang(); ?>
			</div>
			<?php
			$lr2 = !empty($foxtool_options['chat-nut-lr']) && isset($foxtool_options['chat-nut-mar']) && $foxtool_options['chat-nut-mar'] == 'Right' ? '.ft-chatbox-skin2{left:auto;right:0px;}.ft-chatbox-skin2 a:hover span{left:auto;right:45px;}' : NULL;
			if(!empty($foxtool_options['chat-nut-bot']) && $foxtool_options['chat-nut-bot'] < 300 ){
				$bot = '.ft-chatbox-skin2{bottom:'. $foxtool_options['chat-nut-bot'] .'px;}';
			} elseif (!empty($foxtool_options['chat-nut-bot']) && $foxtool_options['chat-nut-bot'] >= 300 ){
				$bot = '.ft-chatbox-skin2{bottom:50%;}';
			} else { 
				$bot = NULL; 
			}
			$ope = !empty($foxtool_options['chat-nut-op']) ? '.ft-chatbox-skin2 svg{opacity:'. $foxtool_options['chat-nut-op'] .';}' : NULL;
			$ico = !empty($foxtool_options['chat-ico-color']) ? '.ft-cco svg{background:'. $foxtool_options['chat-ico-color'] . ' !important;}' : NULL;
			if(!empty($foxtool_options['chat-nut-mar'])){
			echo '<style>'. $lr2 . $bot . $ope . $ico .'</style>';
			}
		// skin 3 chat	
		} else if (isset($foxtool_options['chat-nut-skin']) && $foxtool_options['chat-nut-skin'] == 'Leaves'){ ?>
			<div class="ft-chatbox-skin3 <?php echo $chatmo; ?>">
				<?php echo foxtool_chat_mang(); ?>
			</div>
			<?php
			$lr1 = !empty($foxtool_options['chat-nut-lr']) && isset($foxtool_options['chat-nut-mar']) && $foxtool_options['chat-nut-mar'] != 'Right' ? '.ft-chatbox-skin3{left:'. $foxtool_options['chat-nut-lr'] .'px;}' : NULL;
			$lr2 = !empty($foxtool_options['chat-nut-lr']) && isset($foxtool_options['chat-nut-mar']) && $foxtool_options['chat-nut-mar'] == 'Right' ? 'right:'. $foxtool_options['chat-nut-lr'] .'px;' : NULL;
			$mar = isset($foxtool_options['chat-nut-mar']) && $foxtool_options['chat-nut-mar'] == 'Right' ? '.ft-chatbox-skin3{'. $lr2 .'left:auto;}.ft-chatbox-skin3 a:hover span{left:auto;right:55px;}' : NULL;
			if(!empty($foxtool_options['chat-nut-bot']) && $foxtool_options['chat-nut-bot'] < 300 ){
				$bot = '.ft-chatbox-skin3{bottom:'. $foxtool_options['chat-nut-bot'] .'px;}';
			} elseif (!empty($foxtool_options['chat-nut-bot']) && $foxtool_options['chat-nut-bot'] >= 300 ){
				$bot = '.ft-chatbox-skin3{bottom:50%;}';
			} else { 
				$bot = NULL; 
			}
			$ope = !empty($foxtool_options['chat-nut-op']) ? '.ft-chatbox-skin3 svg{opacity:'. $foxtool_options['chat-nut-op'] .';}' : NULL;
			$radi = !empty($foxtool_options['chat-nut-rus']) ? '.ft-chatbox-skin3 svg, .ft-chatbox-skin3 a:hover span{border-radius:0px '. $foxtool_options['chat-nut-rus'] .'px 0px '. $foxtool_options['chat-nut-rus'] .'px;}' : NULL;
			$ico = !empty($foxtool_options['chat-ico-color']) ? '.ft-cco svg{background:'. $foxtool_options['chat-ico-color'] . ' !important;}' : NULL;
			if(!empty($foxtool_options['chat-nut-mar'])){
			echo '<style>'. $lr1 . $mar . $bot . $ope . $radi . $ico .'</style>';
			}
		// skin 4 chat	
		} else if (isset($foxtool_options['chat-nut-skin']) && $foxtool_options['chat-nut-skin'] == 'Floating'){ ?>
			<div class="ft-chatbox-skin4 <?php echo $chatmo; ?>">
				<?php echo foxtool_chat_mang(); ?>
			</div>
			<?php
			$lr1 = !empty($foxtool_options['chat-nut-lr']) && isset($foxtool_options['chat-nut-mar']) && $foxtool_options['chat-nut-mar'] != 'Right' ? '.ft-chatbox-skin4{left:'. $foxtool_options['chat-nut-lr'] .'px;}' : NULL;
			$lr2 = !empty($foxtool_options['chat-nut-lr']) && isset($foxtool_options['chat-nut-mar']) && $foxtool_options['chat-nut-mar'] == 'Right' ? 'right:'. $foxtool_options['chat-nut-lr'] .'px;' : NULL;
			$mar = isset($foxtool_options['chat-nut-mar']) && $foxtool_options['chat-nut-mar'] == 'Right' ? '.ft-chatbox-skin4{'. $lr2 .'left:auto;}.ft-chatbox-skin4 a:hover span{left:auto;right:55px;}' : NULL;
			if(!empty($foxtool_options['chat-nut-bot']) && $foxtool_options['chat-nut-bot'] < 300 ){
				$bot = '.ft-chatbox-skin4{bottom:'. $foxtool_options['chat-nut-bot'] .'px;}';
			} elseif (!empty($foxtool_options['chat-nut-bot']) && $foxtool_options['chat-nut-bot'] >= 300 ){
				$bot = '.ft-chatbox-skin4{bottom:50%;}';
			} else { 
				$bot = NULL; 
			}
			$ope = !empty($foxtool_options['chat-nut-op']) ? '.ft-chatbox-skin4 svg{opacity:'. $foxtool_options['chat-nut-op'] .';}' : NULL;
			$radi = !empty($foxtool_options['chat-nut-rus']) ? '.ft-chatbox-skin4 svg, .ft-chatbox-skin4 a:hover span{border-radius:'. $foxtool_options['chat-nut-rus'] .'px;}' : NULL;
			$ico = !empty($foxtool_options['chat-ico-color']) ? '.ft-chatbox-skin4 .ft-cpho svg path, .ft-chatbox-skin4 .ft-csms svg path, .ft-chatbox-skin4 .ft-cmes svg path, .ft-chatbox-skin4 .ft-ctel svg path, .ft-chatbox-skin4 .ft-czal svg path, .ft-chatbox-skin4 .ft-cwha svg path, .ft-chatbox-skin4 .ft-cmai svg path, .ft-chatbox-skin4 .ft-cmap svg path{fill:'. $foxtool_options['chat-ico-color'] . ' !important;} .ft-chatbox-skin4 svg{border:2px solid '. $foxtool_options['chat-ico-color'] . ' !important}' : NULL;
			if(!empty($foxtool_options['chat-nut-mar'])){
			echo '<style>'. $lr1 . $mar . $bot . $ope . $radi . $ico .'</style>';
			}
		// skin mac dinh chat
		} else {
			$defaultIcon = '<svg width="100%" height="100%" viewBox="0 0 70 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><g transform="matrix(0.136295,0,0,0.136295,0.0974349,0.0969444)"><path d="M278.669,172.38L278.674,172.38C312.199,172.38 339.785,199.966 339.785,233.491L339.785,233.5C339.833,237.752 343.345,241.225 347.597,241.225C351.85,241.225 355.362,237.752 355.41,233.5C355.391,191.41 320.759,156.781 278.669,156.767C278.64,156.767 278.61,156.766 278.581,156.766C274.298,156.766 270.775,160.29 270.775,164.573C270.775,168.855 274.298,172.379 278.581,172.379C278.61,172.379 278.64,172.378 278.669,172.378L278.669,172.38ZM266.876,222.358C266.847,222.358 266.817,222.359 266.788,222.359C262.505,222.359 258.982,218.835 258.982,214.553C258.982,210.27 262.505,206.747 266.788,206.747L266.898,206.747C288.884,206.747 306.976,224.839 306.976,246.825L306.976,246.837C306.928,251.089 303.416,254.562 299.164,254.562C294.911,254.562 291.399,251.089 291.351,246.837L291.351,246.828C291.351,233.404 280.305,222.358 266.881,222.358L266.876,222.358ZM317.7,415.5C293.023,411.142 268.671,399.821 247.415,386.838C222.827,371.802 199.86,353.06 179.488,332.682C159.116,312.304 140.366,289.352 125.33,264.741C112.358,243.488 101.007,219.129 96.673,194.465C95.632,188.948 95.946,183.259 97.588,177.89C99.333,172.575 102.325,167.755 106.314,163.833L138.862,131.294C142.014,128.163 147.179,128.163 150.331,131.294L208.8,189.751C211.925,192.909 211.925,198.07 208.8,201.228L177.726,232.311C173.173,236.832 172.57,244.062 176.311,249.275C188.332,265.886 201.703,281.477 216.289,295.889C230.692,310.481 246.283,323.851 262.9,335.861C268.104,339.611 275.337,339.011 279.852,334.454L310.952,303.374C312.465,301.853 314.527,301.001 316.672,301.01C318.825,301.006 320.893,301.857 322.421,303.374L380.883,361.834C384.008,364.991 384.008,370.151 380.883,373.308L348.334,405.85C340.428,414.045 328.876,417.684 317.7,415.5ZM278.669,111.691C274.388,111.691 270.865,108.168 270.865,103.887C270.865,99.607 274.388,96.084 278.669,96.084L278.676,96.084C354.056,96.084 416.084,158.112 416.084,233.492L416.084,233.5C416.084,237.786 412.557,241.313 408.271,241.313C403.985,241.313 400.458,237.786 400.458,233.5C400.463,166.683 345.486,111.697 278.669,111.691Z" style="fill:#fff"/></g></svg>';
			if (isset($foxtool_options['chat-nut-ico'])) {
				switch ($foxtool_options['chat-nut-ico']) {
					case 'Icon2':
						$ico = '<svg width="100%" height="100%" viewBox="0 0 70 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><g transform="matrix(0.0851563,0,0,0.0851563,13.2,13.2)"><g><path d="M256,0C114.848,0 0,114.848 0,256L0,496C0,504.832 7.168,512 16,512L256,512C397.152,512 512,397.152 512,256C512,114.848 397.152,0 256,0ZM272,320L144,320C135.168,320 128,312.832 128,304C128,295.168 135.168,288 144,288L272,288C280.832,288 288,295.168 288,304C288,312.832 280.832,320 272,320ZM368,224L144,224C135.168,224 128,216.832 128,208C128,199.168 135.168,192 144,192L368,192C376.832,192 384,199.168 384,208C384,216.832 376.832,224 368,224Z" style="fill:#fff;fill-rule:nonzero"/></g></g></svg>';
						break;
					case 'Icon3':
						$ico = '<svg width="100%" height="100%" viewBox="0 0 70 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><g transform="matrix(0.0851563,0,0,0.0903548,13.2,11.8692)"><path d="M307.66,465.229C307.66,447.533 293.314,433.187 275.618,433.187L236.382,433.187C227.884,433.187 219.734,436.563 213.725,442.572C207.716,448.581 204.34,456.731 204.34,465.229C204.34,482.925 218.686,497.271 236.382,497.271L275.618,497.271C293.314,497.271 307.66,482.925 307.66,465.229ZM67.361,382.606C72.713,383.015 79.188,383.25 85.692,382.869C89.157,400.441 97.765,416.739 110.614,429.589C127.672,446.646 150.807,456.229 174.93,456.229L187.156,456.229C186.617,459.179 186.34,462.19 186.34,465.229C186.34,468.302 186.617,471.311 187.148,474.229L174.93,474.229C146.033,474.229 118.319,462.75 97.886,442.317C81.585,426.015 70.982,405.08 67.361,382.606ZM58.205,363.453C43.994,361.057 30.77,354.301 20.447,343.977C7.355,330.885 0,313.128 0,294.613L0,252.07C0,233.555 7.355,215.798 20.447,202.706C33.539,189.614 51.296,182.258 69.811,182.258L74.458,182.258C81.886,88.502 160.328,14.729 256,14.729C351.672,14.729 430.114,88.502 437.542,182.258L442.189,182.258C460.704,182.258 478.461,189.614 491.553,202.706C504.645,215.798 512,233.555 512,252.07L512,294.613C512,313.128 504.645,330.885 491.553,343.977C478.461,357.07 460.704,364.425 442.189,364.425L421.588,364.425C413.044,364.425 406.118,357.498 406.118,348.955L406.118,196.847C406.118,113.939 338.908,46.729 256,46.729C173.092,46.729 105.882,113.939 105.882,196.847L105.882,348.955C105.882,354.987 102.429,360.214 97.391,362.765C83.523,367.577 62.016,364.096 58.205,363.453Z" style="fill:#fff"/></g></svg>';
						break;
					case 'Icon4':
						$ico = '<svg width="100%" height="100%" viewBox="0 0 70 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><g transform="matrix(0.0851561,0,0,0.0882948,13.2,12.3965)"><g><path d="M492.381,104.546C472.735,77.513 438.33,53.113 395.505,35.843C352.91,18.667 303.454,9.168 256.245,9.101C209.032,8.983 159.515,18.384 116.859,35.426C73.959,52.567 39.473,76.861 19.755,103.83C0.817,129.732 -4.641,157.651 3.97,184.569C9.557,202.03 25.852,213.78 44.528,213.807L108.479,213.867L108.543,213.867C121.295,213.866 133.276,208.284 141.418,198.545C149.474,188.91 152.81,176.318 150.574,163.996C150.508,163.634 150.429,163.275 150.338,162.918L146.973,149.836C165.607,140.945 207.827,123.767 256.048,124.04C304.234,124.287 346.425,141.455 365.081,150.35L361.662,163.358C361.565,163.727 361.482,164.097 361.414,164.47C359.143,176.785 362.444,189.386 370.471,199.044C378.6,208.824 390.589,214.442 403.374,214.461L467.325,214.521L467.389,214.521C486.03,214.52 502.33,202.825 507.958,185.4C516.651,158.489 511.265,130.531 492.381,104.546Z" style="fill:#fff;fill-rule:nonzero"/></g><g><path d="M400.596,279.807L352.906,229.732C350.022,226.704 346.024,224.991 341.843,224.991L311.023,224.991L311.023,204.168C311.023,195.731 304.183,188.89 295.745,188.89C287.307,188.89 280.467,195.73 280.467,204.168L280.467,224.991L231.545,224.991L231.545,204.168C231.545,195.731 224.705,188.89 216.267,188.89C207.829,188.89 200.989,195.73 200.989,204.168L200.989,224.991L170.17,224.991C165.989,224.991 161.99,226.705 159.107,229.732L111.417,279.807C74.025,319.069 53.432,370.551 53.432,424.769L53.432,487.622C53.432,496.06 60.272,502.9 68.71,502.9L443.302,502.9C451.74,502.9 458.58,496.06 458.58,487.622L458.58,424.769C458.581,370.551 437.988,319.07 400.596,279.807ZM256.006,447.054C211.916,447.054 176.047,411.184 176.047,367.094C176.047,323.005 211.917,287.135 256.006,287.135C300.095,287.135 335.965,323.005 335.965,367.094C335.965,411.184 300.095,447.054 256.006,447.054Z" style="fill:#fff;fill-rule:nonzero"/></g><g><path d="M256.006,317.691C228.764,317.691 206.603,339.853 206.603,367.094C206.603,394.336 228.765,416.498 256.006,416.498C283.247,416.498 305.409,394.336 305.409,367.094C305.409,339.854 283.247,317.691 256.006,317.691Z" style="fill:#fff;fill-rule:nonzero"/></g></g></svg>';
						break;
					case 'Icon5':
						$ico = '<svg width="100%" height="100%" viewBox="0 0 70 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><g transform="matrix(0.0996465,0,0,0.0996743,9.49049,9.45768)"><g id="Layer_2"><path d="M59.947,59.947C29.653,90.027 29.653,187.947 59.947,217.387C82.68,233.994 110.585,242.01 138.667,240C166.749,242.01 194.653,233.994 217.387,217.387C247.68,187.307 247.68,89.387 217.387,59.947C187.093,30.507 90.027,29.653 59.947,59.947Z" style="fill:#fff;fill-rule:nonzero"/><path d="M59.947,294.613C29.653,324.693 29.653,422.613 59.947,452.053C82.68,468.661 110.585,476.677 138.667,474.667C166.749,476.677 194.653,468.661 217.387,452.053C247.68,421.973 247.68,324.053 217.387,294.613C187.093,265.173 90.027,264.32 59.947,294.613Z" style="fill:#fff;fill-rule:nonzero"/><path d="M373.333,240C401.415,242.01 429.32,233.994 452.053,217.387C482.347,187.307 482.347,89.387 452.053,59.947C421.76,30.507 324.053,29.653 294.613,59.947C265.173,90.24 264.32,187.947 294.613,217.387C317.347,233.994 345.251,242.01 373.333,240Z" style="fill:#fff;fill-rule:nonzero"/><path d="M294.613,294.613C264.32,324.693 264.32,422.613 294.613,452.053C317.347,468.661 345.251,476.677 373.333,474.667C401.415,476.677 429.32,468.661 452.053,452.053C482.347,421.973 482.347,324.053 452.053,294.613C421.76,265.173 324.693,264.32 294.613,294.613Z" style="fill:#fff;fill-rule:nonzero"/></g></g></svg>';
						break;
					default:
						$ico = $defaultIcon;
				}
			} else {
				$ico = $defaultIcon;
			}
			?>
			<div class="ft-chatbox <?php echo $chatmo; ?>">
			<div class="ft-chaton-full" id="ft-chaton2" style="display:none" onclick="ftnone(event, 'ft-chaton');ftnone(event, 'ft-chaton2');"></div>
			<div class="ft-chaton" id="ft-chaton" style="display:none">
				<div class="ft-chaton-scroll">
				<?php echo foxtool_chat_mang(); ?>
				</div>
			</div>
			  <button title="<?php _e('Contact', 'foxtool'); ?>" id="chatona" onclick="ftnone(event, 'ft-chaton');ftnone(event, 'ft-chaton2');"><?php echo $ico; ?></button>
			</div>
			<?php
			$cor = !empty($foxtool_options['chat-nut-color']) ? '.ft-chatbox #chatona{background:'. $foxtool_options['chat-nut-color'] .';}@keyframes logo {0% {box-shadow: 0 0 0 0px '. $foxtool_options['chat-nut-color'] .',0 0 0 0px '. $foxtool_options['chat-nut-color'] .';} 100% {box-shadow: 0 0 0 7px rgba(0,210,255,0),0 0 0 30px rgba(0,210,255,0);}}' : NULL;
			$lr1 = !empty($foxtool_options['chat-nut-lr']) && isset($foxtool_options['chat-nut-mar']) && $foxtool_options['chat-nut-mar'] != 'Right' ? '.ft-chatbox{left:'. $foxtool_options['chat-nut-lr'] .'px;}' : NULL;
			$lr2 = !empty($foxtool_options['chat-nut-lr']) && isset($foxtool_options['chat-nut-mar']) && $foxtool_options['chat-nut-mar'] == 'Right' ? 'right:'. $foxtool_options['chat-nut-lr'] .'px;' : NULL;
			$mar = isset($foxtool_options['chat-nut-mar']) && $foxtool_options['chat-nut-mar'] == 'Right' ? '.ft-chatbox{'. $lr2 .'left:auto;text-align:right;}.ft-chaton::after{right:0;left:auto;margin-right:10px;}' : NULL;
			if(!empty($foxtool_options['chat-nut-bot']) && $foxtool_options['chat-nut-bot'] < 300 ){
				$bot = '.ft-chatbox{bottom:'. $foxtool_options['chat-nut-bot'] .'px;}';
			} elseif (!empty($foxtool_options['chat-nut-bot']) && $foxtool_options['chat-nut-bot'] >= 300 ){
				$bot = '.ft-chatbox{bottom:50%;}';
			} else { 
				$bot = NULL; 
			}
			$ope = !empty($foxtool_options['chat-nut-op']) ? '.ft-chatbox #chatona{opacity:'. $foxtool_options['chat-nut-op'] .';}' : NULL;
			$radi = !empty($foxtool_options['chat-nut-rus']) ? '.ft-chatbox #chatona, .ft-chaton svg{border-radius:'. $foxtool_options['chat-nut-rus'] .'px;}' : NULL;
			$ico = !empty($foxtool_options['chat-ico-color']) ? '.ft-cco svg{background:'. $foxtool_options['chat-ico-color'] . ' !important;}' : NULL;
			if(!empty($foxtool_options['chat-nut-mar'])){
			echo '<style>'. $cor . $lr1 . $mar . $bot . $ope . $radi . $ico .'</style>';
			}
		}
	}
	// chat navi
	if(isset($foxtool_options['chat-nav1'])){ 
		$nav0_svg = !empty($foxtool_options['chat-nav01']) ? '<i>'. $foxtool_options['chat-nav01']. '</i>' : null;
		$nav0_tit = !empty($foxtool_options['chat-nav02']) ? $foxtool_options['chat-nav02'] : null;
		$nav0_link = !empty($foxtool_options['chat-nav03']) ? 'title="'. $nav0_tit .'" href="'. $foxtool_options['chat-nav03'] .'"' : 'title="'. $nav0_tit .'" onclick="ftnone(event, \'ft-navi-chaton\');"';
		$nav0 = !empty($foxtool_options['chat-nav01']) ? '<a '. $nav0_link .'>'. $nav0_svg .'<span class="ft-navi-span">'. $nav0_tit .'</span></a>' : null;
		$nav1 = !empty($foxtool_options['chat-nav11']) ? '<a title="'. $foxtool_options['chat-nav21'] .'" href="'. $foxtool_options['chat-nav31'] .'">'. $foxtool_options['chat-nav11'] .'<span class="ft-navi-span">'. $foxtool_options['chat-nav21'] .'</span></a>' : null;
		$nav2 = !empty($foxtool_options['chat-nav12']) ? '<a title="'. $foxtool_options['chat-nav22'] .'" href="'. $foxtool_options['chat-nav32'] .'">'. $foxtool_options['chat-nav12'] .'<span class="ft-navi-span">'. $foxtool_options['chat-nav22'] .'</span></a>' : null; 
		$nav3 = !empty($foxtool_options['chat-nav13']) ? '<a title="'. $foxtool_options['chat-nav23'] .'" href="'. $foxtool_options['chat-nav33'] .'">'. $foxtool_options['chat-nav13'] .'<span class="ft-navi-span">'. $foxtool_options['chat-nav23'] .'</span></a>' : null; 
		$nav4 = !empty($foxtool_options['chat-nav14']) ? '<a title="'. $foxtool_options['chat-nav24'] .'" href="'. $foxtool_options['chat-nav34'] .'">'. $foxtool_options['chat-nav14'] .'<span class="ft-navi-span">'. $foxtool_options['chat-nav24'] .'</span></a>' : null;
	// chat navi skin
		$momo1 = '';
		$momo2 = '';
	if (isset($foxtool_options['chat-nav-skin']) && $foxtool_options['chat-nav-skin'] == 'Simple'){
		$navclass1 = 'navi-skin2'; $navclass2 = 'navi-chat-skin2'; $navclass3 = 'ft-navi-cen1';
		$navicon = $nav0;
	} else if (isset($foxtool_options['chat-nav-skin']) && $foxtool_options['chat-nav-skin'] == 'Docky'){
		$navclass1 = 'navi-skin3'; $navclass2 = 'navi-chat-skin3'; $navclass3 = 'ft-navi-cen2';
		$navicon = $nav0;
	} else if (isset($foxtool_options['chat-nav-skin']) && $foxtool_options['chat-nav-skin'] == 'Momo'){
		$navclass1 = 'navi-skin1'; $navclass2 = 'navi-chat-skin1'; $navclass3 = 'ft-navi-cen-momo';
		$navicon = '<div class="ft-navi-cen-but ft-navi-cen-but-momo"><a '. $nav0_link .'>'. $nav0_svg .'<br><span class="ft-navi-cen-span">'. $nav0_tit .'</span></a></div>';
		$momo1 = '<div class="ft-menu-border"></div>';
		$momo2 = '<div class="ft-svg-container"><svg viewBox="0 0 202.9 45.5"><clipPath id="menu" clipPathUnits="objectBoundingBox" transform="scale(0.0049285362247413 0.021978021978022)"><path d="M6.7,45.5c5.7,0.1,14.1-0.4,23.3-4c5.7-2.3,9.9-5,18.1-10.5c10.7-7.1,11.8-9.2,20.6-14.3c5-2.9,9.2-5.2,15.2-7
			  c7.1-2.1,13.3-2.3,17.6-2.1c4.2-0.2,10.5,0.1,17.6,2.1c6.1,1.8,10.2,4.1,15.2,7c8.8,5,9.9,7.1,20.6,14.3c8.3,5.5,12.4,8.2,18.1,10.5
			  c9.2,3.6,17.6,4.2,23.3,4H6.7z"/></clipPath></svg></div>';
	} else {
		$navclass1 = 'navi-skin1'; $navclass2 = 'navi-chat-skin1'; $navclass3 = 'ft-navi-cen';
		$navicon = '<div class="ft-navi-cen-but"><a '. $nav0_link .'>'. $nav0_svg .'<br><span class="ft-navi-cen-span">'. $nav0_tit .'</span></a></div>';
	}
	// chat on on navi		
	if (isset($foxtool_options['chat-nut1']) && empty($foxtool_options['chat-nav03'])){ ?>
		<div class="ft-navi-chaton <?php echo $navclass2; ?>" id="ft-navi-chaton" style="display:none">
			<div class="ft-chaton-scroll">
			<?php echo foxtool_chat_mang(); ?>
			</div>
		</div>
	<?php } ?>
	<div class="ft-boxnavi <?php echo $navclass1; ?>">
	<div class="ft-navi">
		<div><?php echo $nav1; ?></div>
		<div><?php echo $nav2; ?></div>
		<div class="<?php echo $navclass3; ?>"><?php echo $navicon; ?></div>
		<div><?php echo $nav3; ?></div>
		<div><?php echo $nav4; ?></div>
	</div>
		<?php echo $momo1; ?>
	</div>
		<?php echo $momo2; ?>
	<?php
	// chat on
	$radi = !empty($foxtool_options['chat-nut-rus']) ? '.ft-navi-chaton svg{border-radius:'. $foxtool_options['chat-nut-rus'] .'px;}' : NULL;
	$ico = !empty($foxtool_options['chat-ico-color']) ? '.ft-navi-chaton svg{background:'. $foxtool_options['chat-ico-color'] . ' !important;}' : NULL;
	// navi
	$navi1 = !empty($foxtool_options['chat-nav-c1']) ? '--navicolor:'. $foxtool_options['chat-nav-c1'] .';' : NULL;
	$navi2 = !empty($foxtool_options['chat-nav-c2']) ? '--backchatbg:'. $foxtool_options['chat-nav-c2'] .';' : NULL;
	$navi3 = !empty($foxtool_options['chat-nav-c3']) ? '--bordcolor:'. $foxtool_options['chat-nav-c3'] .';' : NULL;
	$navi4 = !empty($foxtool_options['chat-nav-c4']) ? '--backcolor:'. $foxtool_options['chat-nav-c4'] .';' : NULL;
	$navi5 = !empty($foxtool_options['chat-nav-c5']) ? '--backchatcolor:'. $foxtool_options['chat-nav-c5'] .';' : NULL;
	$navi6 = !empty($foxtool_options['chat-nav-c6']) ? '--textchatcolor:'. $foxtool_options['chat-nav-c6'] .';' : NULL;
	$navi = ($navi1 || $navi2 || $navi3 || $navi4 || $navi5 || $navi6) ? ':root{'. $navi1 . $navi2 . $navi3 . $navi4 . $navi5 . $navi6 .'}' : NULL; 
	echo '<style>'. $navi . $radi . $ico .'</style>';
	}
	// chat tawk
	if(isset($foxtool_options['chat-tawk1']) && !empty($foxtool_options['chat-tawk11'])){
		echo $foxtool_options['chat-tawk11'];	
	}
}
add_action('wp_footer', 'foxtool_add_chat');