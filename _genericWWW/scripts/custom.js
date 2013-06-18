var dashes =
{
    mercadoDemografia: {
        id: "mercadoDemografia",
        icon: "images/midiaDados/mercadoDemografia3.png",
        color: "#fbc136",
        title: "MERCADO & DEMOGRAFIA"
    },
    pesquisaMidia: {
        id: "pesquisaMidia",
        icon: "images/midiaDados/pesquisaMidia3.png",
        color: "#f17831",
        title: "PESQUISA DE MÍDIA"
    },
    adHoc: {
        id: "adHoc",
        icon: "images/midiaDados/adhoc3.png",
        // color: "#2396b7",
        color: "#ed1c24",
        title: "PESQUISA AD HOC"
    },
    televisao: {
        id: "televisao",
        icon: "images/midiaDados/televisao3.png",
        color: "#d33f90",
        title: "TELEVISÃO"

    },
    tvAssinatura: {
        id: "tvAssinatura",
        icon: "images/midiaDados/tvAssinatura3.png",
        color: "#633c92",
        title: "TV POR ASSINATURA"
    },

    radio: {
        id: "radio",
        icon: "images/midiaDados/radio3.png",
        color: "#2198ba",
        //  color: "#ef4431",
        title: "RÁDIO"
    },


    revista: {
        id: "revista",
        icon: "images/midiaDados/revista3.png",
        color: "#70bf4d",
        title: "REVISTA"
    },
    jornal: {
        id: "jornal",
        icon: "images/midiaDados/jornal3.png",
        color: "#f68d31",
        title: "JORNAL"
    },
    entretenimento: {
        id: "entretenimento",
        icon: "images/midiaDados/entretenimento3.png",
        color: "#ec412f",
        title: "ENTRETENIMENTO"
    },
    midiaOutHome: {
        id: "midiaOutHome",
        icon: "images/midiaDados/midiaOutHome3.png",
        color: "#843f91",
        title: "MÍDIA OUT-OF-HOME"
    },
    midiaDigital: {
        id: "midiaDigital",
        icon: "images/midiaDados/midiaDigital3.png",
        color: "#2f7aad",
        // color: "#2f7bae",
        title: "MÍDIA DIGITAL"
    },
    custoMidia: {
        id: "custoMidia",
        icon: "images/midiaDados/custoMidia3.png",
        color: "#bccd3f",
        //color: "#ef4431",
        title: "CUSTOS DE MÍDIA"
    },
    americaLatina: {
        id: "americaLatina",
        icon: "images/midiaDados/americaLatina3.png",
        color: "#f07731",
        title: "AMÉRICA LATINA"

    },
    midiaInternacional: {
        id: "midiaInternacional",
        icon: "images/midiaDados/midiaInternacional3.png",
        color: "#16a8a8",
        title: "MÍDIA INTERNACIONAL"
    }

};

const FRAME_WIDTH = 1024;
var FRAME_HEIGHT = 768;//795 + 22;
const TOP_MENU_HEIGHT = 48;
var MENU_LINK_ONLINE = 'https://mdb.bbi.net.br/json2.php';
var MENU_SIZE = 335;
var isOffline = true;
var currentElement = null;
var initialState = true;

var mode = '';

$(window).load(function () {
    $('#theHeader').css('opacity', 0);
    //  console.log(navigator.network.connection.type);
    // mobile || web

    mode = 'web';

    switch (mode) {

        case 'mobile':
            FRAME_HEIGHT = 768;
            MENU_LINK_ONLINE = 'https://mdb.bbi.net.br/json2.php';
            app.initialize();
            break;
        case 'web':
        default:
            FRAME_HEIGHT = 795 + 20;
            MENU_LINK_ONLINE = 'https://mdb.bbi.net.br/json3.php';
            isOffline = false;
            loadMenu();
            break;
    }


});


var app = {
    initialize: function () {
        this.bindEvents();
    },
    bindEvents: function () {
        document.addEventListener('deviceready', this.onDeviceReady, false);
        document.addEventListener('resume', this.onDeviceResume, false);
        document.addEventListener('pause', this.onDevicePause, false);
    },
    onDeviceReady: function () {


        if (navigator.network.connection.type == 'none') {
            isOffline = true;
            loadMenu();
        } else {
            isOffline = false;
            loadMenu();
        }

    },
    onDeviceResume: function () {
        location.reload(true);
        // onReadyPage();
    },
    onDevicePause: function () {


    }
};


$(document).ready(function () {

});


