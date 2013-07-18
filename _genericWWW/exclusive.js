/**
 * Created with IntelliJ IDEA.
 * User: filiperp
 * Date: 04/07/13
 * Time: 01:57
 * To change this template use File | Settings | File Templates.
 */



function startGA(){
    console.log("start ga");
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42475130-1', 'mdb2013.bbi.net.br');
    ga('send', 'pageview');
/*
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-42475130-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

    _gaq.push(['_setDomainName', 'none']);
    _gaq.push(['_setAllowLinker', true]);*/

 //  window.plugins.analytics.start("UA-41162029-1", function(){console.log("GA SUCCESS");}, function(){console.log("GA: failure");});
}




function trackAndroidGAEvent(category, action, label, value){
    console.log('trackWebGAEvent',1,category,2, action,3, label,4, value)
    _gaq.push(['_trackEvent', category, action, label, value]);
 //   window.plugins.analytics.trackEvent(category, action, event, 1, onSuccessGAEvent,onFailGAEvent);
}

function onSuccessGAEvent(){
    alert("trackAndroidGAEvent: success");
}



function onFailGAEvent(){
    alert("trackAndroidGAEvent: FAIL");
}
