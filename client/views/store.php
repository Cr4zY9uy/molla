<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Hệ thống cửa hàng<span>Cửa hàng</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?controller=home">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cửa hàng</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">

            <h2 class="title text-center mb-2">Cửa hàng mới</h2><!-- End .title text-center -->
            <?php foreach($newstores as $store) : ?>
            <article class="entry entry-list">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <figure class="entry-media">
                            <a href="#">
                                <img style="height: 330px !important;" src="uploads/<?=$store["ulr"]?>"
                                    alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->
                    </div><!-- End .col-md-4 -->

                    <div class="col-md-8">
                        <div class="entry-body">


                            <h2 class="entry-title">
                                <a href="#"><?=$store["namestore"]?></a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats">
                                <a href="#">Trao đổi</a>,
                                <a href="#">Mua bán</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content">
                                <p><?=$store["address"]?></p>
                                <a href="#" class="read-more"><?=$store["phonestore"]?></a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </div><!-- End .col-md-8 -->
                </div><!-- End .row -->
            </article><!-- End .entry -->

            <?php endforeach ?>
            <hr class="mb-5">

            <h2 class="title text-center mb-2">Tất cả cửa hàng</h2><!-- End .title text-center -->
            <div class="row max-col-2">
                <?php foreach($stores as $store): ?>
                <div class="col-md-6">
                    <article class="entry entry-grid">
                        <figure class="entry-media">
                            <a href="#">
                                <img style="height: 330px !important;" src="uploads/<?=$store["ulr"]?>"
                                    alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body text-center">
                            <div class="entry-meta">
                                <a href="#">Ng 10, 2023</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title">
                                <a href="#"><?=$store["namestore"]?></a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-content">
                                <p><?=$store["address"]?></p>

                                <a href="#" class="read-more"><?=$store["phonestore"]?></a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .col-md-6 -->

                <?php endforeach ?>
            </div><!-- End .row -->





        </div><!-- End .container -->
    </div><!-- End .page-content -->


</main><!-- End .main -->