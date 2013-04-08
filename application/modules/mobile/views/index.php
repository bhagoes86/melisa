<!DOCTYPE html> 
<html> 
    <?php $this->load->view('mobile/head'); ?>
    <body> 
        <div data-role="page" data-theme="d">
            <!--header-->
            <div data-role="header">
                <h1>ELearning</h1>
            </div>
            <!--content-->
            <div data-role="content">
                <div style="text-align: center;">
                    <img src="<?php echo base_url() ?>asset/css/images/unpad.jpg"/>
                </div>
                <ul data-role="listview" data-inset="true"> 
                    <li><a href="<?php echo site_url('mobile/topic') ?>">Mulai Kuliah</a></li> 
                    <li><a href="javascript:void(0)">Tentang Elearning</a></li>
                    <li><a href="javascript:void(0)">Pusat Bantuan</a></li>
                    <li><a href="javascript:void(0)">Hak Pengguna</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>