function loadMenu() {
    if (isOffline) {
        generateApp(offlineData);
    }
    else {
        $.ajax({
            type: 'GET',
            url: MENU_LINK_ONLINE,
            dataType: 'json',
            success: function (menuData) {
                var newData = {};
                var currentTema = "";
                $.each(menuData, function (key, value) {
                    if (typeof(value) == 'string') {
                        currentTema = value;
                        newData[currentTema] = [];
                    } else {
                        if (currentTema != "") {
                            newData[currentTema].push(value)
                        }
                    }

                });


                generateApp(newData);
            }
        });
    }


}

function showSideBar() {
    //setTitle('');
    $("#sideBar").show();
    $('#mainPageContent').animate({
        left: MENU_SIZE + 'px',
        width: $(window).width() - MENU_SIZE
    }, 500, 'easeInOutExpo', function () {

    });

    $('#theContentContainer,  #theEmptyContent,.videoBG_wrapper , .videoBG, #theVideoBG,#leMainTitle').animate({
        width: $(window).width() - MENU_SIZE
    }, 500, 'easeInOutExpo', function () {

    });


    $('.show-sidebar').hide();
    $('.hide-sidebar').show();
    return false
}

function hideSideBar() {
    // setTitle('MDB Pro 2013');
    $('#mainPageContent').animate({
        left: '0px',
        width: $(window).width() + 'px'
    }, 500, 'easeInOutExpo');
    $('#theContentContainer,  #theEmptyContent, .videoBG_wrapper , .videoBG, #theVideoBG, #leMainTitle').animate({
        width: $(window).width() + 'px'
    }, 500, 'easeInOutExpo', function () {
        $("#sideBar").hide();
    });


    $('.show-sidebar').show();
    $('.hide-sidebar').hide();
    return false;
}


var listItensDash = [];

