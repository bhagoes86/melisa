<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Modul Feed
 * Maintainer : Toni haryanto
 * Email : toha.samba@gmail.com 
 */

class Feed extends MX_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth', 'template'));
        $this->load->model('model_feed', '', true);

        // ane pake library template, biar gampang embedding view, asset dan variabelnya 
        // sisipin css khusus untuk modul ini :)
        $this->template->append_css('feed::feed.css');

		// sisipin js khusus untuk modul ini :)
        $this->template->append_js('feed::feed.js');
    }

    // fungsi index ini untuk menampilkan layout utama
    // default konten untuk feed ini adalah 'feed/latest' yakni fungsi latest() di controller ini
    function index($content = 'feed/latest')
    {
    	// kalo belum login, lempar ke halaman beranda
        if(! $this->ion_auth->logged_in())
        	redirect('/');

        $this->template
            ->title('Feed')

        	->set('main_content', $content) // url konten yang akan disisipkan di #row-main-content
        	->set('main_other', null) // set ini kalo #row-main-other mau disisipi konten juga
        	->build('home/index-layout'); // ini layout-halaman yang akan digunakan untuk halaman feed
    }

    function latest() 
    {
        // kalo request page via ajax
        if($this->input->is_ajax_request()) {
            
            $this->template
                ->title('Latest Feeds')
                ->set_partial('form', 'form')
                ->set_partial('main', 'latest') // ini partial 'main' buat disisipin di layout-modul
                ->set_partial('leftbar', 'leftbar') // ini partial 'sidebar' buat disisipin di layout-modul
                ->set_partial('rightbar', 'rightbar'); // ini partial 'sidebar' buat disisipin di layout-modul
            $this->template->build('layout'); // ini layout-modul buat latest

        } else { // kalo direct request via url
            $this->template
                ->set('main_content', 'feed/latest') // ambil konten dari fungsi ini via ajax
                ->build('home/index-layout'); // lalu embed datanya ke layout utama
        }

    }

}
