<div class="pt-0">

    @if (auth()->user()->hasRole('Dokter'))
        @include('pages.transaksi.rj.emr-rj.pemeriksaan.tabs.umum-tab-dokter-view')
    @else
        @include('pages.transaksi.rj.emr-rj.pemeriksaan.tabs.umum-tab-perawat-view')
    @endif

    @include('pages.transaksi.rj.emr-rj.pemeriksaan.tabs.fisik-tab')
    @include('pages.transaksi.rj.emr-rj.pemeriksaan.tabs.suspek-akibat-kercelakaan-kerja-tab')
    @include('pages.transaksi.rj.emr-rj.pemeriksaan.tabs.uji-fungsi-tab')
    @include('pages.transaksi.rj.emr-rj.pemeriksaan.tabs.penunjang-tab')
    @include('pages.transaksi.rj.emr-rj.pemeriksaan.tabs.fungsional-tab')



</div>