function generateApp(menuData) {
    var counter = 0;
    $.each(dashes, function (key, value) {
        if (menuData[key]) {
            var s = value.color;
            var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
            var matches = patt.exec(s);
            var rgb = "rgba(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + ",1);";

            $("#leMenu").append(
                ' <div class="menu-item " style="background-image: none; background-color:' + rgb + '" id="itemMenu' + key + '" data-dash="' + counter++ + '" >\n' +
                    // '<strong class="features-icon"></strong>\n' +
                    '<strong class="" style="background-image:url(' + value.icon + ');background-position:0 9px;"></strong>\n' +
                    '<a class="menu-disabled deploy-submenu theFont" href="#">' + value.title + '</a>\n' +
                    '<div class="clear"></div>\n' +
                    '<div class="submenu" id="subMenu' + key + '" >\n' +
                    '</div>\n' +
                    '</div>\n'
            );


            var baseURL = isOffline ? '.' : '';
            for (var i = 0; i < menuData[key].length; i++) {

                var elm = menuData[key][i];
                var lastItem = i == menuData[key].length - 1 ? '1' : "0";
                var idash = $('<a href="javascript:void(0);" ' +
                    'id="menuItem' + key + i + '" ' +
                    'class="theFontItem itemDash " ' +
                    'style="background-color: rgba(255, 255, 255, 0.4);" ' +
                    'data-ad="' + elm.ad + '" ' +
                    'data-title="' + elm.titulo + '" ' +
                    'data-classmenu="menuItem' + key + '" ' +
                    'data-index="' + i + '" ' +
                    'data-last="' + lastItem + '" ' +
                    'data-sectiontitle="' + value.title + '" ' +
                    'data-element="' + baseURL + elm.link + '">' + elm.titulo + '</a>\n' +

                    '<em class="submenu-decoration"></em>\n');
                listItensDash.push(idash);

                $('#subMenu' + key).append(idash);


            }
        }


    });
    $('.itemDash').hover(function () {
        if ($(this).css("background-color") == 'rgba(255, 255, 255, 0.4)') {
            $(this).css("background-color", 'rgba(255, 255, 255, 0.6)');
        }
    }, function () {
        if ($(this).css("background-color") == 'rgba(255, 255, 255, 0.6)') {
            $(this).css("background-color", 'rgba(255, 255, 255, 0.4)');
        }

    });
    $("#btnNext").click(function () {
        if (parseInt($(".itemDashSelected").first().data("last")) == 0) {

            var elem = $(".itemDashSelected").first().data("classmenu") + (parseInt($(".itemDashSelected").first().data("index")) + 1);
            console.log(elem);
            $("#" + elem).trigger('click');
        } else {
            showMessage('<h4>Este é o último gráfico do assunto </h4><h4>' + $(".itemDashSelected").first().data("sectiontitle") + '</h4>')
        }
    });
    $("#btnPrev").click(function () {
        if (parseInt($(".itemDashSelected").first().data("index")) > 0) {

            var elem = $(".itemDashSelected").first().data("classmenu") + (parseInt($(".itemDashSelected").first().data("index")) - 1);
            console.log(elem);
            $("#" + elem).trigger('click');
        }
        else {
            showMessage('<h4>Este é o primeiro gráfico do assunto </h4><h4>' + $(".itemDashSelected").first().data("sectiontitle") + '</h4>')
        }
    });

    $(".itemDash").click(
        function () {

            setTitle($(this).data('sectiontitle'));

            $("#theEmptyContent").unbind("click").animate({ opacity: 0}, 500, 'linear');
            initialState = false;
            $('#theHeader').animate({opacity: 1});
            hideSideBar();
            $('.itemDash').css("background-color", 'rgba(255, 255, 255, 0.4)');
            $('.itemDash').removeClass("itemDashSelected");
            $(this).css("background-color", 'rgba(255, 255, 255, 0.8)');
            $(this).addClass("itemDashSelected");
            //  $('#preloader').animate({opacity: 1}, 500, 'linear');
            currentElement = $(this);
            $('#theContentContainer').animate({opacity: 0},
                {
                    duration: 500,
                    easing: 'linear',
                    complete: function () {
                        elem = currentElement;
                        //  setTitle($(data).html());
                        if (isOffline) {
                            // $('#theContentContainer').html('<img  style="width: 100%;max-height: '+FRAME_HEIGHT+'px;  max-width: '+FRAME_WIDTH+'px; height: auto;" class="" src="' + $(data).data('element') + '"  id="myFrame"></img>');
                            $('#theContentContainer').html(
                                '<div id="myFrame"' +
                                    'style="  ' +
                                    '   text-align:center; ' +
                                    // '   background-position: 0 0; ' +
                                    '   background-image: url(' + $(elem).data('element') + '); ' +
                                    '   background-repeat:no-repeat;' +
                                    '   width:' + FRAME_WIDTH + 'px;' +
                                    '   height:' + FRAME_HEIGHT + 'px;' +

                                    ' "></div>');

                            $('#myFrame').bind('click', function () {

                                showMessage("<h2>Atenção!</h2>" +
                                    "<h4>Esta aplicação está sendo executada <br>no modo off-line.</h4> " +
                                    "<h4>Verifique sua conexão com a internet <br>e reinicie a aplicação.</h4>");
                                /* $.fancybox(
                                 "<h2>Atenção!</h2>" +
                                 "<h4>Esta aplicação está sendo executada no modo off-line. " +
                                 "Verifique sua conexão com a internet e reinicie a aplicação.</h4>",

                                 {
                                 maxWidth: '250',
                                 maxHeight: '150'
                                 }); */
                            });
                        } else {
                            caption = '';
                            switch (mode) {

                                case 'mobile':

                                    break;
                                case 'web':
                                default:
                                    caption = ' <div id="dashCaptions"></div>';
                                    break;
                            }
                            $('#theContentContainer').html(

                                '<div id="myFrame" style=" -webkit-transition: all .1s linear ; width:' + FRAME_WIDTH + 'px;height: ' + FRAME_HEIGHT + 'px;" >' +
                                    '   <iframe  id="dashFrame"   ' +
                                    '       src="' + $(elem).data('element') + '"  ' +
                                    '       frameborder="0"  scrolling="no" ' +
                                    '       width="' + FRAME_WIDTH + '" height="' + FRAME_HEIGHT + '" > ' +
                                    '   </iframe>' +
                                    caption +
                                    '</div>'


                            );

                            resizeIframe();
                        }

                        $('#myFrame').css({
                            left: ((FRAME_WIDTH - (FRAME_WIDTH * scale)) >> 1) + ($("#mainPageContent").width() >> 1) - (( $('#myFrame').width() >> 1) * scale),
                            top: -((FRAME_HEIGHT - (FRAME_HEIGHT * scale)) >> 1)

                        });

                        $(this).delay(100).animate({ opacity: 1 }, 500, 'linear');
                        $('#preloader').animate({opacity: 0}, 500, 'linear');
                    }
                });

            return false;
        }
    );


    $('#mainPageContent').bind('resize', resizeIframe);
    onResize();


    $('.show-sidebar').click(function () {
        showSideBar();
    });

    $('.hide-sidebar').click(function () {
        hideSideBar();
    });


    $('.page-content').click(function () {
        //233  hideSideBar();

    });


    $('.deploy-submenu').click(function () {
        var topScroll = 0;
        var toggletime = 500;
        var opacitytime = 200;
        if (!$(this).parent().find('.submenu').is(":visible")) {
            //$('.itemDash').animate({ opacity: 0}, opacitytime, 'linear');
            // $('.submenu-decoration').animate({ opacity: 0}, opacitytime>>1, 'linear');

            $('.submenu').hide(toggletime >> 1, 'linear');

            $(this).parent().find('.submenu').toggle(toggletime, 'easeInOutExpo');
            setTimeout(function () {
                //   $('.itemDash').animate({ opacity: 1}, opacitytime, 'linear');
                // $('.submenu-decoration').animate({ opacity:1}, opacitytime>>1, 'linear');
            }, 700)
            /*   $('.itemDash').each(function () {
             if($(this).height()>35){
             $(this).css('line-height','15px !important');
             }
             });   */
            topScroll = 118 + (parseInt($($(this).parent()[0]).data('dash')) * 51);


        } else {
            // $('.itemDash').animate({ opacity: 0}, opacitytime, 'linear');
            //  $('.submenu-decoration').animate({ opacity: 0}, opacitytime>>1, 'linear');
            $(this).parent().find('.submenu').toggle(toggletime, 'easeInOutExpo');
            setTimeout(function () {
                //    $('.itemDash').animate({ opacity: 1}, opacitytime, 'linear');
                //   $('.submenu-decoration').animate({ opacity:1}, opacitytime>>1, 'linear');
            }, 700)

        }

        $("#page-sidebar-scroll").animate({
            scrollTop: topScroll
        }, toggletime, 'linear');


        // setTimeout(function(){

        //},1000)


        return false;
    });

    $(".sidebar-logo").click(function () {
        initialState = true;
        $('.submenu').hide('slow', 'easeInOutExpo');
        $('#theHeader').animate({opacity: 0});
        $('#theContentContainer').animate({opacity: 0}, 500, 'linear', function () {
            $('#theContentContainer').html('<div class="emptyContent" id="theEmptyContent"></div>').animate({opacity: 1}, 500);
            showSideBar();
            setTimeout(onResize, 500);
            setTimeout(startLoop, 600);

        });

    });
    $("#tutorialIcon").click(function () {

        showMessage('<img src="images/tutorial_' + mode + '.png"> </img> ')
        /*  $.fancybox(


         ); */
    });
    showSideBar();
    $("#mainPageContent, #sideBar").hide();
    $("#status").delay(400).fadeOut();

    $("#preloader").delay(600).fadeOut("slow", function () {
        $("#initMovie").css({
            'background-image': 'url(images/ad.jpg)',
            'background-repeat': 'no-repeat',
            'background-color': '#ffff',
            'background-position': 'center center',
            'background-size': 'contain',
            'margin-left': '0px !important',
            'margin-right': '0px !important',
            'width': $(window).width(),
            'height': $(window).height()
        });

        $("#initMovie").click(function(){
            window.open("http://www.google.com.br/ads")
        });

        $("#initMovie").fadeIn('slow', function () {    //slow


            $("#initMovie").delay(3000).fadeOut('slow', function () {
                $("#initMovie").unbind('click');
                $("#initMovie").css({
                    'background-image': 'url(images/splashes/horizontal.png)',
                    'background-repeat': 'no-repeat',

                    'background-position': 'center center',
                    'background-size': 'contain',
                    'margin-left': '0px !important',
                    'margin-right': '0px !important',
                    'width': $(window).width(),
                    'height': $(window).height()
                });
                $("#initMovie").fadeIn('slow', function () {

                    $("#initMovie").delay(1500).fadeOut('slow', function () {    //1500 , slow

                        $("#mainPageContent, #sideBar").fadeIn('slow', function () {

                            //
                            onResize();
                            startLoop();
                        });
                    });
                });
            });
        });


    });
    $("#initMovie").show();


    /* COM VIDEO
     $("#initMovie").fadeIn('slow', function () {
     $("#initMovie").css({

     'width': $(window).width(),
     'height': $(window).height()
     })
     $("#initMovie").videoBG({
     webm: 'videos/splash.webm',
     scale: true,
     zIndex: 0,
     loop: false,
     width: $(window).width(),
     height: $(window).height(),
     textReplacement: true
     });
     $("#theVideoBG").bind("ended", function () {
     $("#initMovie").fadeOut('slow', function () {
     $("#mainPageContent, #sideBar").fadeIn('slow', function () {
     //
     startLoop();
     });
     })


     });




     })  */


}

