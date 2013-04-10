<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">

        <link href="<?php echo base_url(); ?>asset/metro/css/modern.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/site.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>asset/metro/js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
        <title>Virtual Learning</title>
    </head>
    <?php $this->load->view('home/js'); ?>
    <script src="<?php echo base_url() ?>asset/flowplayer/flowplayer.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/flowplayer/skin/minimalist.css" />
    <body class="modern-ui" onload="prettyPrint()">
        <!--Top Navbar-->
        <div class="page">
            <?php $this->load->view('content/viewer_navbar'); ?>
        </div>
        <!--Center Content-->
        <div class="page">
            <!--Main Content-->
            <div class="page-region">
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span2">
                                <img src="<?php echo base_url() . 'resource/' . $profic->profic; ?>" style="width:150px ; heigth:150px">
                            </div>
                            <div class="span4 bg-color-blue">
                                <h2 class="fg-color-white">&nbsp;PROFIC</h2>
                            </div>

                            <div class="span6 bg-color-green">
                                <h2 class="fg-color-white">&nbsp;PENDIDIKAN</h2>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="row">
                            <div class="span2">

                            </div>
                            <div class="span4">
                                <p class="tertiary-info-secondary-text" style="padding: 10px; color: #000;">
                                    JONO
                                    <?php echo nl2br($profil->information); ?>
                                </p>

                            </div>
                            <div class="span6">
                                <p class="tertiary-info-secondary-text" style="padding: 10px; color: #000;">
                                    <?php echo nl2br($pendidikan->information); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="row">
                            <div class="span6 bg-color-blue">
                                <h2 class="fg-color-white">&nbsp;MENGAJAR</h2>
                            </div>

                            <div class="span6 bg-color-green">
                                <h2 class="fg-color-white">&nbsp;RISET</h2>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="row">
                            <div class="span6">
                                <p class="tertiary-info-secondary-text" style="padding: 10px; color: #000;">
                                    <?php echo nl2br($pengajaran->information); ?> 
                                </p>
                            </div>
                            <div class="span6">
                                <p class="tertiary-info-secondary-text" style="padding: 10px; color: #000;">
                                    <?php echo nl2br($riset->information); ?>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="grid">
                        <div class="row">
                            <div class="span6 bg-color-blue">
                                <h2 class="fg-color-white">&nbsp;PUBLIKASI</h2>
                            </div>

                            <div class="span6 bg-color-green">
                                <h2 class="fg-color-white">&nbsp;PENGALAMAN</h2>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="row">
                            <div class="span6">
                                <p class="tertiary-info-secondary-text" style="padding: 10px; color: #000;">
                                    <?php echo nl2br($publikasi->information); ?>  
                                </p>
                            </div>
                            <div class="span6">
                                <p class="tertiary-info-secondary-text" style="padding: 10px; color: #000;">
                                    <?php echo nl2br($pengalaman->information); ?>
                                </p>
                            </div>

                        </div>
                    </div>

                    <!--Loading Template-->
                    <div class="message-dialog bg-color-green fg-color-white"  style="display: none;" id="loading-template">

                    </div>
                </div>
            </div>

            <!--Footer Content-->
            <div class="page">
                <div class="nav-bar">
                    <div class="nav-bar-inner padding10">
                        <span class="element">
                            <?php echo date('Y'); ?>, VABEL UPT Elearning UNPAD &copy; by <a class="fg-color-white" href="mailto:taufiksu@gmail.com">Taufik Sulaeman P</a>
                        </span>
                    </div>
                </div>
            </div>

    </body>
</html>
