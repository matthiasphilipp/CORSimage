#Image CORS Class 
- to deliver Images with CORS-Header for Server without mod_header.c
It will allow any GET, POST, or OPTIONS requests from any origin.

In a production environment, you probably want to be more restrictive, but this gives you
the general idea of what is involved.  For the nitty-gritty low-down, read:

 - [https://developer.mozilla.org/en/HTTP_access_control](https://developer.mozilla.org/en/HTTP_access_control)
 - [http://www.w3.org/TR/cors/](http://www.w3.org/TR/cors/)


Usage
-------

``` php
/* general */
required("class.CORSimage.php");
$image = new CORSimage('filename'); // can be jpg, gif, png, svg
```

Acknowledgements
-------
Copyright © 2013 Matthias Philipp. Licensed under [MIT license](http://www.opensource.org/licenses/mit-license.php).