function showMessage(msg) {
    $.fancybox(
        '<div class="well" style="margin-bottom: 0 !important">' + msg + '</div>'

    );
}

//resize controller
window.onresize = function () {
    onResize();

};


function onResize() {

    if (initialState) {
        var diff = $('#mainPageContent').position().left < MENU_SIZE ? 0 : MENU_SIZE;
        $('#theContentContainer, #theEmptyContent,.videoBG_wrapper , .videoBG, #theVideoBG,#mainPageContent, #leMainTitle ').css('width', $(window).width() - diff);
        $('#theContentContainer, #mainPageContent').css('height', $(window).height());
        $('#theEmptyContent,.videoBG_wrapper , .videoBG, #theVideoBG').css('height', $(window).height());
//        $('#theEmptyContent,.videoBG_wrapper , .videoBG, #theVideoBG').css('height', $(window).height() - TOP_MENU_HEIGHT);
    } else {
        var propH = $(window).width() / FRAME_WIDTH;
        scale = propH > 1 ? 1 : propH;
        console.log(scale);
        scale = 1;
        var diff = $('#mainPageContent').position().left < MENU_SIZE ? 0 : MENU_SIZE;


        // $('#myFrame').css({
        //   '-webkit-transform': 'scale(' + scale + ')'
        // '-webkit-transform':'perspective(500) translateZ(-100px)'
        // });

        $('#myFrame').css({
            // left: -((FRAME_WIDTH - (FRAME_WIDTH * scale)) >> 1) + ($("#mainPageContent").width() >> 1) - (( $('#myFrame').width() >> 1) * scale),
            left: diff != 0 ? 0 : -((FRAME_WIDTH - (FRAME_WIDTH * scale)) >> 1) + ($("#mainPageContent").width() >> 1) - (( $('#myFrame').width() >> 1) * scale),
            top: -((FRAME_HEIGHT - (FRAME_HEIGHT * scale)) >> 1)

        });

        //  $("#leBody").css('-webkit-transform','scale('+scale+')');

        /*  var diff = $('#mainPageContent').position().left < MENU_SIZE ? 0 : MENU_SIZE;
         $('#theContentContainer, .emptyContent,#mainPageContent, #leMainTitle ').css('width', $(window).width() - diff);
         $('#theContentContainer, #mainPageContent').css('height', $(window).height());
         $('#theEmptyContent').css('height', $(window).height() - TOP_MENU_HEIGHT);
         $('#leBody').css('height', $(window).height());
         $('#leBody').css('width', $(window).width());
         $('#leBody').css('-webkit-transform','scale('+scale+')');*/


        $('#theContentContainer, #theEmptyContent,.videoBG_wrapper , .videoBG, #theVideoBG, #mainPageContent, #leMainTitle ').css('width', $(window).width() - diff);

        var h = (FRAME_HEIGHT * scale) + TOP_MENU_HEIGHT > $(window).height() ? (FRAME_HEIGHT * scale) + TOP_MENU_HEIGHT : $(window).height();
        $('#theContentContainer, #mainPageContent').css('height', h);
        $('#theEmptyContent').css('height', FRAME_HEIGHT);
//        $('#theEmptyContent').css('height', ((FRAME_HEIGHT - TOP_MENU_HEIGHT) ));
        $('.videoBG_wrapper , .videoBG, #theVideoBG').css('height', FRAME_HEIGHT);


        // $('#leBody').css('height', $(window).height());
        //$('#leBody').css('width', $(window).width());
        // $('#leBody').css('-webkit-transform','scale('+scale+')');
    }


}

