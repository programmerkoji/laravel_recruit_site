@extends('user.layout.common')

@section('title')お気に入りリスト | WEB人「WEB制作専門の求人サイト」@endsection
@section('content')
    <div class="ly_lower">

        <div class="ly_lower_mv">
            <div class="ly_cont_inner">
                <h2 class="el_lower_headTtl"><span>お気に入りリスト</span></h2>
            </div>
            <!-- /.ly_cont_inner -->
        </div>
        <!-- /.ly_lower_mv -->

        <div class="bl_breadCrumbs">
            <div class="ly_cont_inner">
                <ul class="bl_breadCrumbs_list">
                    <li class="bl_breadCrumbs_item"><a href="{{ route('user.index') }}"><i class="fa-solid fa-house"></i></a></li>
                    <li class="bl_breadCrumbs_item">お気に入りリスト</li>
                </ul>
            </div>
            <!-- /.ly_cont_inner -->
        </div>
        <!-- /.bl_breadCrumbs -->

        <div class="ly_cont">
            <div class="ly_cont_inner ly_cont__col ly_archive">
                @include('user.include.job_offers')
            </div>
            <!-- /.ly_cont_inner .ly_cont__col -->
        </div>
        <!-- /.ly_cont -->
    </div>
    <!-- /.ly_lower -->
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
