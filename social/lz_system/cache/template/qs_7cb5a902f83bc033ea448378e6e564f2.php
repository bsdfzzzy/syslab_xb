<!doctype html>
<html>
<head>
    <title>Read Online</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width" />
    <style type="text/css" media="screen">
        html, body  { height:100%;width:100%; }
        body { margin:0; padding:0; overflow:auto; }
        #flashContent { display:none; }
    </style>
    <link rel="stylesheet" type="text/css" href="lz_system/view/blue/css/flexpaper.css" />
    <script type="text/javascript" src="lz_system/view/blue/pdf/js/jquery.min.js"></script>
    <script type="text/javascript" src="lz_system/view/blue/pdf/js/flexpaper.js"></script>
    <script type="text/javascript" src="lz_system/view/blue/pdf/js/flexpaper_handlers.js"></script>
</head>
<body>
<div style="position:absolute;left:10px;top:10px;width:97%;height:97%;">
<div id="documentViewer" class="flexpaper_viewer" data="<?php echo $_obj['html'];?>" style="width:100%;height:100%"></div>
<input type="hidden" id="fname1" value= <?php echo $_obj['swf_name'];?> >

<script type="text/javascript">
    function getDocumentUrl(document){
        return "php/services/view.php?doc=<?php echo $_obj['doc']; ?>&format=<?php echo $_obj['format']; ?>&page=<?php echo $_obj['page']; ?>".replace("<?php echo $_obj['doc']; ?>",document);
    }
    var swf =$('#fname1').val();

    var startDocument = "Paper";

    $('#documentViewer').FlexPaperViewer(
            { config : {

                SWFFile : swf,

                Scale : 0.6,
                ZoomTransition : 'easenOut',
                ZoomTime : 0.5,
                ZoomInterval : 0.3,
                FitPageOnLoad : false,
                FitWidthOnLoad : true,
                FullScreenAsMaxWindow : true,
                ProgressiveLoading : false,
                MinZoomSize : 0.2,
                MaxZoomSize : 5,
                SearchMatchAll : false,
                InitViewMode : 'Portrait',
                RenderingOrder : 'flash',
                StartAtPage : '',

                ViewModeToolsVisible : true,
                ZoomToolsVisible : true,
                NavToolsVisible : true,
                CursorToolsVisible : true,
                SearchToolsVisible : true,
                WMode : 'window',
                localeChain: 'en_US'
            }}
    );
</script>


