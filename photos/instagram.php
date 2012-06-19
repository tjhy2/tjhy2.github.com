
<!DOCTYPE html>
<!--[if IEMobile 7 ]><html class="no-js iem7"><![endif]-->
<!--[if lt IE 9]><html class="no-js lte-ie8"><![endif]-->
<!--[if (gt IE 8)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title>instagram - 太极</title>
  <meta name="author" content="Your Name">

  
  <meta name="description" content="Instagram Jun 19th, 2012 <?php $access_token='19120281.12eb222.1614fb6d1334221222d66fcd5f258fb'; $count_images=90; $cache_time=60; $image_size=' &hellip;">
  

  <!-- http://t.co/dKP3o1e -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <link rel="canonical" href="http://tjhy2.github.com/photos/instagram.php">
  <link href="/favicon.png" rel="icon">
  <link href="/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css">
  <script src="/javascripts/modernizr-2.0.js"></script>
  <script src="/javascripts/ender.js"></script>
  <script src="/javascripts/octopress.js" type="text/javascript"></script>
  <link href="/atom.xml" rel="alternate" title="太极" type="application/atom+xml">
  <!--Fonts from Google"s Web font directory at http://google.com/webfonts -->
<link href="http://fonts.googleapis.com/css?family=PT+Serif:regular,italic,bold,bolditalic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic" rel="stylesheet" type="text/css">

  

</head>

<body   >
  <header role="banner"><hgroup>
  <h1><a href="/">太极</a></h1>
  
    <h2>A blogging framework for hackers.</h2>
  
</hgroup>

</header>
  <nav role="navigation"><ul class="subscription" data-subscription="rss">
  <li><a href="/atom.xml" rel="subscribe-rss" title="subscribe via RSS">RSS</a></li>
  
</ul>
  
<form action="http://google.com/search" method="get">
  <fieldset role="search">
    <input type="hidden" name="q" value="site:tjhy2.github.com" />
    <input class="search" type="text" name="q" results="0" placeholder="Search"/>
  </fieldset>
</form>
  
<ul class="main-navigation">
  <li><a href="/">Blog</a></li>
  <li><a href="/photos">Photo</a></li>
  <li><a href="/blog/archives">Archives</a></li>
</ul>

</nav>
  <div id="main">
    <div id="content">
      <div>
<article role="article">
  
  <header>
    <h1 class="entry-title">Instagram</h1>
    <p class="meta">








  


<time datetime="2012-06-19T11:28:00+08:00" pubdate data-updated="true">Jun 19<span>th</span>, 2012</time></p>
  </header>
  
  <?php

  $access_token='19120281.12eb222.1614fb6d1334221222d66fcd5f258fb';
  $count_images=90;
  $cache_time=60;
  $image_size='thumbnail';
  
  /**
  Output each image with HTML markup
 */
  function echoimage($val, $imagesize) {
      $image = $val["images"][$imagesize]["url"];
      $link = $val["link"];
      $tag=md5($link);
      return "<a href=\"$link\" target=\"_blank\"><img src=\"$image\"/></a>";
      }
      
  /**
  Getting the Data from the API
 */
  function getDataFromApi($token, $number){
      // Instagram API bearbeiten
      $url="https://api.instagram.com/v1/users/self/media/recent/?access_token=$token&count=$number";
      $contents = file_get_contents($url);
      return $contents;
  }
  
  /**
  Gets the Data from either the Cache or the API
 */
  function getData($token, $number, $cache_time){

      $cache_folder = "your cache path";
  
      if(!is_dir($cache_folder)){
        if(mkdir($cache_folder, 0777) == false){
          return getDataFromApi($token, $number);
        }
      }
  
      $cachefile = $cache_folder."user.cache";
  
      if (file_exists($cachefile) && time()-filemtime($cachefile)<$cache_time) {
        try{
          $contents = file_get_contents($cachefile);
        }catch(Exception $e){
          $contents = getDataFromApi($token, $number);
          file_put_contents($cachefile, $contents);
        }
  
      } else {
        $contents = getDataFromApi($token, $number);
        file_put_contents($cachefile, $contents);
      }
  
      return $contents;
  }
  
  $json = json_decode(getData($access_token, $count_images, $cache_time), true);

  echo '<div class="photosdiv">';
  foreach ($json["data"] as $value)
      echo echoimage($value, $image_size);
  echo '</div>';
  
?>
  
    <footer>
      <p class="meta">
        
        








  


<time datetime="2012-06-19T11:28:00+08:00" pubdate data-updated="true">Jun 19<span>th</span>, 2012</time>
        
      </p>
      
        <div class="sharing">
  
  <a href="http://twitter.com/share" class="twitter-share-button" data-url="http://tjhy2.github.com/photos/instagram.php" data-via="" data-counturl="http://tjhy2.github.com/photos/instagram.php" >Tweet</a>
  
  
  
</div>

      
    </footer>
  
</article>

  <section>
    <h1>Comments</h1>
    <div id="disqus_thread" aria-live="polite"><noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>
  </section>

</div>

<aside class="sidebar">
  
    <section>
  <h1>Recent Posts</h1>
  <ul id="recent_posts">
    
      <li class="post">
        <a href="/blog/2012/06/18/hello-world/">Hello World</a>
      </li>
    
  </ul>
</section>






<section>
  <h1>weibo</h1>
  <ul id="weibo">
    <li>
      <iframe width="100%" height="550" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=550&fansRow=2&ptype=1&speed=0&skin=1&isTitle=1&noborder=1&isWeibo=1&isFans=1&uid=1065653160&verifier=8c7c607d&dpc=1"></iframe>
    </li>
  </ul>
</section>

  
</aside>


    </div>
  </div>
  <footer role="contentinfo"><p>
  Copyright &copy; 2012 - Your Name -
  <span class="credit">Powered by <a href="http://octopress.org">Octopress</a></span>
</p>

</footer>
  

<script type="text/javascript">
      var disqus_shortname = 'tjhy2';
      
        
        // var disqus_developer = 1;
        var disqus_identifier = 'http://tjhy2.github.com/photos/instagram.php';
        var disqus_url = 'http://tjhy2.github.com/photos/instagram.php';
        var disqus_script = 'embed.js';
      
    (function () {
      var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
      dsq.src = 'http://' + disqus_shortname + '.disqus.com/' + disqus_script;
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    }());
</script>







  <script type="text/javascript">
    (function(){
      var twitterWidgets = document.createElement('script');
      twitterWidgets.type = 'text/javascript';
      twitterWidgets.async = true;
      twitterWidgets.src = 'http://platform.twitter.com/widgets.js';
      document.getElementsByTagName('head')[0].appendChild(twitterWidgets);
    })();
  </script>





</body>
</html>
