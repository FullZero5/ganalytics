<?php
namespace Flextype;
/**
 *
 * Flextype Google Analytics Plugin
 *
 * @author Fullzero5 <fullzero5@gmail.com>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 use Flextype\Component\{Event\Event, Registry\Registry};
 
 Event::addListener('onThemeHeader', function () {
     
     $ua_setings = Registry::get('plugins.ganalytics.UA');
     if(isset($ua_setings)){
       echo ganalytics($ua_setings);  
     } 
     
 });
 
 /**
 * Return Google Analytics code paste in header site
 *
 * @param  string  $ua UA-XXXXX-Y
 * @return string
 */
function ganalytics(string $ua) : string {
    return "
        <!-- Google Analytics -->
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', '{$ua}', 'auto');
        ga('send', 'pageview');
        </script>
        <!-- End Google Analytics -->
        ";
}
