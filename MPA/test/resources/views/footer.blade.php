@section('footer')
<!--Bottom Footer-->
<div class="bottom section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="copyright">
                    <p>© <span>2020</span> <a href="#" class="transition">Theus de Zeeuw | Webpaper.site</a> All rights
                        reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Bottom Footer-->

<style>
.bottom.section-padding {
    margin-top: 4em;
}

a:hover {
    text-decoration: none;
}

.section-padding {
    padding: 60px 0;
}

.bottom {
    background-color: #0a1c2e;
}

.bottom .copyright {
    color: #e5e5e5;
    font-weight: 600;
}

.copyright a {
    color: #f2ff49;
    margin-left: 3px;
    padding-right: 3px;
}

.bottom p {
    margin-bottom: 0;
    line-height: 50px;
    font-size: 16px;
    font-weight: 400;
}

.copyright p span {
    color: #d1caca;
}

.bottom .copyright p,
.bottom .copyright a:hover {
    color: #6c6d83;
}
</style>
@stop