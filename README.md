# Bitcraft Core (BCC): *The Core Development Framework for the Bitcraft Module Library*

**Bitcraft Core** is the backend system that allows for the implementation of our library modules. We aren't fans of the MVC systems that are available to date and we didn't see an easy way to implement what it is that we wanted to do, therefore we thought *"Why not write our own?"* and here we are.

Any questions regarding this project, contact [support@bitcraftlabs.net](mailto:support@bitcraftlabs.net) with the keyword *Bitcraft Core* in the subject line.

*Any issues with the code can be directed [here](https://github.com/joshuanasiatka/Bitcraft-Core/issues).*

### Directory Structure
```
/                       root
  core/                 mvc
     bits/              add-on/packages
     cache/             client storage
        <custom>/       --- holds configs
           img/         ------ holds images
        pref/           --- preferences; not sure if necessary
     config/            application configuration
     lib/               dependencies
	    <bower>/
        .bowerrc
        bower.json
     res/               resources
        css/
        img/
        js/
     serv/              pages
        content/          reusable page parts - Views
     skel/              page building - Controllers
     src/               mvc classes - Models
     Genesis.php        inits page creation
  index.php             loads mvc framework; requires Genesis.php
  install.sh            install script that currently targets bower

```
