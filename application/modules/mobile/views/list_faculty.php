<!DOCTYPE html> 
<html> 
    <?php $this->load->view('mobile/head'); ?>
    <body> 
        <div data-role="page">
            <!--header-->
            <div data-role="header">
                <a href="<?php echo site_url('mobile') ?>" data-icon="home">Depan</a>
                <h1>Kampus</h1>
                <a href="javascript:void(0)" data-icon="grid">Loker</a>
                <?php $this->load->view('mobile/header'); ?>
            </div>
            <!--content-->
            <div data-role="content">
                <ul data-role="listview" data-inset="true" data-filter="true"> 
                    <?php foreach ($faculty as $row): ?>
                        <li><a href="<?php echo site_url('mobile/courses' . '/' . $row->id_faculty) ?>"><?php echo $row->faculty; ?></a></li> 
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </body>
</html>