<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php echo base_url('assets/img/sidebar-5.jpg'); ?>">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    PERPUSTAKAAN DARING
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="<?php echo site_url(''); ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('daftar'); ?>">
                        <i class="pe-7s-user"></i>
                        <p>PEndaftaran</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('buku'); ?>">
                        <i class="pe-7s-paper-plane"></i>
                        <p>Daftar buku</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('peminjaman/list_peminjam'); ?>">
                        <i class="pe-7s-note2"></i>
                        <p>List peminjam</p>
                    </a>
                </li>
                <!--
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>list siswa</p>
                    </a>
                </li>
-->
                <li>
                    <a href="<?php echo site_url('buku/list_buku'); ?>">
                        <i class="pe-7s-note2"></i>
                        <p>LIST BUKU</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('chart'); ?>">
                        <i class="pe-7s-graph3"></i>
                        <p>Chart</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="javascript:void(0)" onclick="document.body.requestFullscreen()">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    