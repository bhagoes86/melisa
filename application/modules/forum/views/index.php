<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <?php $this->load->view('home/head'); ?>    
    <link href="<?php echo base_url(); ?>asset/metro/css/feed.css" rel="stylesheet" type="text/css">
    <body class="modern-ui" onload="prettyPrint()">
        <!--Top-->
        <div class="page" id="topbar"></div>
        <!--Center-->
        <div class="page" id="page-index">
            <!--Content-->
            <div class="page-region">
                <!--Main Content-->
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row" id="row-top-content" style="margin-top: 20px;margin-bottom: 20px;"></div>
                        <div class="row" id="row-main-content" style="margin-top: 0px;padding-top: 0px;">
                            <!--Sidebar -->
                            <div class="span2 leftbar">
                                <img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg" class="avatar" style="margin-top: 0px;padding-top: 0px;">
                                <div class="page-sidebar bg-color-red" style="margin:0px; padding-bottom: 0px;width:140px;">
                                    <ul>
                                        <li><a id=""><i class="icon-film"></i> Aktivitas</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Konten-->
                            <div class="span7" id="content-right">
                                <fieldset class="feed" style="margin-top: 5px;padding-top: 0px;">
                                    <legend>Hi, Wanna Share Something ?</legend><br/>
                                    <form action="#" method="post">
                                        <div class="input-control text">
                                            <input type="text" id="feedtext" placeholder=""/>
                                        </div>
                                        <div class="input-control textarea hide">
                                            <input type="file" id="postimage" class="hide" />
                                            <input type="url" id="posturl" class="hide" />
                                            <textarea name="feedpost" id="feedpost" placeholder="Wanna Share Something ?"></textarea>
                                            <div class="toolbar place-left">
                                                <button title="Upload image" class="btn-shortcut fg-color-white bg-color-blueDark" id="image">
                                                    <i class="icon-pictures"></i>
                                                </button>
                                                <button title="Tautan Youtube" class="btn-shortcut fg-color-white bg-color-red" id="youtube">
                                                    <i class="icon-youtube"></i>
                                                </button>
                                                <button title="Tautan Vimeo" class="btn-shortcut fg-color-white bg-color-blue" id="vimeo">
                                                    <i class="icon-vimeo"></i>
                                                </button>
                                                <button title="Tautan Sideshare" class="btn-shortcut fg-color-white bg-color-orange" id="slideshare">
                                                    <i class="icon-file-powerpoint"></i>
                                                </button>
                                                <button title="Tautan Scribd" class="btn-shortcut fg-color-white bg-color-purple" id="scribd">
                                                    <i class="icon-file-pdf"></i>
                                                </button>
                                                <button title="Tautan Docstoc" class="btn-shortcut fg-color-white bg-color-pink" id="docstoc">
                                                    <i class="icon-file-word"></i>
                                                </button>
                                                <button title="Tautan SoundCloud" class="btn-shortcut fg-color-white bg-color-orangeDark" id="soundcloud">
                                                    <i class="icon-soundcloud"></i>
                                                </button>
                                            </div>
                                            <div class="toolbar place-right" style="padding-right: 0px;">
                                                <input id="cancelpost" type="button" value="BATAL"/>
                                                <input id="cancelpost" class="bg-color-green" type="submit" value="BAGI" style="margin-right: 0px;"/>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </fieldset>
                                <div class="span9" style="padding-top: 0px;margin-top: 0px;">
                                    <h3 style="margin-left: 5px;padding-top: 0px;margin-top: 0px;">Aktivitas Terkini</h3>
                                    <ul class="listview list-long image">
                                        <li class="feed-document">
                                            <span class="feed-avatar">
                                                <img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg">
                                            </span>
                                            <div class="data">
                                                <div class="user-description">
                                                    <h4><a href="#">Toni Haryanto</a> mengunggah dokumen
                                                        <span class="date-meta">&middot; kemarin 09:11 &middot; publik</span>
                                                    </h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                </div>
                                                <div class="text">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                </div>
                                                <div class="image document-image">
                                                    <div class="icon bg-color-green fg-color-white"><i class="icon-libreoffice"></i></div>
                                                    <div class="description">
                                                        <h4><a href="#">Toni Haryanto Code Playground</a></h4>
                                                        Ut egestas magna, sed rutrum felis fermentum quis. Aliquam congue ultricies elit, sit amet tempor tortor tempor nec.
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="utils">
                                                    <div class="toolbar place-left">
                                                        <button title="like"><i class="icon-thumbs-up"></i> <span class="badge">100</span></button>
                                                        <button title="comment"><i class="icon-comments"></i> <span class="badge">70</span></button>
                                                        <button title="share"><i class="icon-share"></i> <span class="badge">8</span></button>
                                                    </div>
                                                    <div class="toolbar place-right">
                                                        <button title="setting"><i class="icon-cog"></i></button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="comments">
                                                    <ul>
                                                        <li><a href="#" title=""><i class="icon-comments-4"></i> 2 komentar terdahulu..</a></li>
                                                        <li><a href="#"><img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg" alt=""></a>
                                                            <div class="comment-data">
                                                                <a href="#">Toni Haryanto</a>
                                                                <small>&middot; 31 Juni, 09:15</small>
                                                                <a href="#" class="delete-comment place-right hide"><i class="icon-cancel"></i></a>
                                                                <p>Eeeee.. macarena! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                                            </div>
                                                        </li>
                                                        <li><a href="#"><img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg" alt=""></a>
                                                            <div class="comment-data">
                                                                <a href="#">Toni Haryanto</a>
                                                                <small>&middot; 31 Juni, 09:15</small>
                                                                <a href="#" class="delete-comment place-right hide"><i class="icon-cancel"></i></a>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga animi iusto illum illo corporis non dolorum asperiores quisquam obcaecati excepturi error architecto laboriosam quos ipsum enim accusamus natus nostrum praesentium.</p>
                                                            </div>
                                                        </li >
                                                    </ul>
                                                    <div class="input-control textarea comment-form">
                                                        <textarea name="comment" id="" placeholder ="Your comment here.."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="feed-link">
                                            <span class="feed-avatar">
                                                <img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg">
                                            </span>
                                            <div class="data">
                                                <div class="user-description">
                                                    <h4><a href="#">Toni Haryanto</a> memposting tautan
                                                        <span class="date-meta">&middot; kemarin 09:11 &middot; publik</span>
                                                    </h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                </div>
                                                <div class="text">
                                                    <p>Lorem ipsum dolor sit amet <a href="#">#tempor</a>, consectetur adipisicing elit. Mollitia maxime placeat magnam laborum ullam quas odit molestiae eligendi nesciunt unde at accusantium excepturi commodi facilis similique quasi inventore deserunt a.</p>
                                                    <div class="hide">
                                                        <p><a href="#"><strong>Lorem ipsum</strong></a> dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <a href="#">#Excepteur</a> sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam unde facere perspiciatis nulla commodi labore accusamus dolorum ipsum alias tenetur quaerat animi sit doloremque ducimus laboriosam corporis ullam pariatur harum!</p>
                                                    </div>
                                                    <a class="hide-link">selengkapnya..</a>
                                                </div>
                                                <div class="image link-image">
                                                    <img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg">
                                                    <div class="description">
                                                        <h4><a href="#"><i class="icon-link"></i> Toni Haryanto Code Playground</a></h4>
                                                        Ut egestas magna, sed rutrum felis fermentum quis. Aliquam congue ultricies elit, sit amet tempor tortor tempor nec.
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="utils">
                                                    <div class="toolbar">
                                                        <button title="like"><i class="icon-thumbs-up"></i> <span class="badge">100</span></button>
                                                        <button title="comment"><i class="icon-comments"></i> <span class="badge">70</span></button>
                                                        <button title="share"><i class="icon-share"></i> <span class="badge">8</span></button>
                                                    </div>
                                                </div>
                                                <div class="comments">
                                                    <ul>
                                                    </ul>
                                                    <div class="input-control textarea comment-form">
                                                        <textarea name="comment" id="" placeholder ="Your comment here.."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="feed-photo">
                                            <span class="feed-avatar">
                                                <img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg">
                                            </span>
                                            <div class="data">
                                                <div class="user-description">
                                                    <h4><a href="#">Toni Haryanto</a> mengunggah foto
                                                        <span class="date-meta">&middot; kemarin 09:11 &middot; publik</span>
                                                    </h4>
                                                </div>
                                                <div class="text">
                                                    <p>Lorem ipsum dolor sit amet <a href="#">#tempor</a>, consectetur adipisicing elit. Mollitia maxime placeat magnam laborum ullam quas odit molestiae eligendi nesciunt unde at accusantium excepturi commodi facilis similique quasi inventore deserunt a.</p>
                                                    <div class="hide">
                                                        <p><a href="#"><strong>Lorem ipsum</strong></a> dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <a href="#">#Excepteur</a> sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam unde facere perspiciatis nulla commodi labore accusamus dolorum ipsum alias tenetur quaerat animi sit doloremque ducimus laboriosam corporis ullam pariatur harum!</p>
                                                    </div>
                                                    <a class="hide-link">selengkapnya..</a>
                                                </div>
                                                <div class="image video-image">
                                                    <img src="<?php echo base_url() ?>application/modules/feed/img/i_love_you.jpg">
                                                    <div class="description">
                                                        Ut egestas magna, sed rutrum felis fermentum quis. Aliquam congue ultricies elit, sit amet tempor tortor tempor nec.
                                                    </div>
                                                </div>
                                                <div class="utils">
                                                    <div class="toolbar">
                                                        <button title="like"><i class="icon-thumbs-up"></i> <span class="badge">100</span></button>
                                                        <button title="comment"><i class="icon-comments"></i> <span class="badge">70</span></button>
                                                        <button title="share"><i class="icon-share"></i> <span class="badge">8</span></button>
                                                    </div>
                                                </div>
                                                <div class="comments">
                                                    <ul>
                                                    </ul>
                                                    <div class="input-control textarea comment-form">
                                                        <textarea name="comment" id="" placeholder ="Your comment here.."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="feed-video">
                                            <span class="feed-avatar">
                                                <img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg">
                                            </span>
                                            <div class="data">
                                                <div class="user-description">
                                                    <h4><a href="#">Toni Haryanto</a> mengunggah video
                                                        <span class="date-meta">&middot; kemarin 09:11 &middot; publik</span>
                                                    </h4>
                                                </div>
                                                <div class="image video-image fg-color-white">
                                                    <img src="<?php echo base_url() ?>application/modules/feed/img/photoshop-tutorial.jpg">
                                                    <i class="icon-film layered" style="font-size:80px;top:40%;left:40%;"></i>
                                                    <div class="description">
                                                        Ut egestas tempor magna, sed rutrum felis fermentum quis. Aliquam congue ultricies elit, sit amet tempor tortor tempor nec.
                                                    </div>
                                                </div>
                                                <div class="utils">
                                                    <div class="toolbar">
                                                        <button title="like"><i class="icon-thumbs-up"></i> <span class="badge">100</span></button>
                                                        <button title="comment"><i class="icon-comments"></i> <span class="badge">70</span></button>
                                                        <button title="share"><i class="icon-share"></i> <span class="badge">8</span></button>
                                                    </div>
                                                </div>
                                                <div class="comments">
                                                    <ul>
                                                    </ul>
                                                    <div class="input-control textarea comment-form">
                                                        <textarea name="comment" id="" placeholder ="Your comment here.."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!-- Rightbar -->
                            <div class="span3 rightbar">
                                <div id="fixed">
                                    <fieldset class="feed"  style="margin-top: 5px;padding-top: 0px;">
                                        <legend>Mungkin Anda Kenal</legend><br/>
                                        <div class="list">
                                            <div class="small-avatar middle">
                                                <img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg">
                                            </div>
                                            <div class="side-description middle">
                                                <a href="#">Toni Haryanto</a>
                                            </div>
                                            <div class="toolbar side-utils middle">
                                                <button class="pseudo-btn place-right bg-color-yellow fg-color-white" title="ikuti"><i class="icon-share-2"></i></button>
                                            </div>
                                        </div>
                                        <div class="list">
                                            <div class="small-avatar middle">
                                                <img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg">
                                            </div>
                                            <div class="side-description middle">
                                                <a href="#">Toni Haryanto</a>
                                            </div>
                                            <div class="toolbar side-utils middle">
                                                <button class="pseudo-btn place-right bg-color-yellow fg-color-white" title="ikuti"><i class="icon-share-2"></i></button>
                                            </div>
                                        </div>
                                        <div class="list">
                                            <div class="small-avatar middle">
                                                <img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg">
                                            </div>
                                            <div class="side-description middle">
                                                <a href="#">Toni Haryanto</a>
                                            </div>
                                            <div class="toolbar side-utils middle">
                                                <button class="pseudo-btn place-right bg-color-yellow fg-color-white" title="ikuti"><i class="icon-share-2"></i></button>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="feed">
                                        <legend>Lengkapi Profil Anda</legend>
                                        <div class="progress-bar">
                                            <div class="bar-caption" style="width:70%"> 70%</div>
                                            <div class="bar bg-color-green" style="width:70%"></div>
                                            <div class="bar bg-color-yellow" style="width:30%"></div>
                                        </div>
                                        <ul class="listview side-list">
                                            <li>
                                                <div class="icon bg-color-green fg-color-white">
                                                    <i class="icon-newspaper"></i>
                                                </div>
                                                <div class="data">
                                                    <p style="line-height:14px;">Perbarui detail kontak sehingga teman-teman Anda dapat menemukan Anda.</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <button>Tambahkan Info Kontak</button>
                                    </fieldset>

                                    <fieldset class="feed">
                                        <legend>Komunitas yang Disarankan</legend>
                                        <div class="list">
                                            <div class="small-avatar middle">
                                                <img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg">        
                                            </div>
                                            <div class="side-description middle">
                                                <a href="#">Avagata</a><br>
                                                5 orang kenalan
                                            </div>
                                            <div class="toolbar side-utils bottom">
                                                <button class="pseudo-btn place-right bg-color-yellow fg-color-white" title="ikuti"><i class="icon-share-3"></i></button>
                                            </div>
                                        </div>
                                        <div class="list">
                                            <div class="small-avatar middle">
                                                <img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg">        
                                            </div>
                                            <div class="side-description middle">
                                                <a href="#">POSS UPI</a><br>
                                                10 orang kenalan
                                            </div>
                                            <div class="toolbar side-utils middle">
                                                <button class="pseudo-btn place-right bg-color-yellow fg-color-white" title="ikuti"><i class="icon-share-3"></i></button>
                                            </div>
                                        </div>
                                        <div class="list">
                                            <div class="small-avatar middle">
                                                <img src="<?php echo base_url() ?>application/modules/feed/img/avatar.jpg">
                                            </div>
                                            <div class="side-description middle">
                                                <a href="#">Ilmu Komputer UPI</a><br>
                                                205 orang kenalan
                                            </div>
                                            <div class="toolbar side-utils bottom">
                                                <button class="pseudo-btn place-right bg-color-yellow fg-color-white" title="ikuti"><i class="icon-share-3"></i></button>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="feed">
                                        <legend>Trend Topik</legend>
                                        <ul style="list-style:none;color:#aaa">
                                            <li><i class="icon-arrow-up-2 fg-color-green"></i> #UjianNasional</li>
                                            <li><i class="icon-move-horizontal fg-color-yellow"></i> #SkandalUPI</li>
                                            <li><i class="icon-arrow-down-2 fg-color-red"></i> #MrBean</li>
                                            <li><i class="icon-move-horizontal fg-color-yellow"></i> #DemoAngkot</li>
                                            <li><i class="icon-arrow-down-2 fg-color-red"></i> #DemoParkir</li>
                                        </ul>
                                    </fieldset>

                                </div>
                            </div>
                        </div>

                        <div class="row" id="row-main-other">
                            <div class="grid">
                                <div class="span12 bg-color-gray"></div>                                    
                                <div class="row" style="color: #6d6e71;text-decoration: none;font-family: 'sofiapro',Arial,sans-serif;font-size: 14px;margin-right: 15px;">                                    
                                    <a id="sakola_news"  style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/4') ?>">Tentang</a>&nbsp;&nbsp;&nbsp;
                                    <a id="karir_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/5') ?>">Karir</a>&nbsp;&nbsp;&nbsp;
                                    <a id="blog_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/6') ?>">Blog</a>&nbsp;&nbsp;&nbsp;
                                    <a id="pengembangan_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/7') ?>">Pengembang</a>&nbsp;&nbsp;&nbsp;
                                    <a id="kerjasama_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/8') ?>">Kerjasama</a>&nbsp;&nbsp;&nbsp;
                                    <a id="sponsor_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/9') ?>">Sponsor & Pendanaan</a>&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>


                        <!--Loading Template-->
                        <div class="message-dialog bg-color-green fg-color-white"  style="display: none;position: fixed;top: 50%;" id="loading-template">
                            <img style="float: left;margin-top: 10px;" src="<?php echo base_url() ?>asset/metro/images/preloader-w8-cycle-black.gif">
                            <p style="float: left;margin-left: 20px;margin-top: 30px;" id="message">Content for message dialog</p>
                        </div>
                        <div class="message-dialog bg-color-red fg-color-white" style="display: none;position: fixed;top: 50%;" id="error-template">
                            <p id="message-error">Content for message dialog</p>
                            <button class="place-right" id="close-error-message">Tutup Pesan</button>
                        </div>
                        <div class="message-dialog bg-color-blue fg-color-white" style="display: none;position: fixed;top: 50%;" id="info-template">
                            <p id="message-info">Content for message dialog</p>
                            <button class="place-right" id="close-info-message">Tutup Pesan</button>
                        </div>
                        <!--EOF Loading Template-->

                    </div>
                </div>
            </div>
        </div>
        <!--Footer-->
        <div class="page" id="footbar"></div>
    </body>
