# PPVC
PHP Page View Counter

## What it does
PPVC counts how many views are on a page, only counting new IPs.

### How It Works
PPVC uses text documents to store the amount of views, if the IP has not already visited the page. It finds this out by making a text document called the IP and trying to find this document.
It can also be used across servers, as all it requires is the ability to create and edit files.

### How do I use it?
To use PPVC, download the file 'linkcounter.php'. Include these files in the file to count the views from using `<?php include 'url/linkcounter.php'; ?>`, and _ta-da_, you now have a working page counter! **REMEMBER**, to do this, you must have file/folder creation permissions. You can edit your `php.ini` file to do this.

### Can I use it on another server from this one?
No, you can't. If PHP allowed including files on another server, however, you could. So sad :(
