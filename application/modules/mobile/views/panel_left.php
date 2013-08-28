<div data-role="panel" id="left-panel" data-theme="b" data-position="left" data-display="push">
    <ul data-role="listview">
        <li data-role="list-divider" id="user_name"></li>
        <li data-icon="envelope"><a href="#">Surat Masuk</a></li>
        <li data-icon="calendar"><a href="#">Agenda Saya</a></li>
        <li data-icon="file-text"><a href="#">Laporan</a></li>
        <li data-role="list-divider">Terbaru</li>
        <li data-icon="envelope"><a href="#" data-ajax="false">Surat</a></li>
        <li data-icon="calendar"><a href="#">Agenda</a></li>
        <li data-role="list-divider">Setting</li>
        <li data-icon="picture"><a href="#">Ubah Avatar</a></li>
        <li data-icon="user"><a href="#">Ubah Profil</a></li>
        <li data-icon="key"><a href="#">Ubah Password</a></li>
        <li data-icon="signout"><a href="<?php echo site_url('users/logout') ?>" data-ajax="false">Log Out</a></li>
    </ul>
</div>