</html>
<div id="fb-root"></div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#topbar').load("<?php echo site_url('site/topbar') ?>");
        $('#footbar').load("<?php echo site_url('site/footbar') ?>");
        
        $('#row-top-content').load("<?php echo site_url('home/top') ?>");
        
        $('.hide-link').live('click', function(){
            $this = $(this);
            $this.html('tutup detail.').removeClass('hide-link').addClass('show-link');
            $this.siblings('.hide').removeClass('hide').addClass('show');
        });
        $('.show-link').live('click', function(){
            $this = $(this);
            $this.html('selengkapnya..').removeClass('show-link').addClass('hide-link');
            $this.siblings('.show').removeClass('show').addClass('hide');
        });
        $('#feedtext').live('click', function(){
            $(this).parent().addClass('hide');
            $('#feedpost').parent().removeClass('hide');
            $('#feedpost').focus();
        });
        $('#cancelpost').live('click', function(){
            $('#feedtext').parent().removeClass('hide');
            $('#feedpost').parent().addClass('hide');
            $('#postimage, #posturl').addClass('hide').val('');
        });
        $('.btn-shortcut').live('click', function(){
            $this = $(this);
            if($this.attr('id') == 'image'){
                $('#postimage').removeClass('hide').val('');
                $('#posturl').addClass('hide').val('');
            } else {
                $('#postimage').addClass('hide').val('');
                $('#posturl').removeClass('hide').val('').attr('placeholder', 'Tautan alamat ' + $this.attr('id'));
            }
            return false;
        });
        $('.comments li').live('mouseover', function(){
            $(this).children().children('.delete-comment').removeClass('hide');
        });
        $('.comments li').live('mouseout', function(){
            $(this).children().children('.delete-comment').addClass('hide');
        });

        //Load page welcome
        $('a#btn-welcome').click(function(){
            $('#message').html("Loading Data");
            $('#loading-template').show();
            $('#row-center-content').load("<?php echo site_url('home/welcome'); ?>",function(){
                $('#loading-template').fadeOut("slow");
            });
            return false;
        });

        //Show Login Form
        $('#btn-login').click(function(){
            $('#message').html("Loading Data");
            $('#loading-template').show();            
            $('#row-center-content').load("<?php echo site_url('authz/login'); ?>",function(){
                $('#loading-template').fadeOut("slow");
            });
            return false;
        });
        
        //Hide Error Message
        $('#close-error-message').click(function(){
            $('#error-template').fadeOut("slow");
            return false;
        });
        
        //Hide Info Message
        $('#close-info-message').click(function(){
            $('#info-template').fadeOut("slow");
            return false;
        });
        
    });
    
    //Google Analytic
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-31205461-3']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=240447809341438";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
 
    $(window).bind("load resize", function(){    
        var container_width = $('#container').width();    
        $('#container').html('<div class="fb-like-box" ' + 
            'data-href="https://www.facebook.com/npaperbox"' +
            ' data-width="' + container_width + '" data-height="300" data-show-faces="true" ' +
            'data-stream="false" data-header="false"></div>');
        FB.XFBML.parse( );    
    }); 
</script>