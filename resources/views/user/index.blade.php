@extends('user.layout.common')

@section('title')WEB人「WEB制作専門の求人サイト」@endsection
@section('content')
    <div>
        <div class="bl_mv">
            <div class="ly_cont_inner">
                <h2 class="bl_mv_ttl"><img src="images/mv_ttl.png" alt="WEBで活躍できる人になる"></h2>
            </div>
            <!-- /.ly_cont_inner -->
        </div>
        <!-- /.bl_mv -->
        <div class="ly_cont">
            <div class="ly_cont_inner ly_cont__col ly_archive">
                @include('user.include.job_offers')
            </div>
            <!-- /.ly_cont_inner .ly_cont__col -->
        </div>
        <!-- /.ly_cont -->
    </div>
@endsection
@section('script')
<script>
    $('.bl_checkbox').hide();
    $('.accordion_toggle').on('click', function() {
        $(this).next().stop().slideToggle();
        $(this).toggleClass('is_active');
    });
</script>
@endsection
