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
            <div class="bl_entry">
                <dl class="bl_companyToEntry">
                    <dt class="bl_companyToEntry_ttl">応募先企業</dt>
                    <dd class="bl_companyToEntry_ddata">
                        <p class="company_name">{{ $jobOfferInfo->company->name }}</p>
                        <p class="job_offer_ttl">{{ $jobOfferInfo->title }}</p>
                    </dd>
                </dl>
                <!-- /.bl_companyToEntry -->
                <form action="{{ route('user.thanks', ['job_offer' => $jobOfferInfo->id]) }}" method="post" class="bl_form confirm">
                    @csrf

                    <div class="bl_form_item">
                        <label for="name" class="bl_form_ttl el_require">氏名</label>
                        <div class="bl_confirmData">
                            <p class="bl_confirmData_txt">{{ $entry['name'] }}</p>
                            <input type="hidden" name="name" value="{{ $entry['name'] }}">
                        </div>
                        <!-- /.bl_confirmData -->
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="kana" class="bl_form_ttl el_require">ふりがな</label>
                        <div class="bl_confirmData">
                            <p class="bl_confirmData_txt">{{ $entry['kana'] }}</p>
                            <input type="hidden" name="kana" value="{{ $entry['kana'] }}">
                        </div>
                        <!-- /.bl_confirmData -->
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="email" class="bl_form_ttl el_require">メールアドレス</label>
                        <div class="bl_confirmData">
                            <p class="bl_confirmData_txt">{{ $entry['email'] }}</p>
                            <input type="hidden" name="email" value="{{ $entry['email'] }}">
                        </div>
                        <!-- /.bl_confirmData -->
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="tel" class="bl_form_ttl el_require">電話番号</label>
                        <div class="bl_confirmData">
                            <p class="bl_confirmData_txt">{{ $entry['tel'] }}</p>
                            <input type="hidden" name="tel" value="{{ $entry['tel'] }}">
                        </div>
                        <!-- /.bl_confirmData -->
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="address" class="bl_form_ttl el_require">住所</label>
                        <div class="bl_confirmData">
                            <p class="bl_confirmData_txt">{{ $entry['address'] }}</p>
                            <input type="hidden" name="address" value="{{ $entry['address'] }}">
                        </div>
                        <!-- /.bl_confirmData -->
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <p class="bl_form_ttl el_require">性別</p>
                        <div class="bl_radioWrapper">
                            <div class="bl_confirmData">
                                <p class="bl_confirmData_txt">{{ $entry['gender'] }}</p>
                                <input type="hidden" name="gender" value="{{ $entry['gender'] }}">
                            </div>
                            <!-- /.bl_confirmData -->
                        </div>
                        <!-- /.bl_radioWrapper -->
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="birth" class="bl_form_ttl el_require">生年月日</label>
                        <div class="bl_confirmData">
                            <p class="bl_confirmData_txt">{{ $entry['birth'] }}</p>
                            <input type="hidden" name="birth" value="{{ $entry['birth'] }}">
                        </div>
                        <!-- /.bl_confirmData -->
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="career" class="bl_form_ttl">職務経歴</label>
                        <div class="bl_confirmData">
                            <p class="bl_confirmData_txt">{!! nl2br(e($entry['career'])) !!}</p>
                            <input type="hidden" name="career" value="{{ $entry['career'] }}">
                        </div>
                        <!-- /.bl_confirmData -->
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="appeal" class="bl_form_ttl">自己アピール</label>
                        <div class="bl_confirmData">
                            <p class="bl_confirmData_txt">{!! nl2br(e($entry['appeal'])) !!}</p>
                            <input type="hidden" name="appeal" value="{{ $entry['appeal'] }}">
                        </div>
                        <!-- /.bl_confirmData -->
                    </div>
                    <!-- /.bl_form_item -->

                    <div class="bl_form_btnWrapper">
                        <button type="submit" name="action" value="back" class="bl_form_btn back">戻る</button>
                        <button type="submit" name="action" value="submit" class="bl_form_btn">送信する</button>
                    </div>
                    <!-- /.bl_form_btnWrapper -->
                </form>
            </div>
            <!-- /.bl_entry -->
        </div>
        <!-- /.ly_cont_inner .ly_cont__col -->
    </div>
    <!-- /.ly_lower -->
@endsection