function resizeIframe() {
    /* console.log(isOffline);
     if (!isOffline) {
     var propV = $("#theContentContainer").height()/FRAME_HEIGHT;
     var propH =$("#theContentContainer").width()/FRAME_WIDTH;
     var scale = propH<propV?propH:propV;
     scale= scale>1?1:scale;
     var diff = $('#mainPageContent').position().left < MENU_SIZE ? 0 : MENU_SIZE >>1;
     $('#myFrame').css('-webkit-transform','scale('+scale+')');
     console.log($('#myFrame').css('height'));
     $('#myFrame').css({
     left: parseInt(($("#mainPageContent").width() >>1 ) - ( $('#myFrame').width() >>1)),
     top:-((FRAME_HEIGHT-(FRAME_HEIGHT*scale))>>1)

     });


     } else{


     }   */
}

function setTitle(title) {

    $("#leMainTitle").html(title);

}

function startLoop() {
    /*
     COM VIDEO  (mexer css theEmptyContent
     $("#theEmptyContent").videoBG({
     webm: 'videos/loop.webm',
     scale: true,
     zIndex: 0,
     width: $("#theEmptyContent").width(),
     height: $("#theEmptyContent").height(),
     textReplacement: true

     });
     $("#theEmptyContent").css("margin-top", '-48px');   */
}



