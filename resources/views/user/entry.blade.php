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
                <form action="{{ route('user.confirm', ['job_offer' => $jobOfferInfo->id]) }}" method="post" class="bl_form">
                    @csrf
                    <div class="bl_form_item">
                        <label for="name" class="bl_form_ttl el_require">氏名</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="bl_form_input" placeholder="例）山田 太郎">
                        @error('name')
                        <span class="el_validationTxt">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="kana" class="bl_form_ttl el_require">ふりがな</label>
                        <input type="text" name="kana" id="kana" value="{{ old('kana') }}" class="bl_form_input" placeholder="例）やまだ たろう">
                        @error('kana')
                        <span class="el_validationTxt">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="email" class="bl_form_ttl el_require">メールアドレス</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="bl_form_input" placeholder="例）user@test.com">
                        @error('email')
                        <span class="el_validationTxt">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="tel" class="bl_form_ttl el_require">電話番号</label>
                        <input type="tel" name="tel" id="tel" value="{{ old('tel') }}" class="bl_form_input" placeholder="例）090-1234-5678">
                        @error('tel')
                        <span class="el_validationTxt">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="address" class="bl_form_ttl el_require">住所</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}" class="bl_form_input" placeholder="例）123-4567 東京都〇〇区〇〇5-10">
                        @error('address')
                        <span class="el_validationTxt">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <p class="bl_form_ttl el_require">性別</p>
                        <div class="bl_radioWrapper">
                            <label>
                                <input type="radio" name="gender" value="男性" class="bl_radio" @if(old('gender') == '男性') checked @endif>
                                <span>男性</span>
                            </label>
                            <label>
                                <input type="radio" name="gender" value="女性" class="bl_radio" @if(old('gender') == '女性') checked @endif>
                                <span>女性</span>
                            </label>
                        </div>
                        <!-- /.bl_radioWrapper -->
                        @error('gender')
                        <span class="el_validationTxt">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="birth" class="bl_form_ttl el_require">生年月日</label>
                        <input type="text" name="birth" id="birth" value="{{ old('birth') }}" class="bl_form_input" placeholder="例）1990/01/01">
                        @error('birth')
                        <span class="el_validationTxt">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="career" class="bl_form_ttl">職務経歴</label>
                        <textarea name="career" id="career" value="{{ old('career') }}" class="bl_form_textarea" placeholder="職務経歴を入力してください"></textarea>
                    </div>
                    <!-- /.bl_form_item -->
                    <div class="bl_form_item">
                        <label for="appeal" class="bl_form_ttl">自己アピール</label>
                        <textarea name="appeal" id="appeal" value="{{ old('appeal') }}" class="bl_form_textarea" placeholder="自己アピールを入力してください"></textarea>
                    </div>
                    <!-- /.bl_form_item -->

                    <button type="submit" class="bl_form_btn">入力内容確認</button>
                </form>
            </div>
            <!-- /.bl_entry -->
        </div>
        <!-- /.ly_cont_inner .ly_cont__col -->
    </div>
    <!-- /.ly_lower -->
@endsection
