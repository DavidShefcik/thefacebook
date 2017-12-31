<!DOCTYPE html>
  <head>
  		<meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Thefacebook</title>
      <style><?php
      	$css = file_get_contents("style.css");
      	$css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);
      	echo $css;
      ?></style>
      <link rel="icon" href="images/favicon.ico">
  </head>
