@extends('user.layout.common')

@section('title')応募フォーム | WEB人「WEB制作専門の求人サイト」@endsection
@section('content')
    <div class="ly_lower">

        <div class="ly_lower_mv">
            <div class="ly_cont_inner">
                <h2 class="el_lower_headTtl"><span>応募フォーム</span></h2>
            </div>
            <!-- /.ly_cont_inner -->
        </div>
        <!-- /.ly_lower_mv -->

        <div class="bl_breadCrumbs">
            <div class="ly_cont_inner">
                <ul class="bl_breadCrumbs_list">
                    <li class="bl_breadCrumbs_item"><a href="{{ route('user.index') }}"><i class="fa-solid fa-house"></i></a></li>
                    <li class="bl_breadCrumbs_item">応募フォーム</li>
                </ul>
            </div>
            <!-- /.ly_cont_inner -->
        </div>
        <!-- /.bl_breadCrumbs -->

        <div class="ly_cont_inner">
            <div class="bl_entry bl_thanks">
                <h2 class="bl_thanks_ttl">ご応募ありがとうございました。</h2>
                <p class="bl_thanks_txt">
                    ご入力いただいたメールアドレスに、内容確認のための自動返信メールを送信しました。<br>
                    別途、応募先企業からのご連絡をお待ち下さい。
                </p>
                <dl class="bl_companyToEntry">
                    <dt class="bl_companyToEntry_ttl">応募先企業情報</dt>
                    <dd class="bl_companyToEntry_ddata">
                        <p class="company_name">{{ $jobOfferInfo->company->name }}</p>
                        <p class="job_offer_ttl">{{ $jobOfferInfo->title }}</p>
                    </dd>
                </dl>
                <!-- /.bl_companyToEntry -->
                <a href="{{ route('user.index') }}" class="bl_thanks_btn">トップに戻る</a>
            </div>
            <!-- /.bl_entry -->
        </div>
        <!-- /.ly_cont_inner .ly_cont__col -->
    </div>
    <!-- /.ly_lower -->
@endsection
