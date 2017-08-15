# PHP-TOOLBOX
Some personal functions and great tips for PHP dev

# INSTALLATION
<pre>
include('path/to/TOOLBOX.php');
</pre>

# jsonOPEN($path)
JSON file to an associative array. The ".json" at the end of the path, is automatically set if needed

<pre>
$json_array = jsonOPEN("absolute/path/to/Myjson");
</pre>

# slack($message, $channel)
Send a slack notification in real time. Used in CLI to watch a long process or in web for clients stuffs incoming

<pre>
slack( "hey, how are you ?", "contact");
</pre>
